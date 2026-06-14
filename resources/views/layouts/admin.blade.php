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
            
            <nav class="p-4 space-y-1 overflow-y-auto h-[calc(100vh-80px)]">
                {{-- Dashboard --}}
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-white/10 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                    <i class="ti ti-dashboard text-lg"></i> Dashboard
                </a>

                {{-- Divider --}}
                <div class="pt-3 pb-1 px-3">
                    <span class="text-[10px] text-gray-500 uppercase tracking-wider">Manajemen Konten</span>
                </div>

                {{-- Catalog --}}
                <a href="{{ route('admin.catalogs.index') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-all {{ request()->routeIs('admin.catalogs.*') ? 'bg-white/10 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                    <i class="ti ti-file-description text-lg"></i> Katalog
                </a>

                {{-- Portfolio --}}
                <a href="{{ route('admin.portfolios.index') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-all {{ request()->routeIs('admin.portfolios.*') ? 'bg-white/10 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                    <i class="ti ti-building text-lg"></i> Portfolio
                </a>

                {{-- Promotion --}}
                <a href="{{ route('admin.promotions.index') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-all {{ request()->routeIs('admin.promotions.*') ? 'bg-white/10 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                    <i class="ti ti-ticket text-lg"></i> Promotion
                </a>

                {{-- Consultation --}}
                <a href="{{ route('admin.consultations.index') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-all {{ request()->routeIs('admin.consultations.*') ? 'bg-white/10 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                    <i class="ti ti-message-circle text-lg"></i> Konsultasi
                </a>

                {{-- Divider --}}
                <div class="pt-3 pb-1 px-3">
                    <span class="text-[10px] text-gray-500 uppercase tracking-wider">Pengaturan</span>
                </div>

                {{-- Users --}}
                <a href="{{ route('admin.users.index') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-all {{ request()->routeIs('admin.users.*') ? 'bg-white/10 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                    <i class="ti ti-users text-lg"></i> User Management
                </a>

                {{-- Settings (optional) --}}
                {{-- 
                <a href="{{ route('admin.settings') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-all {{ request()->routeIs('admin.settings') ? 'bg-white/10 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                    <i class="ti ti-settings text-lg"></i> Pengaturan
                </a>
                --}}
            </nav>
        </aside>

        {{-- Main Content --}}
        <div class="flex-1 flex flex-col overflow-hidden">
            {{-- Topbar --}}
            <header class="bg-white border-b border-gray-100 px-6 py-4 flex items-center justify-between">
                <div>
                    <h1 class="text-xl font-bold text-black">@yield('header')</h1>
                    <p class="text-xs text-gray-400 mt-0.5">@yield('subheader', '')</p>
                </div>
                <div class="flex items-center gap-4">
                    {{-- Notification Bell (optional) --}}
                    {{-- 
                    <button class="text-gray-500 hover:text-black transition relative">
                        <i class="ti ti-bell text-xl"></i>
                        <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 text-white text-[10px] rounded-full flex items-center justify-center">3</span>
                    </button>
                    --}}
                    
                    {{-- Admin Info --}}
                    <div class="flex items-center gap-3">
                        <div class="text-right hidden sm:block">
                            <div class="text-sm font-medium text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="text-xs text-gray-400">{{ Auth::user()->email }}</div>
                        </div>
                        <div class="w-9 h-9 bg-gray-200 rounded-full flex items-center justify-center">
                            <i class="ti ti-user text-gray-500 text-sm"></i>
                        </div>
                    </div>
                    
                    {{-- Logout --}}
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-500 hover:text-red-500 transition" title="Logout">
                            <i class="ti ti-logout text-xl"></i>
                        </button>
                    </form>
                </div>
            </header>

            {{-- Content --}}
            <main class="flex-1 overflow-y-auto p-6">
                @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-4 flex items-center gap-2">
                    <i class="ti ti-circle-check text-green-500"></i>
                    {{ session('success') }}
                </div>
                @endif

                @if(session('error'))
                <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl mb-4 flex items-center gap-2">
                    <i class="ti ti-alert-circle text-red-500"></i>
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