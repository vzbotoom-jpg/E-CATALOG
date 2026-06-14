@extends('layouts.admin')
@section('title', 'Manajemen Portfolio')
@section('header', 'Portfolio')

@section('content')

<div class="flex justify-between items-center mb-6">
    <div>
        <p class="text-gray-400">Total {{ $portfolios->total() }} portfolio</p>
    </div>
    <a href="{{ route('admin.portfolios.create') }}" 
       class="bg-black hover:bg-gray-800 text-white px-4 py-2 rounded-xl text-sm transition flex items-center gap-2">
        <i class="ti ti-plus text-sm"></i> Tambah Portfolio
    </a>
</div>

<div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-50 text-xs text-gray-500 uppercase tracking-wider border-b border-gray-100">
                    <th class="px-5 py-3 text-left w-16">Gambar</th>
                    <th class="px-5 py-3 text-left">Judul</th>
                    <th class="px-5 py-3 text-left">Kategori</th>
                    <th class="px-5 py-3 text-left">Tahun</th>
                    <th class="px-5 py-3 text-center w-24">Unggulan</th>
                    <th class="px-5 py-3 text-center w-24">Status</th>
                    <th class="px-5 py-3 text-center w-24">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($portfolios as $portfolio)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-5 py-3">
                        <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden">
                            @if($portfolio->image)
                                <img src="{{ Storage::url($portfolio->image) }}" class="w-full h-full object-cover">
                            @else
                                <i class="ti ti-building text-gray-400 text-xl"></i>
                            @endif
                        </div>
                    </td>
                    <td class="px-5 py-3">
                        <div class="font-medium text-gray-800">{{ $portfolio->title }}</div>
                        <div class="text-xs text-gray-400 mt-0.5 line-clamp-1">{{ Str::limit($portfolio->description, 50) }}</div>
                    </td>
                    <td class="px-5 py-3">
                        <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full">{{ $portfolio->category }}</span>
                    </td>
                    <td class="px-5 py-3 text-gray-600">{{ $portfolio->year ?? '-' }}</td>
                    <td class="px-5 py-3 text-center">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer featured-toggle" data-id="{{ $portfolio->id }}"
                                   {{ $portfolio->is_featured ? 'checked' : '' }}>
                            <div class="w-9 h-5 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:bg-yellow-500 after:absolute after:top-[2px] after:start-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all"></div>
                        </label>
                    </td>
                    <td class="px-5 py-3 text-center">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer status-toggle" data-id="{{ $portfolio->id }}"
                                   {{ $portfolio->is_active ? 'checked' : '' }}>
                            <div class="w-9 h-5 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:bg-black after:absolute after:top-[2px] after:start-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all"></div>
                        </label>
                    </td>
                    <td class="px-5 py-3">
                        <div class="flex gap-2 justify-center">
                            <a href="{{ route('admin.portfolios.edit', $portfolio->id) }}" 
                               class="w-8 h-8 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center hover:bg-blue-100 transition"
                               title="Edit">
                                <i class="ti ti-edit text-sm"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.portfolios.destroy', $portfolio->id) }}"
                                  onsubmit="return confirm('Hapus portfolio {{ $portfolio->title }}?')" class="inline">
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
                    <td colspan="7" class="px-5 py-12 text-center text-gray-400">
                        <i class="ti ti-building text-4xl mb-3 block"></i>
                        Belum ada portfolio. <a href="{{ route('admin.portfolios.create') }}" class="text-blue-600 hover:underline">Tambah sekarang</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-5 py-4 border-t border-gray-100">
        {{ $portfolios->links() }}
    </div>
</div>

@push('scripts')
<script>
    document.querySelectorAll('.status-toggle').forEach(toggle => {
        toggle.addEventListener('change', function() {
            fetch(`/admin/portfolios/${this.dataset.id}/toggle-status`, {
                method: 'PATCH',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            });
        });
    });
    document.querySelectorAll('.featured-toggle').forEach(toggle => {
        toggle.addEventListener('change', function() {
            fetch(`/admin/portfolios/${this.dataset.id}/toggle-featured`, {
                method: 'PATCH',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            });
        });
    });
</script>
@endpush
@endsection