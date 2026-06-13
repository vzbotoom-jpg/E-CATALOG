@extends('layouts.app')
@section('title', 'Tentang Kami — SpaceINT')

@section('content')

<div class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Hero --}}
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-black mb-4">Tentang SpaceINT</h1>
            <p class="text-gray-500 max-w-2xl mx-auto">
                Space Interior Solution — mitra terpercaya untuk proyek furnitur skala besar Anda
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
            <div>
                <h2 class="text-2xl font-bold text-black mb-4">Kami Adalah SpaceINT</h2>
                <p class="text-gray-600 leading-relaxed mb-4">
                    SpaceINT adalah perusahaan yang bergerak di bidang solusi interior dan furnitur skala besar. 
                    Kami berdedikasi untuk memberikan layanan konsultasi, pengukuran presisi, dan desain furnitur 
                    yang disesuaikan dengan kebutuhan ruangan Anda.
                </p>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Dengan pengalaman lebih dari 5 tahun di industri ini, kami telah menangani berbagai proyek 
                    mulai dari residential, perkantoran, hotel, hingga properti komersial lainnya.
                </p>
                <p class="text-gray-600 leading-relaxed">
                    Tim profesional kami siap membantu Anda mewujudkan ruang impian dengan furnitur berkualitas 
                    dan desain yang presisi.
                </p>
            </div>
            <div class="bg-gray-100 rounded-2xl overflow-hidden">
                <img src="https://placehold.co/600x400/e5e5e5/333333?text=SpaceINT+Team" 
                     alt="SpaceINT Team" class="w-full h-auto">
            </div>
        </div>

        {{-- Values --}}
        <div class="mb-16">
            <h2 class="text-2xl font-bold text-black text-center mb-8">Nilai-Nilai Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @php
                    $values = [
                        ['ti-ruler', 'Presisi', 'Pengukuran akurat untuk hasil yang sempurna'],
                        ['ti-heart', 'Integritas', 'Kami mengutamakan kejujuran dan transparansi'],
                        ['ti-star', 'Kualitas', 'Material dan pengerjaan terbaik untuk kepuasan Anda'],
                        ['ti-users', 'Kolaborasi', 'Bekerja sama dengan klien untuk hasil terbaik'],
                        ['ti-clock', 'Tepat Waktu', 'Komitmen terhadap deadline proyek'],
                        ['ti-shield-check', 'Garansi', 'Garansi kepuasan untuk setiap proyek'],
                    ];
                @endphp
                
                @foreach($values as $value)
                <div class="text-center p-6 border border-gray-100 rounded-2xl hover:shadow-md transition">
                    <div class="w-12 h-12 bg-black rounded-xl flex items-center justify-center mx-auto mb-4">
                        <i class="ti {{ $value[0] }} text-white text-xl"></i>
                    </div>
                    <h3 class="font-semibold text-black mb-2">{{ $value[1] }}</h3>
                    <p class="text-gray-500 text-sm">{{ $value[2] }}</p>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Stats --}}
        <div class="bg-black rounded-2xl p-12 mb-16">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                @php
                    $stats = [
                        ['50+', 'Proyek Selesai'],
                        ['25+', 'Klien Puas'],
                        ['5+', 'Tahun Pengalaman'],
                        ['100%', 'Kepuasan Terjamin'],
                    ];
                @endphp
                
                @foreach($stats as $stat)
                <div>
                    <div class="text-3xl md:text-4xl font-bold text-white mb-2">{{ $stat[0] }}</div>
                    <div class="text-gray-400 text-sm">{{ $stat[1] }}</div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- CTA --}}
        <div class="text-center">
            <h2 class="text-2xl font-bold text-black mb-4">Siap Memulai Proyek Anda?</h2>
            <p class="text-gray-500 mb-6">Konsultasikan kebutuhan furnitur skala besar Anda dengan tim ahli kami</p>
            <a href="{{ route('consultation') }}" 
               class="inline-block bg-black hover:bg-gray-800 text-white font-semibold px-8 py-3 rounded-xl transition">
                Konsultasi Gratis
            </a>
        </div>

    </div>
</div>

@endsection