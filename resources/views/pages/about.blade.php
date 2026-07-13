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

        {{-- Proses Kerja =====
             Menjawab keraguan "bagaimana cara kerjanya" sebelum calon klien
             sempat bertanya — penting untuk proyek bernilai besar yang
             biasanya butuh kejelasan tahapan sebelum berani konsultasi.
        --}}
        <div class="mb-16">
            <h2 class="text-2xl font-bold text-black text-center mb-2">Bagaimana Kami Bekerja</h2>
            <p class="text-gray-500 text-center max-w-xl mx-auto mb-8">Proses yang jelas dari awal konsultasi hingga instalasi selesai</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 relative">
                @php
                    $steps = [
                        ['01', 'Konsultasi', 'Ceritakan kebutuhan proyek Anda, gratis tanpa komitmen.', 'ti-message-2'],
                        ['02', 'Survei & Ukur', 'Tim kami datang mengukur lokasi dengan presisi tinggi.', 'ti-ruler'],
                        ['03', 'Desain', 'Kami buat desain kustom sesuai kebutuhan ruangan Anda.', 'ti-pencil'],
                        ['04', 'Produksi', 'Pengerjaan furnitur dengan material dan standar kualitas terbaik.', 'ti-tool'],
                        ['05', 'Instalasi', 'Pemasangan rapi di lokasi Anda, tepat waktu.', 'ti-circle-check'],
                    ];
                @endphp
                @foreach($steps as [$num, $title, $desc, $icon])
                <div class="text-center p-5 border border-gray-100 rounded-2xl hover:shadow-md transition">
                    <div class="w-11 h-11 bg-black rounded-xl flex items-center justify-center mx-auto mb-3">
                        <i class="ti {{ $icon }} text-white text-lg"></i>
                    </div>
                    <span class="text-xs font-bold text-gray-300 tracking-widest">{{ $num }}</span>
                    <h3 class="font-bold text-black text-sm mt-1 mb-1.5">{{ $title }}</h3>
                    <p class="text-gray-500 text-xs leading-relaxed">{{ $desc }}</p>
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

        {{-- Testimoni Klien =====
             Social proof pihak ketiga — sebelumnya tidak ada satupun
             testimoni di seluruh halaman SpaceINT. Ganti isi array
             $testimonials dengan testimoni klien asli (idealnya sertakan
             nama perusahaan/klien nyata dengan izin mereka).
        --}}
        <div class="mb-16">
            <h2 class="text-2xl font-bold text-black text-center mb-8">Apa Kata Klien Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @php
                    $testimonials = [
                        ['name' => 'Budi Hartono', 'role' => 'Manajer Operasional', 'quote' => 'Pengukuran presisi dan desain kustomnya sangat membantu proyek renovasi kantor kami.'],
                        ['name' => 'Sarah Wijaya', 'role' => 'F&B Manager, Hotel Bintang 4', 'quote' => 'Furnitur kamar hotel sesuai spesifikasi dan tahan lama. Tim sangat profesional.'],
                        ['name' => 'Andi Pratama', 'role' => 'Pemilik Properti Residensial', 'quote' => 'Konsultasi gratisnya membantu saya menentukan solusi terbaik tanpa tekanan.'],
                    ];
                @endphp
                @foreach($testimonials as $t)
                <div class="bg-gray-50 rounded-2xl p-6 flex flex-col">
                    <div class="flex gap-1 mb-3">
                        @for($i = 0; $i < 5; $i++)
                            <i class="ti ti-star-filled text-black text-sm"></i>
                        @endfor
                    </div>
                    <p class="text-gray-600 text-sm leading-relaxed mb-5 flex-1">&ldquo;{{ $t['quote'] }}&rdquo;</p>
                    <div class="flex items-center gap-3 pt-4 border-t border-gray-200">
                        <div class="w-9 h-9 rounded-full bg-black text-white font-bold flex items-center justify-center text-sm flex-shrink-0">
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

        {{-- Pesan dari Tim Kepemimpinan =====
             Elemen "liking" — memberi wajah manusia di balik perusahaan.
             Ganti kutipan dan foto placeholder dengan yang asli.
        --}}
        <div class="mb-16">
            <div class="bg-gray-50 rounded-3xl p-6 sm:p-10 grid grid-cols-1 sm:grid-cols-3 gap-8 items-center">
                <div class="sm:col-span-1">
                    <div class="rounded-2xl overflow-hidden bg-gray-100 aspect-square">
                        <img src="https://placehold.co/400x400/e5e5e5/333333?text=Leadership"
                             alt="Tim Kepemimpinan SpaceINT" class="w-full h-full object-cover">
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <i class="ti ti-quote text-gray-200 text-4xl"></i>
                    <p class="text-gray-600 text-base sm:text-lg leading-relaxed italic -mt-2">
                        "Kami percaya bahwa proyek furnitur skala besar butuh lebih dari sekadar produk — butuh kejelasan proses dan kejujuran harga dari awal. Itu prinsip yang kami pegang di setiap proyek SpaceINT."
                    </p>
                    <p class="font-semibold text-black mt-4">Tim Kepemimpinan SpaceINT</p>
                </div>
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