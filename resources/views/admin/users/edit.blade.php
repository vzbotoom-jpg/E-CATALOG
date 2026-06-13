@extends('layouts.admin')
@section('title', 'Edit User')
@section('header', 'Edit User')

@section('content')

<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.users.index') }}" class="text-gray-500 hover:text-black transition">
                    <i class="ti ti-arrow-left text-xl"></i>
                </a>
                <h1 class="text-xl font-bold text-black">Edit User</h1>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.users.update', $user->id) }}" class="p-6 space-y-5">
            @csrf
            @method('PUT')

            @if(session('error'))
            <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg text-sm">
                {{ session('error') }}
            </div>
            @endif

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                       class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black">
                @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                       class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black">
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                <input type="tel" name="phone" value="{{ old('phone', $user->phone) }}"
                       class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black"
                       placeholder="08xxxxxxxxxx">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password (Kosongkan jika tidak diubah)</label>
                <input type="password" name="password" 
                       class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black">
                @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" 
                       class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black">
            </div>

            <div class="flex items-center gap-2">
                <input type="checkbox" name="is_admin" id="is_admin" value="1" {{ $user->is_admin ? 'checked' : '' }}
                       class="w-4 h-4 rounded border-gray-300 text-black focus:ring-black">
                <label for="is_admin" class="text-sm text-gray-700">Berikan akses Admin</label>
            </div>

            <div class="flex gap-3 pt-4">
                <button type="submit" class="px-6 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.users.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

@endsection