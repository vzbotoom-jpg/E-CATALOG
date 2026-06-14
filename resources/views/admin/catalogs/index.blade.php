@extends('layouts.admin')
@section('title', 'Manajemen Katalog')
@section('header', 'Katalog')

@section('content')

<div class="flex justify-between items-center mb-6">
    <div>
        <p class="text-gray-400">Total {{ $catalogs->total() }} katalog</p>
    </div>
    <a href="{{ route('admin.catalogs.create') }}" 
       class="bg-black hover:bg-gray-800 text-white px-4 py-2 rounded-xl text-sm transition flex items-center gap-2">
        <i class="ti ti-plus text-sm"></i> Tambah Katalog
    </a>
</div>

<div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-50 text-xs text-gray-500 uppercase tracking-wider border-b border-gray-100">
                    <th class="px-5 py-3 text-left w-16">Gambar</th>
                    <th class="px-5 py-3 text-left">Nama</th>
                    <th class="px-5 py-3 text-left">Kategori</th>
                    <th class="px-5 py-3 text-left">PDF</th>
                    <th class="px-5 py-3 text-center w-24">Status</th>
                    <th class="px-5 py-3 text-center w-24">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($catalogs as $catalog)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-5 py-3">
                        <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden">
                            @if($catalog->image)
                                <img src="{{ Storage::url($catalog->image) }}" class="w-full h-full object-cover">
                            @else
                                <i class="ti ti-file-description text-gray-400 text-xl"></i>
                            @endif
                        </div>
                    </td>
                    <td class="px-5 py-3">
                        <div class="font-medium text-gray-800">{{ $catalog->name }}</div>
                        <div class="text-xs text-gray-400 mt-0.5 line-clamp-1">{{ Str::limit($catalog->description, 60) }}</div>
                    </td>
                    <td class="px-5 py-3">
                        <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full">{{ $catalog->category }}</span>
                    </td>
                    <td class="px-5 py-3">
                        @if($catalog->pdf_file)
                            <a href="{{ Storage::url($catalog->pdf_file) }}" target="_blank" class="text-blue-600 hover:underline text-xs flex items-center gap-1">
                                <i class="ti ti-file-pdf text-sm"></i> Download
                            </a>
                        @else
                            <span class="text-gray-400 text-xs">-</span>
                        @endif
                    </td>
                    <td class="px-5 py-3 text-center">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer status-toggle" data-id="{{ $catalog->id }}"
                                   {{ $catalog->is_active ? 'checked' : '' }}>
                            <div class="w-9 h-5 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:bg-black after:absolute after:top-[2px] after:start-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all"></div>
                        </label>
                    </td>
                    <td class="px-5 py-3">
                        <div class="flex gap-2 justify-center">
                            <a href="{{ route('admin.catalogs.edit', $catalog->id) }}" 
                               class="w-8 h-8 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center hover:bg-blue-100 transition"
                               title="Edit">
                                <i class="ti ti-edit text-sm"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.catalogs.destroy', $catalog->id) }}"
                                  onsubmit="return confirm('Hapus katalog {{ $catalog->name }}?')" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="w-8 h-8 bg-red-50 text-red-500 rounded-lg flex items-center justify-center hover:bg-red-100 transition"
                                        title="Hapus">
                                    <i class="ti ti-trash text-sm"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-5 py-12 text-center text-gray-400">
                        <i class="ti ti-file-description text-4xl mb-3 block"></i>
                        Belum ada katalog. <a href="{{ route('admin.catalogs.create') }}" class="text-blue-600 hover:underline">Tambah sekarang</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-5 py-4 border-t border-gray-100">
        {{ $catalogs->links() }}
    </div>
</div>

@push('scripts')
<script>
    document.querySelectorAll('.status-toggle').forEach(toggle => {
        toggle.addEventListener('change', function() {
            fetch(`/admin/catalogs/${this.dataset.id}/toggle-status`, {
                method: 'PATCH',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Content-Type': 'application/json' }
            }).catch(err => console.error('Error:', err));
        });
    });
</script>
@endpush
@endsection