@extends('layouts.app')
@section('title', 'SpaceINT — Space Interior Solution')

@section('content')

{{-- HERO SECTION dengan Image Background --}}
<section class="min-h-[80vh] flex items-center relative overflow-hidden"
         style="background-image: url('{{ asset('images/hero-bg.jpg') }}'); background-size: cover; background-position: center;">
    
    {{-- Dark Overlay untuk readability teks --}}
    <div class="absolute inset-0 bg-black/50"></div>
    
    {{-- Pattern Overlay --}}
    <div class="absolute inset-0 opacity-10">
        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
            <pattern id="dots" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                <circle cx="2" cy="2" r="1.5" fill="white" />
            </pattern>
            <rect width="100%" height="100%" fill="url(#dots)" />
        </svg>
    </div>
    
    {{-- Gradient Overlay tambahan untuk transisi halus --}}
    <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-transparent"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="animate-fade-in-up">
                <div class="inline-block px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-xs text-white mb-6">
                    ✦ Space Interior Solution
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
                    Desain Ruang <br>
                    <span class="text-gray-300">Yang Presisi</span>
                </h1>
                <p class="text-gray-200 text-lg mb-8 leading-relaxed">
                    Solusi lengkap untuk proyek furnitur skala besar — dari konsultasi, pengukuran, hingga desain interior yang presisi.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('consultation') }}" 
                       class="px-8 py-3 bg-white text-black font-medium rounded-xl hover:bg-gray-100 transition transform hover:-translate-y-0.5">
                        Konsultasi Gratis
                    </a>
                    <a href="{{ route('catalog') }}" 
                       class="px-8 py-3 border border-white text-white font-medium rounded-xl hover:bg-white/10 transition transform hover:-translate-y-0.5">
                       Lihat Katalog
                    </a>
                </div>
                
                {{-- Stats dengan teks putih --}}
                <div class="flex gap-8 mt-12 pt-8 border-t border-white/20">
                    <div class="group cursor-pointer">
                        <div class="text-3xl font-bold text-white group-hover:text-gray-300 transition">50+</div>
                        <div class="text-xs text-gray-300">Proyek Selesai</div>
                    </div>
                    <div class="group cursor-pointer">
                        <div class="text-3xl font-bold text-white group-hover:text-gray-300 transition">25+</div>
                        <div class="text-xs text-gray-300">Klien Puas</div>
                    </div>
                    <div class="group cursor-pointer">
                        <div class="text-3xl font-bold text-white group-hover:text-gray-300 transition">5+</div>
                        <div class="text-xs text-gray-300">Tahun Pengalaman</div>
                    </div>
                </div>
            </div>
            
            <div class="relative animate-fade-in-right">
                {{-- Decorative Circle --}}
                <div class="absolute -top-10 -right-10 w-40 h-40 bg-white rounded-full opacity-10"></div>
                <div class="absolute -bottom-10 -left-10 w-60 h-60 bg-white rounded-full opacity-5"></div>
                
                <div class="bg-white/10 backdrop-blur-sm rounded-3xl overflow-hidden shadow-2xl relative z-10 border border-white/20">
                    <img src="https://placehold.co/600x500/e5e5e5/333333?text=SpaceINT+Interior" 
                         alt="SpaceINT Interior" 
                         class="w-full h-auto hover:scale-105 transition-transform duration-700">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Wave Divider --}}
<div class="relative -mt-1">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100" fill="#f9fafb">
        <path d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,100L1360,100C1280,100,1120,100,960,100C800,100,640,100,480,100C320,100,160,100,80,100L0,100Z"></path>
    </svg>
</div>

{{-- SERVICES SECTION --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <div class="inline-block px-3 py-1 bg-black/5 rounded-full text-xs text-gray-500 mb-4">
                ✦ Layanan Kami
            </div>
            <h2 class="text-3xl font-bold text-black mb-4">Solusi Interior Terlengkap</h2>
            <p class="text-gray-500 max-w-2xl mx-auto">
                Kami menyediakan layanan profesional untuk kebutuhan furnitur skala besar Anda
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $services = [
                    ['ti-ruler', 'Pengukuran Presisi', 'Tim ahli kami akan mengukur ruangan Anda dengan teknologi presisi tinggi untuk hasil yang akurat.'],
                    ['ti-pencil', 'Desain Kustom', 'Desain furnitur yang disesuaikan dengan kebutuhan dan gaya ruangan Anda.'],
                    ['ti-building', 'Proyek Skala Besar', 'Berpengalaman menangani proyek furnitur untuk perkantoran, hotel, dan properti komersial.'],
                    ['ti-chart-line', 'Konsultasi Profesional', 'Konsultasi gratis untuk membantu Anda menentukan solusi terbaik.'],
                    ['ti-file-description', 'Dokumentasi Lengkap', 'Laporan pengukuran dan desain yang terdokumentasi dengan baik.'],
                    ['ti-headset', 'Dukungan Penuh', 'Tim support siap membantu Anda dari awal hingga proyek selesai.'],
                ];
            @endphp
            
            @foreach($services as $service)
            <div class="bg-white p-6 rounded-2xl border border-gray-100 hover:shadow-lg transition-all duration-300 hover:-translate-y-1 group">
                <div class="w-12 h-12 bg-black rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i class="ti {{ $service[0] }} text-white text-xl"></i>
                </div>
                <h3 class="font-bold text-lg text-black mb-2">{{ $service[1] }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed">{{ $service[2] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- PORTFOLIO PREVIEW SECTION =====
     Halaman ini punya menu "Portfolio" di navbar tapi belum ada preview
     visualnya di Home — padahal untuk proyek furnitur skala besar,
     bukti visual hasil kerja adalah social proof paling kuat.
     CATATAN: ganti route('portfolio') sesuai nama route asli project
     kamu kalau berbeda, dan ganti gambar placeholder dengan foto proyek nyata.
--}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between mb-12 gap-4">
            <div>
                <div class="inline-block px-3 py-1 bg-black/5 rounded-full text-xs text-gray-500 mb-4">
                    ✦ Portfolio
                </div>
                <h2 class="text-3xl font-bold text-black mb-2">Proyek yang Sudah Kami Kerjakan</h2>
                <p class="text-gray-500 max-w-xl">Sebagian dokumentasi hasil kerja nyata dari klien residential, perkantoran, hingga hotel</p>
            </div>
            <a href="{{ route('portfolio') }}" class="text-black font-medium hover:underline whitespace-nowrap">
                Lihat semua portfolio →
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
                $portfolioPreview = [
                    ['title' => 'Interior Kantor Modern', 'category' => 'Perkantoran', 'img' => 'https://placehold.co/500x400/e5e5e5/333333?text=Office+Project'],
                    ['title' => 'Furnitur Kamar Hotel', 'category' => 'Hotel', 'img' => 'https://placehold.co/500x400/e5e5e5/333333?text=Hotel+Project'],
                    ['title' => 'Interior Residensial', 'category' => 'Residential', 'img' => 'https://placehold.co/500x400/e5e5e5/333333?text=Residential+Project'],
                ];
            @endphp
            @foreach($portfolioPreview as $item)
            <div class="group rounded-2xl overflow-hidden border border-gray-100 hover:shadow-lg transition">
                <div class="aspect-[4/3] overflow-hidden bg-gray-100">
                    <img src="{{ $item['img'] }}" alt="{{ $item['title'] }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-5">
                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">{{ $item['category'] }}</span>
                    <h3 class="font-bold text-black mt-1">{{ $item['title'] }}</h3>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- TESTIMONIALS SECTION =====
     Ini elemen yang paling penting dan sebelumnya sama sekali tidak ada
     di seluruh halaman SpaceINT — padahal untuk proyek bernilai besar
     (perkantoran, hotel), calon klien butuh bukti pihak ketiga sebelum
     berani konsultasi. Ganti isi array di bawah dengan testimoni klien asli.
--}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <div class="inline-block px-3 py-1 bg-black/5 rounded-full text-xs text-gray-500 mb-4">
                ✦ Testimoni
            </div>
            <h2 class="text-3xl font-bold text-black mb-4">Apa Kata Klien Kami</h2>
            <p class="text-gray-500 max-w-2xl mx-auto">Kepercayaan klien adalah aset paling berharga bagi kami</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
                $testimonials = [
                    ['name' => 'Budi Hartono', 'role' => 'Manajer Operasional, Perusahaan Swasta', 'quote' => 'Pengukuran presisi dan desain kustomnya sangat membantu proyek renovasi kantor kami. Semua sesuai timeline yang dijanjikan.'],
                    ['name' => 'Sarah Wijaya', 'role' => 'F&B Manager, Hotel Bintang 4', 'quote' => 'Furnitur kamar hotel yang dipesan sesuai spesifikasi dan tahan lama. Tim SpaceINT sangat profesional dari awal hingga instalasi.'],
                    ['name' => 'Andi Pratama', 'role' => 'Pemilik Properti Residensial', 'quote' => 'Konsultasi gratisnya membantu saya menentukan solusi terbaik tanpa tekanan. Hasil akhirnya melebihi ekspektasi.'],
                ];
            @endphp
            @foreach($testimonials as $t)
            <div class="bg-white rounded-2xl p-6 border border-gray-100 flex flex-col">
                <div class="flex gap-1 mb-4">
                    @for($i = 0; $i < 5; $i++)
                        <i class="ti ti-star-filled text-black text-sm"></i>
                    @endfor
                </div>
                <p class="text-gray-600 text-sm leading-relaxed mb-6 flex-1">&ldquo;{{ $t['quote'] }}&rdquo;</p>
                <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
                    <div class="w-10 h-10 rounded-full bg-black text-white font-bold flex items-center justify-center text-sm flex-shrink-0">
                        {{ strtoupper(substr($t['name'], 0, 1)) }}
                    </div>
                    <div class="min-w-0">
                        <p class="font-semibold text-black text-sm truncate">{{ $t['name'] }}</p>
                        <p class="text-gray-400 text-xs truncate">{{ $t['role'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- TRUST BAR SECTION =====
     Strip singkat untuk menghilangkan keraguan instan sebelum CTA akhir.
     CATATAN: jangan cantumkan klaim sertifikasi/legalitas (mis. "PT/CV
     Berbadan Hukum", "Bersertifikat ISO") kalau memang belum benar-benar
     dimiliki SpaceINT — ganti/hapus butir itu sesuai fakta.
--}}
<section class="py-12 bg-white border-y border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['ti-shield-check', 'Garansi Kepuasan', 'Setiap proyek dilengkapi garansi tertulis'],
                ['ti-map-pin', 'Survei Lokasi', 'Pengukuran langsung di lokasi Anda'],
                ['ti-clock', 'Respon Cepat', 'Konsultasi dibalas dalam 1x24 jam'],
                ['ti-headset', 'Tanpa Komitmen', 'Konsultasi awal 100% gratis'],
            ] as [$icon, $title, $desc])
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 bg-black/5 rounded-xl flex items-center justify-center flex-shrink-0">
                    <i class="ti {{ $icon }} text-black text-lg"></i>
                </div>
                <div class="min-w-0">
                    <p class="font-semibold text-black text-sm leading-snug">{{ $title }}</p>
                    <p class="text-gray-500 text-xs mt-0.5 leading-relaxed">{{ $desc }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA SECTION --}}
<section class="py-20 bg-black relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
            <pattern id="grid-white" width="30" height="30" patternUnits="userSpaceOnUse">
                <path d="M 30 0 L 0 0 0 30" fill="none" stroke="white" stroke-width="0.5"/>
            </pattern>
            <rect width="100%" height="100%" fill="url(#grid-white)" />
        </svg>
    </div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <div class="inline-block px-3 py-1 bg-white/10 backdrop-blur-sm rounded-full text-xs text-gray-300 mb-4">
            ✦ Siap Memulai
        </div>
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Siap Memulai Proyek Anda?</h2>
        <p class="text-gray-400 mb-8 max-w-2xl mx-auto">
            Konsultasikan kebutuhan furnitur skala besar Anda dengan tim ahli kami secara gratis.
        </p>
        <a href="{{ route('consultation') }}" 
           class="inline-block px-8 py-3 bg-white text-black font-semibold rounded-xl hover:bg-gray-100 transition transform hover:-translate-y-0.5">
            Konsultasi Gratis
        </a>
    </div>
</section>

@endsection