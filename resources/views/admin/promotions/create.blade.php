@extends('layouts.admin')
@section('title', 'Tambah Promo')
@section('header', 'Tambah Promo')

@section('content')

<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.promotions.index') }}" class="text-gray-500 hover:text-black transition">
                    <i class="ti ti-arrow-left text-xl"></i>
                </a>
                <h1 class="text-xl font-bold text-black">Tambah Promo Baru</h1>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.promotions.store') }}" class="p-6 space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Judul Promo <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title') }}" required
                       class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tipe Diskon <span class="text-red-500">*</span></label>
                    <select name="discount_type" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black" id="discountType">
                        <option value="percentage">Persentase (%)</option>
                        <option value="nominal">Nominal (Rp)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" id="discountLabel">Nilai Diskon <span class="text-red-500">*</span></label>
                    <input type="number" name="discount_value" step="0.01" value="{{ old('discount_value') }}" required
                           class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="description" rows="3" 
                          class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black">{{ old('description') }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Mulai Berlaku <span class="text-red-500">*</span></label>
                    <input type="date" name="valid_from" value="{{ old('valid_from', date('Y-m-d')) }}" required
                           class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Berlaku Sampai <span class="text-red-500">*</span></label>
                    <input type="date" name="valid_until" value="{{ old('valid_until', date('Y-m-d', strtotime('+30 days'))) }}" required
                           class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Minimal Pembelian</label>
                <input type="number" name="min_purchase" value="{{ old('min_purchase', 0) }}"
                       class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black">
                <p class="text-xs text-gray-400 mt-1">Kosongkan atau 0 untuk tanpa minimal</p>
            </div>

            <div class="flex items-center gap-2 pt-2">
                <input type="checkbox" name="is_active" id="is_active" value="1" checked class="w-4 h-4 rounded border-gray-300 text-black">
                <label for="is_active" class="text-sm text-gray-700">Aktifkan promo</label>
            </div>

            <div class="flex gap-3 pt-4">
                <button type="submit" class="px-6 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition">
                    Simpan
                </button>
                <a href="{{ route('admin.promotions.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('discountType').addEventListener('change', function() {
        const label = document.getElementById('discountLabel');
        if (this.value === 'percentage') {
            label.innerHTML = 'Nilai Diskon (%) <span class="text-red-500">*</span>';
        } else {
            label.innerHTML = 'Nilai Diskon (Rp) <span class="text-red-500">*</span>';
        }
    });
</script>
@endpush
@endsection