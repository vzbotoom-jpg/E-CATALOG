@extends('layouts.app')
@section('title', $catalog->name . ' — SpaceINT')

@section('content')

<div class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Breadcrumb --}}
        <div class="flex items-center gap-2 text-sm text-gray-500 mb-6">
            <a href="{{ route('home') }}" class="hover:text-black">Beranda</a>
            <i class="ti ti-chevron-right text-xs"></i>
            <a href="{{ route('catalog') }}" class="hover:text-black">Katalog</a>
            <i class="ti ti-chevron-right text-xs"></i>
            <span class="text-black">{{ $catalog->name }}</span>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            {{-- Image --}}
            <div>
                <div class="bg-gray-100 rounded-2xl overflow-hidden">
                    @if($catalog->image)
                        <img src="{{ Storage::url($catalog->image) }}" 
                             alt="{{ $catalog->name }}"
                             class="w-full h-auto">
                    @else
                        <div class="aspect-square flex items-center justify-center">
                            <i class="ti ti-file-description text-gray-300 text-8xl"></i>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Info --}}
            <div>
                <div class="text-sm text-gray-400 mb-2">{{ $catalog->category }}</div>
                <h1 class="text-3xl font-bold text-black mb-4">{{ $catalog->name }}</h1>
                <p class="text-gray-600 leading-relaxed mb-6">{{ $catalog->description }}</p>
                
                {{-- Download PDF --}}
                @if($catalog->pdf_file)
                <a href="{{ route('catalog.download', $catalog->id) }}" 
                   class="inline-flex items-center gap-2 bg-black text-white px-6 py-3 rounded-xl hover:bg-gray-800 transition">
                    <i class="ti ti-file-pdf text-lg"></i>
                    Download PDF Katalog
                </a>
                @endif

                {{-- Consultation CTA --}}
                <div class="mt-8 pt-8 border-t border-gray-100">
                    <h3 class="font-semibold text-black mb-2">Butuh konsultasi?</h3>
                    <p class="text-gray-500 text-sm mb-4">Tim ahli kami siap membantu Anda memilih produk yang tepat.</p>
                    <a href="{{ route('consultation') }}" 
                       class="inline-flex items-center gap-2 border border-black text-black px-6 py-3 rounded-xl hover:bg-black hover:text-white transition">
                        Konsultasi Gratis
                        <i class="ti ti-arrow-right text-sm"></i>
                    </a>
                </div>
            </div>
        </div>

        {{-- Related Catalogs --}}
        @if($relatedCatalogs && $relatedCatalogs->count() > 0)
        <div class="mt-16">
            <h2 class="text-2xl font-bold text-black mb-6">Produk Terkait</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($relatedCatalogs as $related)
                <a href="{{ route('catalog.show', $related->id) }}" class="group">
                    <div class="bg-gray-100 rounded-xl overflow-hidden aspect-square">
                        @if($related->image)
                            <img src="{{ Storage::url($related->image) }}" 
                                 alt="{{ $related->name }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <i class="ti ti-file-description text-gray-300 text-4xl"></i>
                            </div>
                        @endif
                    </div>
                    <h3 class="font-semibold text-black mt-3 group-hover:text-gray-600 transition">{{ $related->name }}</h3>
                    <p class="text-xs text-gray-400">{{ $related->category }}</p>
                </a>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</div>

@endsection