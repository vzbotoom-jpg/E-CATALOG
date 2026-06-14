@extends('layouts.app')
@section('title', 'Pengukuran Presisi — SpaceINT')

@section('content')

<div class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Breadcrumb --}}
        <div class="flex items-center gap-2 text-sm text-gray-500 mb-6">
            <a href="{{ route('home') }}" class="hover:text-black">Beranda</a>
            <i class="ti ti-chevron-right text-xs"></i>
            <span class="text-black">Pengukuran Presisi</span>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold text-black mb-4">Pengukuran Presisi</h1>
                <p class="text-gray-600 text-lg mb-6 leading-relaxed">
                    Tim ahli kami akan mengukur ruangan Anda dengan teknologi presisi tinggi untuk hasil yang akurat.
                </p>
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <i class="ti ti-check text-green-500 mt-1"></i>
                        <div>
                            <h3 class="font-semibold text-black">Akurasi Tinggi</h3>
                            <p class="text-gray-500 text-sm">Pengukuran dengan ketelitian hingga milimeter</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <i class="ti ti-check text-green-500 mt-1"></i>
                        <div>
                            <h3 class="font-semibold text-black">Laporan Detail</h3>
                            <p class="text-gray-500 text-sm">Dokumentasi lengkap hasil pengukuran</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <i class="ti ti-check text-green-500 mt-1"></i>
                        <div>
                            <h3 class="font-semibold text-black">Teknologi Modern</h3>
                            <p class="text-gray-500 text-sm">Menggunakan peralatan canggih terbaru</p>
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
                <img src="https://placehold.co/600x400/e5e5e5/333333?text=Measurement+Service" alt="Pengukuran Presisi" class="w-full h-auto">
            </div>
        </div>

        {{-- Process Steps --}}
        <div class="mb-16">
            <h2 class="text-2xl font-bold text-black text-center mb-8">Proses Pengukuran</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="text-center p-6 border border-gray-100 rounded-2xl">
                    <div class="w-12 h-12 bg-black rounded-xl flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold text-lg">1</span>
                    </div>
                    <h3 class="font-semibold text-black mb-2">Survey Lokasi</h3>
                    <p class="text-gray-500 text-sm">Tim kami akan mengunjungi lokasi proyek Anda</p>
                </div>
                <div class="text-center p-6 border border-gray-100 rounded-2xl">
                    <div class="w-12 h-12 bg-black rounded-xl flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold text-lg">2</span>
                    </div>
                    <h3 class="font-semibold text-black mb-2">Pengukuran Detail</h3>
                    <p class="text-gray-500 text-sm">Pengukuran presisi setiap sudut ruangan</p>
                </div>
                <div class="text-center p-6 border border-gray-100 rounded-2xl">
                    <div class="w-12 h-12 bg-black rounded-xl flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold text-lg">3</span>
                    </div>
                    <h3 class="font-semibold text-black mb-2">Laporan & Rekomendasi</h3>
                    <p class="text-gray-500 text-sm">Dokumentasi lengkap dan saran desain</p>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection