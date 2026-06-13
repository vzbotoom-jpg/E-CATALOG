@extends('layouts.app')
@section('title', 'Katalog — SpaceINT')

@section('content')

<div class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Header --}}
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-black mb-4">Katalog Produk</h1>
            <p class="text-gray-500 max-w-2xl mx-auto">
                Koleksi lengkap furnitur dan interior untuk proyek skala besar Anda
            </p>
        </div>

        {{-- Filter Kategori --}}
        <div class="flex flex-wrap justify-center gap-3 mb-10">
            <button class="filter-btn px-4 py-2 rounded-full text-sm transition-all bg-black text-white" data-filter="all">
                Semua
            </button>
            @foreach($categories as $category)
            <button class="filter-btn px-4 py-2 rounded-full text-sm transition-all bg-gray-100 text-gray-700 hover:bg-gray-200" data-filter="{{ $category }}">
                {{ $category }}
            </button>
            @endforeach
        </div>

        {{-- Grid Katalog --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($catalogs as $catalog)
            <div class="catalog-item group bg-white rounded-2xl border border-gray-100 overflow-hidden hover:shadow-lg transition-all" data-category="{{ $catalog->category }}">
                <a href="{{ route('catalog.show', $catalog->id) }}">
                    <div class="aspect-square bg-gray-100 overflow-hidden">
                        @if($catalog->image)
                            <img src="{{ Storage::url($catalog->image) }}" 
                                 alt="{{ $catalog->name }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <i class="ti ti-file-description text-gray-300 text-6xl"></i>
                            </div>
                        @endif
                    </div>
                    <div class="p-5">
                        <div class="text-xs text-gray-400 mb-1">{{ $catalog->category }}</div>
                        <h3 class="font-bold text-lg text-black mb-2 line-clamp-1">{{ $catalog->name }}</h3>
                        <p class="text-gray-500 text-sm line-clamp-2 mb-4">{{ $catalog->description }}</p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-400">
                                <i class="ti ti-file-pdf"></i> PDF Available
                            </span>
                            <span class="text-black font-medium group-hover:translate-x-1 transition-transform inline-flex items-center gap-1">
                                Lihat Detail <i class="ti ti-arrow-right text-sm"></i>
                            </span>
                        </div>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-span-3 text-center py-16">
                <i class="ti ti-file-off text-5xl text-gray-300 mb-4 block"></i>
                <p class="text-gray-400">Belum ada katalog</p>
                <p class="text-gray-300 text-sm mt-1">Silakan cek kembali nanti</p>
            </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-12">
            {{ $catalogs->links() }}
        </div>

    </div>
</div>

@push('scripts')
<script>
    // Filter portfolio items
    function filterCatalog(category) {
        const items = document.querySelectorAll('.catalog-item');
        
        items.forEach(item => {
            if (category === 'all' || item.dataset.category === category) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
        
        // Update active filter button
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.classList.remove('bg-black', 'text-white');
            btn.classList.add('bg-gray-100', 'text-gray-700');
        });
        
        const activeBtn = document.querySelector(`.filter-btn[data-filter="${category}"]`);
        if (activeBtn) {
            activeBtn.classList.remove('bg-gray-100', 'text-gray-700');
            activeBtn.classList.add('bg-black', 'text-white');
        }
    }
    
    // Initialize filter buttons
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            filterCatalog(btn.dataset.filter);
        });
    });
</script>
@endpush

@endsection