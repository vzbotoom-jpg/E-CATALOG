@extends('layouts.app')
@section('title', $portfolio->title . ' — SpaceINT')

@section('content')

<div class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Breadcrumb --}}
        <div class="flex items-center gap-2 text-sm text-gray-500 mb-6">
            <a href="{{ route('home') }}" class="hover:text-black">Beranda</a>
            <i class="ti ti-chevron-right text-xs"></i>
            <a href="{{ route('portfolio') }}" class="hover:text-black">Portfolio</a>
            <i class="ti ti-chevron-right text-xs"></i>
            <span class="text-black">{{ $portfolio->title }}</span>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            {{-- Image Gallery --}}
            <div>
                <div class="bg-gray-100 rounded-2xl overflow-hidden mb-4">
                    @if($portfolio->image)
                        <img src="{{ Storage::url($portfolio->image) }}" 
                             alt="{{ $portfolio->title }}"
                             id="mainImage"
                             class="w-full h-auto cursor-pointer">
                    @else
                        <div class="aspect-square flex items-center justify-center">
                            <i class="ti ti-building text-gray-300 text-8xl"></i>
                        </div>
                    @endif
                </div>
                
                {{-- Thumbnails (if gallery exists) --}}
                @if($portfolio->gallery && is_array(json_decode($portfolio->gallery)))
                <div class="grid grid-cols-4 gap-2">
                    @foreach(json_decode($portfolio->gallery) as $gallery)
                    <div class="aspect-square bg-gray-100 rounded-xl overflow-hidden cursor-pointer border-2 border-transparent hover:border-black transition"
                         onclick="changeImage('{{ Storage::url($gallery) }}')">
                        <img src="{{ Storage::url($gallery) }}" class="w-full h-full object-cover">
                    </div>
                    @endforeach
                </div>
                @endif
            </div>

            {{-- Info --}}
            <div>
                <div class="text-sm text-gray-400 mb-2">{{ $portfolio->category }}</div>
                <h1 class="text-3xl font-bold text-black mb-4">{{ $portfolio->title }}</h1>
                
                @if($portfolio->location || $portfolio->year)
                <div class="flex flex-wrap gap-4 mb-6 pb-4 border-b border-gray-100">
                    @if($portfolio->location)
                    <div class="flex items-center gap-2 text-gray-500 text-sm">
                        <i class="ti ti-map-pin"></i> {{ $portfolio->location }}
                    </div>
                    @endif
                    @if($portfolio->year)
                    <div class="flex items-center gap-2 text-gray-500 text-sm">
                        <i class="ti ti-calendar"></i> {{ $portfolio->year }}
                    </div>
                    @endif
                </div>
                @endif
                
                <div class="prose prose-sm max-w-none text-gray-600 leading-relaxed mb-8">
                    {!! nl2br(e($portfolio->description)) !!}
                </div>
                
                {{-- Consultation CTA --}}
                <div class="bg-gray-50 rounded-2xl p-6">
                    <h3 class="font-semibold text-black mb-2">Tertarik dengan proyek serupa?</h3>
                    <p class="text-gray-500 text-sm mb-4">Konsultasikan kebutuhan furnitur dan interior Anda dengan tim ahli kami.</p>
                    <a href="{{ route('consultation') }}" 
                       class="inline-flex items-center gap-2 bg-black text-white px-6 py-3 rounded-xl hover:bg-gray-800 transition">
                        Konsultasi Gratis
                        <i class="ti ti-arrow-right text-sm"></i>
                    </a>
                </div>
            </div>
        </div>

        {{-- Related Portfolios --}}
        @if($relatedPortfolios && $relatedPortfolios->count() > 0)
        <div class="mt-16">
            <h2 class="text-2xl font-bold text-black mb-6">Proyek Terkait</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedPortfolios as $related)
                <a href="{{ route('portfolio.show', $related->id) }}" class="group">
                    <div class="bg-gray-100 rounded-xl overflow-hidden aspect-square">
                        @if($related->image)
                            <img src="{{ Storage::url($related->image) }}" 
                                 alt="{{ $related->title }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <i class="ti ti-building text-gray-300 text-4xl"></i>
                            </div>
                        @endif
                    </div>
                    <h3 class="font-semibold text-black mt-3 group-hover:text-gray-600 transition">{{ $related->title }}</h3>
                    <p class="text-xs text-gray-400">{{ $related->category }}</p>
                </a>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</div>

{{-- Image Modal --}}
<div id="imageModal" class="fixed inset-0 bg-black/90 z-50 hidden items-center justify-center" onclick="closeImageModal()">
    <div class="relative max-w-4xl max-h-[90vh]">
        <img id="modalImage" src="" class="max-w-full max-h-[90vh] object-contain rounded-2xl">
        <button class="absolute -top-12 right-0 text-white hover:text-gray-300 transition" onclick="closeImageModal()">
            <i class="ti ti-x text-3xl"></i>
        </button>
    </div>
</div>

@push('scripts')
<script>
    function changeImage(src) {
        document.getElementById('mainImage').src = src;
    }
    
    function openImageModal() {
        const modal = document.getElementById('imageModal');
        const modalImg = document.getElementById('modalImage');
        modalImg.src = document.getElementById('mainImage').src;
        modal.classList.remove('hidden');
        modal.style.display = 'flex';
    }
    
    function closeImageModal() {
        const modal = document.getElementById('imageModal');
        modal.classList.add('hidden');
        modal.style.display = 'none';
    }
    
    document.getElementById('mainImage')?.addEventListener('click', openImageModal);
</script>
@endpush

@endsection