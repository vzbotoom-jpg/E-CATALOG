<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') — SpaceINT</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="bg-gray-50 font-['Inter']">

    <div class="flex h-screen">
        {{-- Sidebar --}}
        <aside class="w-64 bg-black text-white flex-shrink-0">
            <div class="p-5 border-b border-gray-800">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                        <span class="text-black font-bold text-sm">SI</span>
                    </div>
                    <div>
                        <div class="font-bold text-white text-sm">SPACEINT</div>
                        <div class="text-[9px] text-gray-400">ADMIN PANEL</div>
                    </div>
                </div>
            </div>
            <nav class="p-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-white/10' : 'hover:bg-white/5' }} transition">
                    <i class="ti ti-dashboard text-lg"></i> Dashboard
                </a>
                <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('admin.users.*') ? 'bg-white/10' : 'hover:bg-white/5' }} transition">
                    <i class="ti ti-users text-lg"></i> Users
                </a>
            </nav>
        </aside>

        {{-- Main Content --}}
        <div class="flex-1 flex flex-col overflow-hidden">
            {{-- Topbar --}}
            <header class="bg-white border-b border-gray-100 px-6 py-4 flex items-center justify-between">
                <h1 class="text-xl font-bold text-black">@yield('header')</h1>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-500 hover:text-black transition">
                        <i class="ti ti-logout text-xl"></i>
                    </button>
                </form>
            </header>

            {{-- Content --}}
            <main class="flex-1 overflow-y-auto p-6">
                @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-4">
                    {{ session('success') }}
                </div>
                @endif

                @if(session('error'))
                <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl mb-4">
                    {{ session('error') }}
                </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>