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
            </div>
            
            {{-- Quick Links --}}
            <div>
                <h4 class="font-semibold text-black mb-4">Tentang</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('about') }}" class="text-gray-500 text-sm hover:text-black transition">Tentang Kami</a></li>
                    <li><a href="{{ route('portfolio') }}" class="text-gray-500 text-sm hover:text-black transition">Portfolio</a></li>
                    <li><a href="{{ route('catalog') }}" class="text-gray-500 text-sm hover:text-black transition">Katalog</a></li>
                    <li><a href="{{ route('contact') }}" class="text-gray-500 text-sm hover:text-black transition">Kontak</a></li>
                </ul>
            </div>
            
            {{-- Layanan --}}
            <div>
                <h4 class="font-semibold text-black mb-4">Layanan</h4>
                <ul class="space-y-2">
                    <li><span class="text-gray-500 text-sm">Pengukuran Presisi</span></li>
                    <li><span class="text-gray-500 text-sm">Desain Kustom</span></li>
                    <li><span class="text-gray-500 text-sm">Proyek Skala Besar</span></li>
                    <li><span class="text-gray-500 text-sm">Konsultasi Profesional</span></li>
                </ul>
            </div>
            
            {{-- Kontak --}}
            <div>
                <h4 class="font-semibold text-black mb-4">Hubungi Kami</h4>
                <ul class="space-y-2">
                    <li class="flex items-center gap-2 text-gray-500 text-sm">
                        <i class="ti ti-map-pin text-black"></i> Yogyakarta, Indonesia
                    </li>
                    <li class="flex items-center gap-2 text-gray-500 text-sm">
                        <i class="ti ti-phone text-black"></i> +62 838-4402-9190
                    </li>
                    <li class="flex items-center gap-2 text-gray-500 text-sm">
                        <i class="ti ti-mail text-black"></i> info@spaceint.id
                    </li>
                </ul>
                <div class="flex gap-4 mt-4">
                    <a href="#" class="text-gray-400 hover:text-black transition"><i class="ti ti-brand-instagram text-xl"></i></a>
                    <a href="#" class="text-gray-400 hover:text-black transition"><i class="ti ti-brand-linkedin text-xl"></i></a>
                    <a href="#" class="text-gray-400 hover:text-black transition"><i class="ti ti-brand-whatsapp text-xl"></i></a>
                </div>
            </div>
        </div>
        
        <div class="border-t border-gray-100 mt-8 pt-8 text-center text-gray-400 text-xs">
            © 2026 SpaceINT. All rights reserved.
        </div>
    </div>
</footer>