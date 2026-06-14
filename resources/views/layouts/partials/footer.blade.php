<footer class="bg-white border-t border-gray-100 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            
            {{-- Brand --}}
            <div class="col-span-1">
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-8 h-8 bg-black rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-sm">SI</span>
                    </div>
                    <div>
                        <div class="font-bold text-black text-lg tracking-tight">SPACEINT</div>
                        <div class="text-[9px] text-gray-400 tracking-wider">SPACE INTERIOR</div>
                    </div>
                </div>
                <p class="text-gray-500 text-sm leading-relaxed mb-4">
                    Solusi lengkap untuk proyek furnitur skala besar — dari konsultasi, pengukuran, hingga desain interior yang presisi.
                </p>
                <div class="flex gap-3">
                    <a href="#" class="text-gray-400 hover:text-black transition">
                        <i class="ti ti-brand-instagram text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-black transition">
                        <i class="ti ti-brand-linkedin text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-black transition">
                        <i class="ti ti-brand-whatsapp text-xl"></i>
                    </a>
                </div>
            </div>
            
            {{-- Tentang --}}
            <div>
                <h4 class="font-semibold text-black mb-4">Tentang</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('about') }}" class="text-gray-500 text-sm hover:text-black transition">Tentang Kami</a></li>
                    <li><a href="{{ route('portfolio') }}" class="text-gray-500 text-sm hover:text-black transition">Portfolio</a></li>
                    <li><a href="{{ route('catalog') }}" class="text-gray-500 text-sm hover:text-black transition">Katalog</a></li>
                    <li><a href="{{ route('contact') }}" class="text-gray-500 text-sm hover:text-black transition">Kontak</a></li>
                </ul>
            </div>
            
            {{-- Layanan (Updated with clickable links) --}}
            <div>
                <h4 class="font-semibold text-black mb-4">Layanan</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('services.measurement') }}" class="text-gray-500 text-sm hover:text-black transition flex items-center gap-1">
                        <i class="ti ti-ruler text-xs"></i> Pengukuran Presisi
                    </a></li>
                    <li><a href="{{ route('services.custom-design') }}" class="text-gray-500 text-sm hover:text-black transition flex items-center gap-1">
                        <i class="ti ti-pencil text-xs"></i> Desain Kustom
                    </a></li>
                    <li><a href="{{ route('services.large-scale') }}" class="text-gray-500 text-sm hover:text-black transition flex items-center gap-1">
                        <i class="ti ti-building text-xs"></i> Proyek Skala Besar
                    </a></li>
                    <li><a href="{{ route('consultation') }}" class="text-gray-500 text-sm hover:text-black transition flex items-center gap-1">
                        <i class="ti ti-headset text-xs"></i> Konsultasi Profesional
                    </a></li>
                </ul>
            </div>
            
            {{-- Kontak --}}
            <div>
                <h4 class="font-semibold text-black mb-4">Hubungi Kami</h4>
                <ul class="space-y-3">
                    <li class="flex items-start gap-2 text-gray-500 text-sm">
                        <i class="ti ti-map-pin text-black mt-0.5"></i>
                        <span>Yogyakarta, Indonesia</span>
                    </li>
                    <li class="flex items-center gap-2 text-gray-500 text-sm">
                        <i class="ti ti-phone text-black"></i>
                        <a href="tel:+6283844029190" class="hover:text-black transition">+62 838-4402-9190</a>
                    </li>
                    <li class="flex items-center gap-2 text-gray-500 text-sm">
                        <i class="ti ti-mail text-black"></i>
                        <a href="mailto:info@spaceint.id" class="hover:text-black transition">info@spaceint.id</a>
                    </li>
                </ul>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <p class="text-xs text-gray-400">Jam Operasional</p>
                    <p class="text-xs text-gray-500 mt-1">Senin - Sabtu: 08.00 - 17.00</p>
                    <p class="text-xs text-red-500">Minggu: Tutup</p>
                </div>
            </div>
        </div>
        
        <div class="border-t border-gray-100 mt-8 pt-8">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-3 text-center text-gray-400 text-xs">
                <div>
                    © {{ date('Y') }} SpaceINT. All rights reserved.
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('privacy-policy') }}" class="hover:text-black transition">Kebijakan Privasi</a>
                    <span class="text-gray-300">|</span>
                    <a href="{{ route('terms-conditions') }}" class="hover:text-black transition">Syarat & Ketentuan</a>
                </div>
            </div>
        </div>
    </div>
</footer>