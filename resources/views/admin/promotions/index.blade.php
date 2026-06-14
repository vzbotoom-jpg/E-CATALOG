@extends('layouts.admin')
@section('title', 'Manajemen Promo')
@section('header', 'Promotion')

@section('content')

<div class="flex justify-between items-center mb-6">
    <div>
        <p class="text-gray-400">Total {{ $promotions->total() }} promo</p>
    </div>
    <a href="{{ route('admin.promotions.create') }}" 
       class="bg-black hover:bg-gray-800 text-white px-4 py-2 rounded-xl text-sm transition flex items-center gap-2">
        <i class="ti ti-plus text-sm"></i> Tambah Promo
    </a>
</div>

<div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-50 text-xs text-gray-500 uppercase tracking-wider border-b border-gray-100">
                    <th class="px-5 py-3 text-left">Judul</th>
                    <th class="px-5 py-3 text-left">Diskon</th>
                    <th class="px-5 py-3 text-left">Min. Belanja</th>
                    <th class="px-5 py-3 text-left">Periode</th>
                    <th class="px-5 py-3 text-center w-24">Status</th>
                    <th class="px-5 py-3 text-center w-24">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($promotions as $promo)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-5 py-3">
                        <div class="font-medium text-gray-800">{{ $promo->title }}</div>
                        <div class="text-xs text-gray-400 mt-0.5 line-clamp-1">{{ Str::limit($promo->description, 50) }}</div>
                    </td>
                    <td class="px-5 py-3">
                        <span class="font-semibold text-red-500">
                            @if($promo->discount_type === 'percentage')
                                {{ $promo->discount_value }}% OFF
                            @else
                                Rp {{ number_format($promo->discount_value, 0, ',', '.') }}
                            @endif
                        </span>
                    </td>
                    <td class="px-5 py-3 text-gray-600">
                        @if($promo->min_purchase > 0)
                            Rp {{ number_format($promo->min_purchase, 0, ',', '.') }}
                        @else
                            <span class="text-gray-400">Tanpa minimal</span>
                        @endif
                    </td>
                    <td class="px-5 py-3">
                        <div class="text-xs">
                            <div>{{ \Carbon\Carbon::parse($promo->valid_from)->format('d/m/Y') }}</div>
                            <div class="text-gray-400">s/d</div>
                            <div>{{ \Carbon\Carbon::parse($promo->valid_until)->format('d/m/Y') }}</div>
                        </div>
                    </div>
                    <td class="px-5 py-3 text-center">
                        <span class="text-xs px-2 py-1 rounded-full {{ $promo->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                            {{ $promo->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </div>
                    <td class="px-5 py-3">
                        <div class="flex gap-2 justify-center">
                            <a href="{{ route('admin.promotions.edit', $promo->id) }}" 
                               class="w-8 h-8 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center hover:bg-blue-100 transition"
                               title="Edit">
                                <i class="ti ti-edit text-sm"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.promotions.destroy', $promo->id) }}"
                                  onsubmit="return confirm('Hapus promo {{ $promo->title }}?')" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="w-8 h-8 bg-red-50 text-red-500 rounded-lg flex items-center justify-center hover:bg-red-100 transition"
                                        title="Hapus">
                                    <i class="ti ti-trash text-sm"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <tr>
                    <td colspan="6" class="px-5 py-12 text-center text-gray-400">
                        <i class="ti ti-ticket text-4xl mb-3 block"></i>
                        Belum ada promo. <a href="{{ route('admin.promotions.create') }}" class="text-blue-600 hover:underline">Tambah sekarang</a>
                    </div>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-5 py-4 border-t border-gray-100">
        {{ $promotions->links() }}
    </div>
</div>

@endsection