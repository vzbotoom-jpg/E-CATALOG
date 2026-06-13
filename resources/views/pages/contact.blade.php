@extends('layouts.app')
@section('title', 'Kontak — SpaceINT')

@section('content')

<div class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Header --}}
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-black mb-4">Hubungi Kami</h1>
            <p class="text-gray-500 max-w-2xl mx-auto">
                Kami siap membantu Anda. Hubungi kami melalui berbagai channel berikut
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            {{-- Contact Cards --}}
            <div class="lg:col-span-1 space-y-4">
                @foreach([
                    ['ti-map-pin', 'Alamat', 'Yogyakarta, Indonesia', 'https://maps.google.com'],
                    ['ti-phone', 'Telepon', '+62 838-4402-9190', 'tel:+6283844029190'],
                    ['ti-mail', 'Email', 'info@spaceint.id', 'mailto:info@spaceint.id'],
                    ['ti-clock', 'Jam Operasional', 'Senin - Sabtu: 08.00 - 17.00', '#'],
                ] as $icon, $title, $detail, $link)
                <a href="{{ $link }}" target="_blank" class="block bg-gray-50 rounded-2xl p-5 hover:shadow-md transition">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-black rounded-xl flex items-center justify-center">
                            <i class="ti {{ $icon }} text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-black">{{ $title }}</h3>
                            <p class="text-gray-600 text-sm">{{ $detail }}</p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>

            {{-- Contact Form --}}
            <div class="lg:col-span-2">
                <div class="bg-gray-50 rounded-2xl p-8">
                    <h2 class="text-xl font-bold text-black mb-6">Kirim Pesan</h2>
                    
                    @if(session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-6">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('contact') }}">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nama <span class="text-red-500">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}" required
                                       class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:border-black">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                                <input type="email" name="email" value="{{ old('email') }}" required
                                       class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:border-black">
                            </div>
                        </div>
                        <div class="mb-5">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Subjek <span class="text-red-500">*</span></label>
                            <input type="text" name="subject" value="{{ old('subject') }}" required
                                   class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:border-black">
                        </div>
                        <div class="mb-5">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Pesan <span class="text-red-500">*</span></label>
                            <textarea name="message" rows="5" required
                                      class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:border-black resize-none"
                                      placeholder="Tulis pesan Anda...">{{ old('message') }}</textarea>
                        </div>
                        <button type="submit"
                                class="w-full bg-black hover:bg-gray-800 text-white font-bold py-3 rounded-xl transition">
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Map --}}
        <div class="mt-12">
            <div class="bg-gray-100 rounded-2xl overflow-hidden h-80">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31652.63987022178!2d110.360784!3d-7.795604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5787bd5b6bc5%3A0x21723fd4d3684f71!2sYogyakarta!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </div>

        {{-- Social Media --}}
        <div class="text-center mt-8">
            <h3 class="font-semibold text-black mb-4">Ikuti Kami</h3>
            <div class="flex justify-center gap-4">
                <a href="#" class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 hover:bg-black hover:text-white transition">
                    <i class="ti ti-brand-instagram text-lg"></i>
                </a>
                <a href="#" class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 hover:bg-black hover:text-white transition">
                    <i class="ti ti-brand-linkedin text-lg"></i>
                </a>
                <a href="#" class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 hover:bg-black hover:text-white transition">
                    <i class="ti ti-brand-whatsapp text-lg"></i>
                </a>
            </div>
        </div>

    </div>
</div>

@endsection