@extends('layouts.app')
@section('title', 'Promotion — SpaceINT')

@section('content')

<div class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Header --}}
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-black mb-4">Promotions</h1>
            <p class="text-gray-500 max-w-2xl mx-auto">
                Dapatkan penawaran menarik dan diskon spesial untuk proyek furnitur Anda
            </p>
        </div>

        {{-- Promotion Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $promotions = [
                    [
                        'title' => 'Diskon Grand Opening',
                        'discount' => '20%',
                        'description' => 'Diskon 20% untuk konsultasi pertama Anda',
                        'valid_until' => '31 Desember 2026',
                        'icon' => 'ti-ticket',
                    ],
                    [
                        'title' => 'Free Konsultasi',
                        'discount' => '100%',
                        'description' => 'Konsultasi gratis untuk proyek skala besar',
                        'valid_until' => 'Selamanya',
                        'icon' => 'ti-headset',
                    ],
                    [
                        'title' => 'Paket Hemat',
                        'discount' => 'Rp 5.000.000',
                        'description' => 'Potongan Rp 5.000.000 untuk order di atas Rp 50.000.000',
                        'valid_until' => '31 Desember 2026',
                        'icon' => 'ti-wallet',
                    ],
                ];
            @endphp
            
            @foreach($promotions as $promo)
            <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden hover:shadow-lg transition">
                <div class="bg-black p-6 text-center">
                    <div class="w-16 h-16 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="ti {{ $promo['icon'] }} text-white text-2xl"></i>
                    </div>
                    <div class="text-3xl font-bold text-white">{{ $promo['discount'] }}</div>
                    <div class="text-gray-300 text-sm mt-1">OFF</div>
                </div>
                <div class="p-6 text-center">
                    <h3 class="font-bold text-lg text-black mb-2">{{ $promo['title'] }}</h3>
                    <p class="text-gray-500 text-sm mb-3">{{ $promo['description'] }}</p>
                    <p class="text-xs text-gray-400">Berlaku s/d {{ $promo['valid_until'] }}</p>
                    <a href="{{ route('consultation') }}" 
                       class="inline-block mt-4 px-6 py-2 border border-black text-black rounded-lg hover:bg-black hover:text-white transition">
                        Klaim Sekarang
                    </a>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>

@endsection