@extends('layouts.app')
@section('title', 'Profil Saya — SpaceINT')

@section('content')

<div class="bg-gray-50 min-h-screen py-16">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-black">
                <h1 class="text-xl font-bold text-white">Profil Saya</h1>
            </div>

            @if(session('success'))
            <div class="m-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="p-6 space-y-5">
                @csrf
                @method('PUT')

                <div class="flex items-center gap-6">
                    <div class="relative">
                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center overflow-hidden">
                            @if(Auth::user()->avatar)
                                <img src="{{ Storage::url(Auth::user()->avatar) }}" class="w-full h-full object-cover">
                            @else
                                <i class="ti ti-user text-gray-400 text-3xl"></i>
                            @endif
                        </div>
                        <label for="avatarInput" class="absolute bottom-0 right-0 w-8 h-8 bg-black rounded-full flex items-center justify-center cursor-pointer hover:bg-gray-800 transition">
                            <i class="ti ti-camera text-white text-sm"></i>
                        </label>
                        <input type="file" name="avatar" id="avatarInput" accept="image/*" class="hidden" onchange="previewAvatar(event)">
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Upload foto profil</p>
                        <p class="text-xs text-gray-400">Format: JPG, PNG. Maks 2MB</p>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" required
                           class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" value="{{ Auth::user()->email }}" disabled
                           class="w-full px-4 py-2 border border-gray-200 rounded-lg bg-gray-50 text-gray-500">
                    <p class="text-xs text-gray-400 mt-1">Email tidak dapat diubah</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                    <input type="tel" name="phone" value="{{ old('phone', Auth::user()->phone) }}"
                           class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black"
                           placeholder="08xxxxxxxxxx">
                </div>

                <div class="pt-4 border-t border-gray-100">
                    <button type="submit" class="px-6 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>

<script>
    function previewAvatar(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = e => {
                const preview = document.querySelector('.w-20 h-20 img');
                if (preview) {
                    preview.src = e.target.result;
                } else {
                    const container = document.querySelector('.w-20.h-20');
                    container.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">`;
                }
            };
            reader.readAsDataURL(file);
        }
    }
</script>

@endsection