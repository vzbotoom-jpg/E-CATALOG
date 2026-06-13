@extends('layouts.app')
@section('title', 'Konsultasi — SpaceINT')

@section('content')

<div class="bg-white py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Header --}}
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-black mb-4">Konsultasi Gratis</h1>
            <p class="text-gray-500 max-w-2xl mx-auto">
                Isi form di bawah untuk mendapatkan konsultasi gratis dengan tim ahli kami
            </p>
        </div>

        {{-- Success Message --}}
        @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-6">
            {{ session('success') }}
        </div>
        @endif

        {{-- Error Message --}}
        @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl mb-6">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif

        {{-- Form --}}
        <form method="POST" action="{{ route('consultation.store') }}" class="bg-gray-50 rounded-2xl p-8">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                           class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:border-black transition">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email <span class="text-red-500">*</span></label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                           class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:border-black transition">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor Telepon <span class="text-red-500">*</span></label>
                    <input type="tel" name="phone" value="{{ old('phone') }}" required
                           class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:border-black transition"
                           placeholder="08xxxxxxxxxx">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Perusahaan (Opsional)</label>
                    <input type="text" name="company" value="{{ old('company') }}"
                           class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:border-black transition">
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Tipe Proyek <span class="text-red-500">*</span></label>
                <select name="project_type" required class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:border-black transition">
                    <option value="">Pilih Tipe Proyek</option>
                    <option value="residential" {{ old('project_type') == 'residential' ? 'selected' : '' }}>Residential (Rumah Tinggal)</option>
                    <option value="office" {{ old('project_type') == 'office' ? 'selected' : '' }}>Perkantoran</option>
                    <option value="hotel" {{ old('project_type') == 'hotel' ? 'selected' : '' }}>Hotel</option>
                    <option value="restaurant" {{ old('project_type') == 'restaurant' ? 'selected' : '' }}>Restoran / Cafe</option>
                    <option value="retail" {{ old('project_type') == 'retail' ? 'selected' : '' }}>Retail / Toko</option>
                    <option value="other" {{ old('project_type') == 'other' ? 'selected' : '' }}>Lainnya</option>
                </select>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Proyek <span class="text-red-500">*</span></label>
                <textarea name="message" rows="5" required
                          class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:border-black transition resize-none"
                          placeholder="Ceritakan kebutuhan furnitur dan interior Anda...">{{ old('message') }}</textarea>
                <p class="text-xs text-gray-400 mt-1">Minimal 20 karakter</p>
            </div>

            <button type="submit" 
                    class="w-full bg-black hover:bg-gray-800 text-white font-bold py-3 rounded-xl transition">
                Kirim Konsultasi
            </button>
        </form>

        {{-- Info Box --}}
        <div class="mt-8 bg-gray-50 rounded-2xl p-6 text-center">
            <div class="flex flex-wrap justify-center gap-6">
                <div class="flex items-center gap-2 text-gray-500">
                    <i class="ti ti-clock text-black"></i>
                    <span class="text-sm">Respon dalam 1x24 jam</span>
                </div>
                <div class="flex items-center gap-2 text-gray-500">
                    <i class="ti ti-headset text-black"></i>
                    <span class="text-sm">Konsultasi gratis</span>
                </div>
                <div class="flex items-center gap-2 text-gray-500">
                    <i class="ti ti-shield-check text-black"></i>
                    <span class="text-sm">Tanpa komitmen</span>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection