@extends('layouts.app')
@section('title', 'Portfolio — SpaceINT')

@section('content')

<div class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Header --}}
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-black mb-4">Portfolio Proyek</h1>
            <p class="text-gray-500 max-w-2xl mx-auto">
                Koleksi proyek furnitur dan interior yang telah kami selesaikan untuk klien di seluruh Indonesia
            </p>
        </div>

        {{-- Filter Kategori --}}
        @if($categories && $categories->count() > 0)
        <div class="flex flex-wrap justify-center gap-3 mb-6">
            <button class="filter-btn px-4 py-2 rounded-full text-sm transition-all bg-black text-white" data-filter="all">
                Semua
            </button>
            @foreach($categories as $category)
            <button class="filter-btn px-4 py-2 rounded-full text-sm transition-all bg-gray-100 text-gray-700 hover:bg-gray-200" data-filter="{{ $category }}">
                {{ $category }}
            </button>
            @endforeach
        </div>
        @endif

        {{-- Filter Tahun --}}
        @if($years && $years->count() > 0)
        <div class="flex flex-wrap justify-center gap-2 mb-10">
            @foreach($years as $year)
            <button class="year-btn px-3 py-1.5 rounded-lg text-xs transition-all bg-gray-100 text-gray-600 hover:bg-gray-200" data-year="{{ $year }}">
                {{ $year }}
            </button>
            @endforeach
        </div>
        @endif

        {{-- Featured Portfolio --}}
        @if(isset($featuredPortfolios) && $featuredPortfolios->count() > 0)
        <div class="mb-12">
            <h2 class="text-xl font-semibold text-black mb-4 text-center">Proyek Unggulan</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($featuredPortfolios as $featured)
                <a href="{{ route('portfolio.show', $featured->id) }}" class="group relative overflow-hidden rounded-2xl">
                    <div class="aspect-video bg-gray-100 overflow-hidden">
                        @if($featured->image)
                            <img src="{{ Storage::url($featured->image) }}" 
                                 alt="{{ $featured->title }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <i class="ti ti-building text-gray-300 text-5xl"></i>
                            </div>
                        @endif
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4">
                        <div>
                            <h3 class="text-white font-semibold">{{ $featured->title }}</h3>
                            <p class="text-gray-300 text-sm">{{ $featured->category }} {{ $featured->year ? '• ' . $featured->year : '' }}</p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Grid Portfolio --}}
        @if($portfolios && $portfolios->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($portfolios as $portfolio)
            <div class="portfolio-item group bg-white rounded-2xl border border-gray-100 overflow-hidden hover:shadow-lg transition-all" 
                 data-category="{{ $portfolio->category }}" 
                 data-year="{{ $portfolio->year }}">
                <a href="{{ route('portfolio.show', $portfolio->id) }}">
                    <div class="aspect-square bg-gray-100 overflow-hidden">
                        @if($portfolio->image)
                            <img src="{{ Storage::url($portfolio->image) }}" 
                                 alt="{{ $portfolio->title }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <i class="ti ti-building text-gray-300 text-6xl"></i>
                            </div>
                        @endif
                    </div>
                    <div class="p-5">
                        <div class="flex items-center justify-between mb-2">
                            <div class="text-xs text-gray-400">{{ $portfolio->category }}</div>
                            @if($portfolio->year)
                            <div class="text-xs text-gray-400">{{ $portfolio->year }}</div>
                            @endif
                        </div>
                        <h3 class="font-bold text-lg text-black mb-2 line-clamp-1">{{ $portfolio->title }}</h3>
                        @if($portfolio->location)
                        <p class="text-xs text-gray-400 mb-2">
                            <i class="ti ti-map-pin text-xs"></i> {{ $portfolio->location }}
                        </p>
                        @endif
                        <p class="text-gray-500 text-sm line-clamp-2 mb-4">{{ $portfolio->description }}</p>
                        <div class="flex items-center justify-end">
                            <span class="text-black font-medium group-hover:translate-x-1 transition-transform inline-flex items-center gap-1">
                                Lihat Detail <i class="ti ti-arrow-right text-sm"></i>
                            </span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-16">
            <i class="ti ti-building-off text-5xl text-gray-300 mb-4 block"></i>
            <p class="text-gray-400">Belum ada portfolio</p>
            <p class="text-gray-300 text-sm mt-1">Silakan cek kembali nanti</p>
        </div>
        @endif

        {{-- Pagination --}}
        @if($portfolios && $portfolios->hasPages())
        <div class="mt-12">
            {{ $portfolios->links() }}
        </div>
        @endif

    </div>
</div>

@push('scripts')
<script>
    // Filter portfolio by category and year
    function filterPortfolio() {
        const activeCategory = document.querySelector('.filter-btn.bg-black')?.dataset.filter || 'all';
        const activeYear = document.querySelector('.year-btn.bg-black')?.dataset.year || 'all';
        
        const items = document.querySelectorAll('.portfolio-item');
        
        items.forEach(item => {
            const itemCategory = item.dataset.category;
            const itemYear = item.dataset.year;
            
            const categoryMatch = activeCategory === 'all' || itemCategory === activeCategory;
            const yearMatch = activeYear === 'all' || (itemYear && itemYear == activeYear);
            
            if (categoryMatch && yearMatch) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }
    
    // Initialize filter buttons
    const filterBtns = document.querySelectorAll('.filter-btn');
    if (filterBtns.length > 0) {
        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                filterBtns.forEach(b => {
                    b.classList.remove('bg-black', 'text-white');
                    b.classList.add('bg-gray-100', 'text-gray-700');
                });
                btn.classList.remove('bg-gray-100', 'text-gray-700');
                btn.classList.add('bg-black', 'text-white');
                filterPortfolio();
            });
        });
    }
    
    // Initialize year buttons
    const yearBtns = document.querySelectorAll('.year-btn');
    if (yearBtns.length > 0) {
        yearBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                yearBtns.forEach(b => {
                    b.classList.remove('bg-black', 'text-white');
                    b.classList.add('bg-gray-100', 'text-gray-600');
                });
                btn.classList.remove('bg-gray-100', 'text-gray-600');
                btn.classList.add('bg-black', 'text-white');
                filterPortfolio();
            });
        });
    }
</script>
@endpush

@endsection