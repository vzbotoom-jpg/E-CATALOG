@extends('layouts.app')
@section('title', 'Kebijakan Privasi — SpaceINT')

@section('content')

<div class="bg-white py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Header --}}
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-black mb-4">Kebijakan Privasi</h1>
            <p class="text-gray-500">Terakhir diperbarui: {{ date('d F Y') }}</p>
        </div>

        <div class="prose prose-lg max-w-none">
            <div class="bg-gray-50 rounded-2xl p-6 mb-8">
                <p class="text-gray-600 mb-0">
                    Di SpaceINT, kami menghargai privasi Anda. Kebijakan Privasi ini menjelaskan bagaimana kami mengumpulkan, 
                    menggunakan, dan melindungi informasi pribadi Anda saat Anda mengunjungi website kami atau menggunakan layanan kami.
                </p>
            </div>

            {{-- 1. Informasi yang Dikumpulkan --}}
            <h2 class="text-xl font-bold text-black mt-8 mb-4">1. Informasi yang Kami Kumpulkan</h2>
            <p class="text-gray-600 leading-relaxed mb-4">
                Kami dapat mengumpulkan informasi berikut:
            </p>
            <ul class="list-disc pl-6 text-gray-600 space-y-2 mb-6">
                <li><strong>Informasi Pribadi:</strong> Nama, alamat email, nomor telepon, alamat perusahaan.</li>
                <li><strong>Informasi Proyek:</strong> Detail tentang proyek furnitur yang Anda konsultasikan.</li>
                <li><strong>Informasi Penggunaan:</strong> Data tentang bagaimana Anda berinteraksi dengan website kami.</li>
                <li><strong>Informasi Teknis:</strong> Alamat IP, jenis browser, dan data analitik lainnya.</li>
            </ul>

            {{-- 2. Cara Penggunaan Informasi --}}
            <h2 class="text-xl font-bold text-black mt-8 mb-4">2. Bagaimana Kami Menggunakan Informasi Anda</h2>
            <p class="text-gray-600 leading-relaxed mb-4">
                Informasi yang kami kumpulkan digunakan untuk:
            </p>
            <ul class="list-disc pl-6 text-gray-600 space-y-2 mb-6">
                <li>Memproses dan merespons konsultasi Anda.</li>
                <li>Memberikan layanan yang dipersonalisasi sesuai kebutuhan Anda.</li>
                <li>Meningkatkan kualitas website dan layanan kami.</li>
                <li>Mengirimkan informasi tentang promo, pembaruan, atau penawaran khusus.</li>
                <li>Memenuhi kewajiban hukum dan peraturan yang berlaku.</li>
            </ul>

            {{-- 3. Perlindungan Data --}}
            <h2 class="text-xl font-bold text-black mt-8 mb-4">3. Perlindungan Data</h2>
            <p class="text-gray-600 leading-relaxed mb-6">
                Kami menerapkan langkah-langkah keamanan yang sesuai untuk melindungi informasi pribadi Anda dari akses, 
                penggunaan, atau pengungkapan yang tidak sah. Data Anda disimpan di server yang aman dan hanya dapat diakses 
                oleh personel yang berwenang.
            </p>

            {{-- 4. Berbagi Informasi --}}
            <h2 class="text-xl font-bold text-black mt-8 mb-4">4. Berbagi Informasi dengan Pihak Ketiga</h2>
            <p class="text-gray-600 leading-relaxed mb-6">
                Kami tidak menjual, memperdagangkan, atau mentransfer informasi pribadi Anda kepada pihak ketiga tanpa 
                persetujuan Anda, kecuali jika diperlukan untuk memenuhi kewajiban hukum atau untuk menjalankan layanan 
                (misalnya, mitra pengiriman atau penyedia layanan hosting).
            </p>

            {{-- 5. Cookies --}}
            <h2 class="text-xl font-bold text-black mt-8 mb-4">5. Cookies</h2>
            <p class="text-gray-600 leading-relaxed mb-6">
                Website kami menggunakan cookies untuk meningkatkan pengalaman pengguna. Cookies adalah file kecil yang 
                disimpan di perangkat Anda. Anda dapat mengatur browser Anda untuk menolak cookies, namun hal ini dapat 
                mempengaruhi fungsionalitas website.
            </p>

            {{-- 6. Hak Anda --}}
            <h2 class="text-xl font-bold text-black mt-8 mb-4">6. Hak Anda atas Data Pribadi</h2>
            <p class="text-gray-600 leading-relaxed mb-4">
                Anda memiliki hak untuk:
            </p>
            <ul class="list-disc pl-6 text-gray-600 space-y-2 mb-6">
                <li>Mengakses data pribadi yang kami simpan tentang Anda.</li>
                <li>Meminta koreksi data yang tidak akurat.</li>
                <li>Meminta penghapusan data pribadi Anda.</li>
                <li>Menarik persetujuan Anda untuk pemrosesan data.</li>
            </ul>

            {{-- 7. Data Anak --}}
            <h2 class="text-xl font-bold text-black mt-8 mb-4">7. Data Anak</h2>
            <p class="text-gray-600 leading-relaxed mb-6">
                Layanan kami tidak ditujukan untuk anak-anak di bawah usia 13 tahun. Kami tidak secara sadar mengumpulkan 
                informasi pribadi dari anak-anak. Jika Anda yakin bahwa kami telah mengumpulkan informasi dari anak-anak, 
                harap hubungi kami.
            </p>

            {{-- 8. Perubahan Kebijakan --}}
            <h2 class="text-xl font-bold text-black mt-8 mb-4">8. Perubahan Kebijakan Privasi</h2>
            <p class="text-gray-600 leading-relaxed mb-6">
                Kami dapat memperbarui kebijakan privasi ini dari waktu ke waktu. Setiap perubahan akan diumumkan di 
                halaman ini dengan tanggal "Terakhir diperbarui" yang baru. Kami menyarankan Anda untuk meninjau kebijakan 
                ini secara berkala.
            </p>

            {{-- 9. Kontak --}}
            <h2 class="text-xl font-bold text-black mt-8 mb-4">9. Hubungi Kami</h2>
            <p class="text-gray-600 leading-relaxed mb-6">
                Jika Anda memiliki pertanyaan tentang kebijakan privasi ini atau ingin menggunakan hak Anda atas data pribadi, 
                silakan hubungi kami melalui:
            </p>
            <div class="bg-gray-50 rounded-2xl p-6 mb-6">
                <p class="text-gray-700 mb-2"><strong>SpaceINT</strong></p>
                <p class="text-gray-600 mb-1">Email: <a href="mailto:privacy@spaceint.id" class="text-black hover:underline">privacy@spaceint.id</a></p>
                <p class="text-gray-600 mb-1">Telepon: <a href="tel:+6283844029190" class="text-black hover:underline">+62 838-4402-9190</a></p>
                <p class="text-gray-600">Alamat: Yogyakarta, Indonesia</p>
            </div>
        </div>

    </div>
</div>

@endsection