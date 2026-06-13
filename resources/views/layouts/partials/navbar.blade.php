<nav class="fixed top-0 left-0 right-0 bg-white/95 backdrop-blur-sm z-50 border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2 flex-shrink-0">
                <div class="w-8 h-8 bg-black rounded-lg flex items-center justify-center">
                    <span class="text-white font-bold text-sm">SI</span>
                </div>
                <div>
                    <div class="font-bold text-black text-lg tracking-tight">SPACEINT</div>
                    <div class="text-[9px] text-gray-400 tracking-wider">SPACE INTERIOR</div>
                </div>
            </a>
            
            {{-- Search Property (Desktop) --}}
            <div class="hidden lg:flex flex-1 max-w-md mx-4">
                <div class="relative w-full">
                    <input type="text" 
                           id="searchProperty"
                           placeholder="Search location / project / cluster" 
                           class="w-full px-4 py-2 pl-10 pr-12 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-black transition">
                    <i class="ti ti-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                    <button class="absolute right-2 top-1/2 -translate-y-1/2 bg-black text-white text-xs px-3 py-1 rounded-lg hover:bg-gray-800 transition">
                        Filter
                    </button>
                </div>
            </div>
            
            {{-- Desktop Menu --}}
            <div class="hidden md:flex items-center gap-6">
                <a href="{{ route('home') }}" class="text-sm text-gray-600 hover:text-black transition {{ request()->routeIs('home') ? 'text-black font-semibold' : '' }}">Beranda</a>
                <a href="{{ route('promotion') }}" class="text-sm text-gray-600 hover:text-black transition {{ request()->routeIs('promotion*') ? 'text-black font-semibold' : '' }}">Promotion</a>
                <a href="{{ route('catalog') }}" class="text-sm text-gray-600 hover:text-black transition {{ request()->routeIs('catalog*') ? 'text-black font-semibold' : '' }}">Katalog</a>
                <a href="{{ route('portfolio') }}" class="text-sm text-gray-600 hover:text-black transition {{ request()->routeIs('portfolio*') ? 'text-black font-semibold' : '' }}">Portfolio</a>
                <a href="{{ route('about') }}" class="text-sm text-gray-600 hover:text-black transition {{ request()->routeIs('about') ? 'text-black font-semibold' : '' }}">Tentang</a>
                
                {{-- Login / Sign Up --}}
                @auth
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center gap-2 text-gray-600 hover:text-black transition">
                        <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center">
                            <i class="ti ti-user text-gray-500 text-sm"></i>
                        </div>
                        <span class="text-sm">{{ Auth::user()->name }}</span>
                        <i class="ti ti-chevron-down text-xs" :class="open ? 'rotate-180' : ''"></i>
                    </button>
                    <div x-show="open" @click.outside="open = false" x-transition
                         class="absolute right-0 top-full mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-100 py-2 z-50">
                        <a href="{{ route('profile') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-600 hover:bg-gray-50">
                            <i class="ti ti-user"></i> Profile
                        </a>
                        <a href="{{ route('orders') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-600 hover:bg-gray-50">
                            <i class="ti ti-shopping-bag"></i> Pesanan
                        </a>
                        
                        {{-- Admin Panel Menu - Hanya untuk admin --}}
                        @if(Auth::user()->is_admin)
                        <div class="border-t my-1"></div>
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-600 hover:bg-gray-50">
                            <i class="ti ti-dashboard"></i> Admin Panel
                        </a>
                        @endif
                        
                        <div class="border-t my-1"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-2 px-4 py-2 text-sm text-red-500 hover:bg-red-50">
                                <i class="ti ti-logout"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <div class="flex items-center gap-3">
                    <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-black transition">
                        Login
                    </a>
                    <span class="text-gray-300">/</span>
                    <a href="{{ route('register') }}" class="text-sm text-black font-medium hover:text-gray-600 transition">
                        Sign Up
                    </a>
                </div>
                @endauth
                
                <a href="{{ route('consultation') }}" class="px-4 py-2 bg-black text-white text-sm font-medium rounded-lg hover:bg-gray-800 transition">
                    Konsultasi Gratis
                </a>
            </div>
            
            {{-- Mobile Menu Button --}}
            <button id="mobileMenuBtn" class="md:hidden text-gray-600">
                <i class="ti ti-menu-2 text-2xl"></i>
            </button>
        </div>
    </div>
    
    {{-- Mobile Menu --}}
    <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-gray-100 py-4 px-4">
        <div class="flex flex-col space-y-3">
            {{-- Mobile Search --}}
            <div class="relative mb-2">
                <input type="text" 
                       id="mobileSearchProperty"
                       placeholder="Search location / project / cluster" 
                       class="w-full px-4 py-2 pl-10 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-black">
                <i class="ti ti-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
            </div>
            
            <a href="{{ route('home') }}" class="text-gray-600 hover:text-black py-2">Beranda</a>
            <a href="{{ route('promotion') }}" class="text-gray-600 hover:text-black py-2">Promotion</a>
            <a href="{{ route('catalog') }}" class="text-gray-600 hover:text-black py-2">Katalog</a>
            <a href="{{ route('portfolio') }}" class="text-gray-600 hover:text-black py-2">Portfolio</a>
            <a href="{{ route('about') }}" class="text-gray-600 hover:text-black py-2">Tentang</a>
            
            @auth
            <div class="border-t pt-3 mt-2">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center">
                        <i class="ti ti-user text-gray-500 text-lg"></i>
                    </div>
                    <div>
                        <div class="font-medium text-black">{{ Auth::user()->name }}</div>
                        <div class="text-xs text-gray-400">{{ Auth::user()->email }}</div>
                    </div>
                </div>
                <a href="{{ route('profile') }}" class="flex items-center gap-2 text-gray-600 py-2">
                    <i class="ti ti-user"></i> Profile
                </a>
                <a href="{{ route('orders') }}" class="flex items-center gap-2 text-gray-600 py-2">
                    <i class="ti ti-shopping-bag"></i> Pesanan
                </a>
                
                {{-- Admin Panel Menu - Hanya untuk admin --}}
                @if(Auth::user()->is_admin)
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 text-gray-600 py-2">
                    <i class="ti ti-dashboard"></i> Admin Panel
                </a>
                @endif
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 text-red-500 py-2 w-full">
                        <i class="ti ti-logout"></i> Logout
                    </button>
                </form>
            </div>
            @else
            <div class="flex gap-4 pt-2">
                <a href="{{ route('login') }}" class="flex-1 text-center bg-black text-white py-2 rounded-lg">Login</a>
                <a href="{{ route('register') }}" class="flex-1 text-center border border-black text-black py-2 rounded-lg">Sign Up</a>
            </div>
            @endauth
            
            <a href="{{ route('consultation') }}" class="bg-gray-100 text-black text-center py-2 rounded-lg mt-2">Konsultasi Gratis</a>
        </div>
    </div>
</nav>

{{-- Spacer for fixed navbar --}}
<div class="h-16"></div>

<script>
    const mobileBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    if (mobileBtn) {
        mobileBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }
    
    // Search Property functionality
    function searchProperty() {
        const query = document.getElementById('searchProperty')?.value;
        const mobileQuery = document.getElementById('mobileSearchProperty')?.value;
        const searchTerm = query || mobileQuery;
        
        if (searchTerm) {
            window.location.href = "{{ route('catalog') }}?search=" + encodeURIComponent(searchTerm);
        }
    }
    
    document.getElementById('searchProperty')?.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') searchProperty();
    });
    
    document.getElementById('mobileSearchProperty')?.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') searchProperty();
    });
</script>