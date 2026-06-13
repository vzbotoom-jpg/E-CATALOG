<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar — SpaceINT</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-['Inter'] min-h-screen flex items-center justify-center px-4 py-8">

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
            <h2 class="text-2xl font-bold text-black text-center mb-6">Buat Akun Baru</h2>

            @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl mb-4 text-sm">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-xs font-semibold text-gray-500 mb-1.5">Nama Lengkap</label>
                    <div class="relative">
                        <i class="ti ti-user absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg"></i>
                        <input type="text" name="name" value="{{ old('name') }}" required
                               class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-black">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-500 mb-1.5">Email</label>
                    <div class="relative">
                        <i class="ti ti-mail absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg"></i>
                        <input type="email" name="email" value="{{ old('email') }}" required
                               class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-black">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-500 mb-1.5">Nomor Telepon <span class="text-gray-400">(Opsional)</span></label>
                    <div class="relative">
                        <i class="ti ti-phone absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg"></i>
                        <input type="tel" name="phone" value="{{ old('phone') }}"
                               class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-black"
                               placeholder="08xxxxxxxxxx">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-500 mb-1.5">Password</label>
                    <div class="relative" x-data="{ show: false }">
                        <i class="ti ti-lock absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg"></i>
                        <input :type="show ? 'text' : 'password'" name="password" required
                               class="w-full pl-10 pr-12 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-black">
                        <button type="button" @click="show = !show"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-black">
                            <i class="ti ti-eye text-lg" x-show="!show"></i>
                            <i class="ti ti-eye-off text-lg" x-show="show"></i>
                        </button>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-500 mb-1.5">Konfirmasi Password</label>
                    <div class="relative" x-data="{ show: false }">
                        <i class="ti ti-lock-check absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg"></i>
                        <input :type="show ? 'text' : 'password'" name="password_confirmation" required
                               class="w-full pl-10 pr-12 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-black">
                        <button type="button" @click="show = !show"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-black">
                            <i class="ti ti-eye text-lg" x-show="!show"></i>
                            <i class="ti ti-eye-off text-lg" x-show="show"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="w-full bg-black hover:bg-gray-800 text-white font-bold py-3 rounded-xl transition mt-2">
                    Daftar
                </button>
            </form>

            <div class="flex items-center gap-3 my-5">
                <div class="flex-1 h-px bg-gray-200"></div>
                <span class="text-xs text-gray-400">atau</span>
                <div class="flex-1 h-px bg-gray-200"></div>
            </div>

            <p class="text-center text-sm text-gray-500">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-black font-semibold hover:underline">Masuk</a>
            </p>
        </div>
    </div>

</body>
</html>