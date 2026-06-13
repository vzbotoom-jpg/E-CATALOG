<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password — SpaceINT</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-['Inter'] min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-md">
        {{-- Logo --}}
        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2">
                <div class="w-10 h-10 bg-black rounded-xl flex items-center justify-center">
                    <span class="text-white font-bold text-lg">SI</span>
                </div>
                <div class="text-left">
                    <div class="font-bold text-black text-lg tracking-tight">SPACEINT</div>
                    <div class="text-[9px] text-gray-400 tracking-wider">SPACE INTERIOR</div>
                </div>
            </a>
        </div>

        {{-- Card --}}
        <div class="bg-white rounded-2xl p-8 shadow-xl border border-gray-100">
            <div class="text-center mb-6">
                <div class="w-14 h-14 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                    <i class="ti ti-lock-question text-gray-600 text-2xl"></i>
                </div>
                <h2 class="text-xl font-bold text-black">Lupa Password?</h2>
                <p class="text-gray-500 text-sm mt-1">Masukkan email Anda untuk reset password</p>
            </div>

            @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-4 text-sm">
                {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl mb-4 text-sm">
                {{ $errors->first() }}
            </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-xs font-semibold text-gray-500 mb-1.5 uppercase tracking-wider">Email</label>
                    <div class="relative">
                        <i class="ti ti-mail absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg"></i>
                        <input type="email" name="email" value="{{ old('email') }}" required
                               class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-black focus:ring-2 focus:ring-black/20">
                    </div>
                </div>

                <button type="submit" class="w-full bg-black hover:bg-gray-800 text-white font-bold py-3 rounded-xl transition">
                    Kirim Link Reset
                </button>
            </form>

            <div class="text-center mt-6">
                <a href="{{ route('login') }}" class="text-sm text-gray-500 hover:text-black transition inline-flex items-center gap-1">
                    <i class="ti ti-arrow-left text-xs"></i> Kembali ke Login
                </a>
            </div>
        </div>

        <p class="text-center text-xs text-gray-400 mt-6">
            © 2026 SpaceINT. All rights reserved.
        </p>
    </div>

</body>
</html>