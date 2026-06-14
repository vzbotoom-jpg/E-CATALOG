@extends('layouts.app')
@section('title', 'Proyek Skala Besar — SpaceINT')

@section('content')

<div class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Breadcrumb --}}
        <div class="flex items-center gap-2 text-sm text-gray-500 mb-6">
            <a href="{{ route('home') }}" class="hover:text-black">Beranda</a>
            <i class="ti ti-chevron-right text-xs"></i>
            <span class="text-black">Proyek Skala Besar</span>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold text-black mb-4">Proyek Skala Besar</h1>
                <p class="text-gray-600 text-lg mb-6 leading-relaxed">
                    Berpengalaman menangani proyek furnitur untuk perkantoran, hotel, dan properti komersial.
                </p>
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <i class="ti ti-check text-green-500 mt-1"></i>
                        <div>
                            <h3 class="font-semibold text-black">Manajemen Proyek</h3>
                            <p class="text-gray-500 text-sm">Tim profesional menangani proyek dari awal hingga selesai</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <i class="ti ti-check text-green-500 mt-1"></i>
                        <div>
                            <h3 class="font-semibold text-black">Volume Besar</h3>
                            <p class="text-gray-500 text-sm">Kapasitas produksi untuk pesanan dalam jumlah besar</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <i class="ti ti-check text-green-500 mt-1"></i>
                        <div>
                            <h3 class="font-semibold text-black">Tepat Waktu</h3>
                            <p class="text-gray-500 text-sm">Komitmen terhadap deadline proyek</p>
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
                <img src="https://placehold.co/600x400/e5e5e5/333333?text=Large+Scale+Project" alt="Proyek Skala Besar" class="w-full h-auto">
            </div>
        </div>

        {{-- Portfolio --}}
        <div>
            <h2 class="text-2xl font-bold text-black text-center mb-8">Proyek yang Telah Kami Tangani</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-gray-100 rounded-xl overflow-hidden">
                    <img src="https://placehold.co/600x400/e5e5e5/333333?text=Office+Project" alt="Office Project" class="w-full h-64 object-cover">
                    <div class="p-4">
                        <h3 class="font-semibold text-black">Kantor Pusat</h3>
                        <p class="text-gray-500 text-sm">Proyek furnitur untuk 500 karyawan</p>
                    </div>
                </div>
                <div class="bg-gray-100 rounded-xl overflow-hidden">
                    <img src="https://placehold.co/600x400/e5e5e5/333333?text=Hotel+Project" alt="Hotel Project" class="w-full h-64 object-cover">
                    <div class="p-4">
                        <h3 class="font-semibold text-black">Hotel Bintang 5</h3>
                        <p class="text-gray-500 text-sm">200 kamar hotel dengan desain eksklusif</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection