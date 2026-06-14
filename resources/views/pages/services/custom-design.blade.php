@extends('layouts.app')
@section('title', 'Desain Kustom — SpaceINT')

@section('content')

<div class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Breadcrumb --}}
        <div class="flex items-center gap-2 text-sm text-gray-500 mb-6">
            <a href="{{ route('home') }}" class="hover:text-black">Beranda</a>
            <i class="ti ti-chevron-right text-xs"></i>
            <span class="text-black">Desain Kustom</span>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold text-black mb-4">Desain Kustom</h1>
                <p class="text-gray-600 text-lg mb-6 leading-relaxed">
                    Desain furnitur yang disesuaikan dengan kebutuhan dan gaya ruangan Anda.
                </p>
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <i class="ti ti-check text-green-500 mt-1"></i>
                        <div>
                            <h3 class="font-semibold text-black">Fully Customizable</h3>
                            <p class="text-gray-500 text-sm">Ukuran, warna, dan material sesuai keinginan</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <i class="ti ti-check text-green-500 mt-1"></i>
                        <div>
                            <h3 class="font-semibold text-black">Desain Eksklusif</h3>
                            <p class="text-gray-500 text-sm">Tampilan unik yang tidak ditemukan di tempat lain</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <i class="ti ti-check text-green-500 mt-1"></i>
                        <div>
                            <h3 class="font-semibold text-black">Fungsional & Estetik</h3>
                            <p class="text-gray-500 text-sm">Menggabungkan keindahan dan fungsi optimal</p>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="{{ route('consultation') }}" class="inline-block bg-black text-white px-6 py-3 rounded-xl hover:bg-gray-800 transition">
                        Konsultasi Gratis
                    </a>
                </div>
            </div>
            <div class="bg-gray-100 rounded-2xl overflow-hidden">
                <img src="https://placehold.co/600x400/e5e5e5/333333?text=Custom+Design" alt="Desain Kustom" class="w-full h-auto">
            </div>
        </div>

        {{-- Gallery --}}
        <div>
            <h2 class="text-2xl font-bold text-black text-center mb-8">Koleksi Desain Kami</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @for($i = 1; $i <= 6; $i++)
                <div class="bg-gray-100 rounded-xl overflow-hidden">
                    <img src="https://placehold.co/400x300/e5e5e5/333333?text=Design+{{ $i }}" alt="Design {{ $i }}" class="w-full h-64 object-cover">
                </div>
                @endfor
            </div>
        </div>

    </div>
</div>

@endsection