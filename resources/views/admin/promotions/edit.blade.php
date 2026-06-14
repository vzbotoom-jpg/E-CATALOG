@extends('layouts.admin')
@section('title', 'Edit Promo')
@section('header', 'Edit Promo')

@section('content')

<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.promotions.index') }}" class="text-gray-500 hover:text-black transition">
                    <i class="ti ti-arrow-left text-xl"></i>
                </a>
                <h1 class="text-xl font-bold text-black">Edit Promo</h1>
                <span class="ml-auto text-xs text-gray-400">ID: #{{ $promotion->id }}</span>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.promotions.update', $promotion->id) }}" class="p-6 space-y-5">
            @csrf
            @method('PUT')

            @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm">
                {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg text-sm">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Judul Promo <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title', $promotion->title) }}" required
                       class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black">
                @error('title')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tipe Diskon <span class="text-red-500">*</span></label>
                    <select name="discount_type" id="discountType" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black">
                        <option value="percentage" {{ $promotion->discount_type === 'percentage' ? 'selected' : '' }}>Persentase (%)</option>
                        <option value="nominal" {{ $promotion->discount_type === 'nominal' ? 'selected' : '' }}>Nominal (Rp)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" id="discountLabel">
                        @if($promotion->discount_type === 'percentage')
                            Nilai Diskon (%) <span class="text-red-500">*</span>
                        @else
                            Nilai Diskon (Rp) <span class="text-red-500">*</span>
                        @endif
                    </label>
                    <input type="number" name="discount_value" step="0.01" value="{{ old('discount_value', $promotion->discount_value) }}" required
                           class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black">
                    @error('discount_value')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="description" rows="3" 
                          class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black">{{ old('description', $promotion->description) }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Mulai Berlaku <span class="text-red-500">*</span></label>
                    <input type="date" name="valid_from" value="{{ old('valid_from', $promotion->valid_from->format('Y-m-d')) }}" required
                           class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Berlaku Sampai <span class="text-red-500">*</span></label>
                    <input type="date" name="valid_until" value="{{ old('valid_until', $promotion->valid_until->format('Y-m-d')) }}" required
                           class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Minimal Pembelian</label>
                <input type="number" name="min_purchase" value="{{ old('min_purchase', $promotion->min_purchase) }}"
                       class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black"
                       placeholder="0">
                <p class="text-xs text-gray-400 mt-1">Isi 0 atau kosongkan jika tanpa minimal pembelian</p>
            </div>

            <div class="flex items-center gap-3 pt-2">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ $promotion->is_active ? 'checked' : '' }} 
                           class="w-4 h-4 rounded border-gray-300 text-black focus:ring-black">
                    <span class="text-sm text-gray-700">Aktifkan promo</span>
                </label>
                
                <label class="flex items-center gap-2 cursor-pointer ml-4">
                    <input type="checkbox" id="deleteCheckbox" class="w-4 h-4 rounded border-gray-300 text-red-500">
                    <span class="text-sm text-red-500">Tandai untuk dihapus</span>
                </label>
            </div>

            <div id="deleteConfirmation" class="hidden bg-red-50 border border-red-200 rounded-lg p-4">
                <p class="text-sm text-red-700 mb-3">Anda telah menandai promo ini untuk dihapus. Klik tombol "Hapus Permanen" untuk menghapus.</p>
                <button type="button" id="cancelDeleteBtn" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition text-sm">
                    Batalkan
                </button>
            </div>

            <div class="flex gap-3 pt-4">
                <button type="submit" class="px-6 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition">
                    <i class="ti ti-device-floppy mr-1"></i> Simpan Perubahan
                </button>
                <a href="{{ route('admin.promotions.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                    Batal
                </a>
            </div>

            <div class="border-t border-gray-100 pt-4 mt-2">
                <button type="button" id="deleteBtn" class="text-red-500 hover:text-red-700 text-sm flex items-center gap-1 transition">
                    <i class="ti ti-trash"></i> Hapus Promo
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Update label when discount type changes
    const discountType = document.getElementById('discountType');
    const discountLabel = document.getElementById('discountLabel');
    
    discountType.addEventListener('change', function() {
        if (this.value === 'percentage') {
            discountLabel.innerHTML = 'Nilai Diskon (%) <span class="text-red-500">*</span>';
        } else {
            discountLabel.innerHTML = 'Nilai Diskon (Rp) <span class="text-red-500">*</span>';
        }
    });

    // Delete confirmation logic
    const deleteCheckbox = document.getElementById('deleteCheckbox');
    const deleteConfirmation = document.getElementById('deleteConfirmation');
    const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
    const deleteBtn = document.getElementById('deleteBtn');
    
    deleteCheckbox?.addEventListener('change', function() {
        if (this.checked) {
            deleteConfirmation.classList.remove('hidden');
            deleteBtn.classList.add('hidden');
        } else {
            deleteConfirmation.classList.add('hidden');
            deleteBtn.classList.remove('hidden');
        }
    });
    
    cancelDeleteBtn?.addEventListener('click', function() {
        deleteCheckbox.checked = false;
        deleteConfirmation.classList.add('hidden');
        deleteBtn.classList.remove('hidden');
    });
    
    deleteBtn?.addEventListener('click', function() {
        if (confirm('Hapus promo "{{ $promotion->title }}" secara permanen?')) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route("admin.promotions.destroy", $promotion->id) }}';
            form.innerHTML = `@csrf @method('DELETE')`;
            document.body.appendChild(form);
            form.submit();
        }
    });
</script>
@endpush

@endsection