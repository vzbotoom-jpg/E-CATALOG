@extends('layouts.app')
@section('title', 'Syarat & Ketentuan — SpaceINT')

@section('content')

<div class="bg-white py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Header --}}
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-black mb-4">Syarat & Ketentuan</h1>
            <p class="text-gray-500">Terakhir diperbarui: {{ date('d F Y') }}</p>
        </div>

        <div class="prose prose-lg max-w-none">
            <div class="bg-gray-50 rounded-2xl p-6 mb-8">
                <p class="text-gray-600 mb-0">
                    Dengan mengakses dan menggunakan website SpaceINT, Anda menyetujui untuk terikat oleh Syarat & Ketentuan 
                    ini. Jika Anda tidak setuju dengan salah satu bagian dari syarat ini, harap tidak menggunakan website kami.
                </p>
            </div>

            {{-- 1. Penggunaan Layanan --}}
            <h2 class="text-xl font-bold text-black mt-8 mb-4">1. Penggunaan Layanan</h2>
            <p class="text-gray-600 leading-relaxed mb-4">
                Layanan kami meliputi konsultasi furnitur, pengukuran presisi, desain kustom, dan proyek skala besar. 
                Dengan menggunakan layanan kami, Anda setuju untuk:
            </p>
            <ul class="list-disc pl-6 text-gray-600 space-y-2 mb-6">
                <li>Memberikan informasi yang akurat dan lengkap.</li>
                <li>Tidak menyalahgunakan layanan untuk tujuan ilegal.</li>
                <li>Tidak mengganggu atau merusak keamanan website.</li>
            </ul>

            {{-- 2. Konsultasi dan Proyek --}}
            <h2 class="text-xl font-bold text-black mt-8 mb-4">2. Konsultasi dan Proyek</h2>
            <p class="text-gray-600 leading-relaxed mb-4">
                Ketika Anda mengirimkan konsultasi melalui website kami:
            </p>
            <ul class="list-disc pl-6 text-gray-600 space-y-2 mb-6">
                <li>Kami akan merespon dalam waktu 1x24 jam.</li>
                <li>Konsultasi awal bersifat gratis dan tanpa komitmen.</li>
                <li>Untuk proyek yang disetujui, akan ada perjanjian terpisah yang mengatur detail pelaksanaan.</li>
                <li>Kami berhak menolak proyek yang tidak sesuai dengan kapabilitas kami.</li>
            </ul>

            {{-- 3. Hak Kekayaan Intelektual --}}
            <h2 class="text-xl font-bold text-black mt-8 mb-4">3. Hak Kekayaan Intelektual</h2>
            <p class="text-gray-600 leading-relaxed mb-6">
                Semua konten di website ini, termasuk teks, gambar, logo, desain, dan materi lainnya, adalah milik SpaceINT 
                dan dilindungi oleh hak cipta. Anda tidak diperbolehkan menyalin, memodifikasi, atau mendistribusikan konten 
                tanpa izin tertulis dari kami.
            </p>

            {{-- 4. Harga dan Pembayaran --}}
            <h2 class="text-xl font-bold text-black mt-8 mb-4">4. Harga dan Pembayaran</h2>
            <p class="text-gray-600 leading-relaxed mb-6">
                Harga yang ditampilkan di website adalah estimasi dan dapat berubah sewaktu-waktu. Harga final akan 
                dikonfirmasi setelah konsultasi dan pengukuran. Pembayaran proyek akan diatur dalam perjanjian terpisah.
            </p>

            {{-- 5. Pembatalan dan Pengembalian --}}
            <h2 class="text-xl font-bold text-black mt-8 mb-4">5. Pembatalan dan Pengembalian</h2>
            <p class="text-gray-600 leading-relaxed mb-4">
                Kebijakan pembatalan dan pengembalian:
            </p>
            <ul class="list-disc pl-6 text-gray-600 space-y-2 mb-6">
                <li>Pembatalan konsultasi dapat dilakukan kapan saja tanpa biaya.</li>
                <li>Untuk proyek yang sudah dimulai, pembatalan akan dikenakan biaya sesuai dengan tahap yang telah dikerjakan.</li>
                <li>Pengembalian dana hanya berlaku untuk produk yang mengalami cacat produksi.</li>
                <li>Garansi 1 tahun untuk semua produk furnitur.</li>
            </ul>

            {{-- 6. Batasan Tanggung Jawab --}}
            <h2 class="text-xl font-bold text-black mt-8 mb-4">6. Batasan Tanggung Jawab</h2>
            <p class="text-gray-600 leading-relaxed mb-6">
                SpaceINT tidak bertanggung jawab atas kerugian tidak langsung, insidental, atau konsekuensial yang timbul 
                dari penggunaan atau ketidakmampuan menggunakan layanan kami. Tanggung jawab maksimum kami terbatas pada 
                jumlah yang Anda bayarkan untuk layanan yang bersangkutan.
            </p>

            {{-- 7. Tautan ke Pihak Ketiga --}}
            <h2 class="text-xl font-bold text-black mt-8 mb-4">7. Tautan ke Website Pihak Ketiga</h2>
            <p class="text-gray-600 leading-relaxed mb-6">
                Website kami mungkin berisi tautan ke website pihak ketiga. Kami tidak bertanggung jawab atas konten atau 
                praktik privasi dari website tersebut. Anda mengakses tautan tersebut dengan risiko Anda sendiri.
            </p>

            {{-- 8. Penghentian Layanan --}}
            <h2 class="text-xl font-bold text-black mt-8 mb-4">8. Penghentian Layanan</h2>
            <p class="text-gray-600 leading-relaxed mb-6">
                Kami berhak menghentikan atau membatasi akses Anda ke layanan kami tanpa pemberitahuan jika kami mendeteksi 
                pelanggaran terhadap syarat & ketentuan ini.
            </p>

            {{-- 9. Perubahan Syarat & Ketentuan --}}
            <h2 class="text-xl font-bold text-black mt-8 mb-4">9. Perubahan Syarat & Ketentuan</h2>
            <p class="text-gray-600 leading-relaxed mb-6">
                Kami dapat memperbarui syarat & ketentuan ini dari waktu ke waktu. Setiap perubahan akan diumumkan di 
                halaman ini dengan tanggal "Terakhir diperbarui" yang baru. Penggunaan berkelanjutan Anda atas website 
                kami setelah perubahan dianggap sebagai penerimaan atas syarat yang baru.
            </p>

            {{-- 10. Hukum yang Berlaku --}}
            <h2 class="text-xl font-bold text-black mt-8 mb-4">10. Hukum yang Berlaku</h2>
            <p class="text-gray-600 leading-relaxed mb-6">
                Syarat & Ketentuan ini diatur oleh hukum Negara Republik Indonesia. Setiap sengketa yang timbul akan 
                diselesaikan di pengadilan yang berwenang di Yogyakarta.
            </p>

            {{-- 11. Kontak --}}
            <h2 class="text-xl font-bold text-black mt-8 mb-4">11. Hubungi Kami</h2>
            <p class="text-gray-600 leading-relaxed mb-6">
                Jika Anda memiliki pertanyaan tentang Syarat & Ketentuan ini, silakan hubungi kami:
            </p>
            <div class="bg-gray-50 rounded-2xl p-6 mb-6">
                <p class="text-gray-700 mb-2"><strong>SpaceINT</strong></p>
                <p class="text-gray-600 mb-1">Email: <a href="mailto:legal@spaceint.id" class="text-black hover:underline">legal@spaceint.id</a></p>
                <p class="text-gray-600 mb-1">Telepon: <a href="tel:+6283844029190" class="text-black hover:underline">+62 838-4402-9190</a></p>
                <p class="text-gray-600">Alamat: Yogyakarta, Indonesia</p>
            </div>
        </div>

        {{-- Acceptance Button --}}
        <div class="text-center mt-8 pt-8 border-t border-gray-100">
            <p class="text-gray-500 text-sm mb-4">Dengan menggunakan website ini, Anda menyetujui Syarat & Ketentuan dan Kebijakan Privasi kami.</p>
            <a href="{{ route('home') }}" class="inline-block bg-black text-white px-6 py-2 rounded-lg hover:bg-gray-800 transition">
                Kembali ke Beranda
            </a>
        </div>

    </div>
</div>

@endsection