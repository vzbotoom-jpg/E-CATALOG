@extends('layouts.admin')
@section('title', 'Tambah Katalog')
@section('header', 'Tambah Katalog')

@section('content')

<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.catalogs.index') }}" class="text-gray-500 hover:text-black transition">
                    <i class="ti ti-arrow-left text-xl"></i>
                </a>
                <h1 class="text-xl font-bold text-black">Tambah Katalog Baru</h1>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.catalogs.store') }}" enctype="multipart/form-data" class="p-6 space-y-5">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Katalog <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                           class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black">
                    @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori <span class="text-red-500">*</span></label>
                    <input type="text" name="category" value="{{ old('category') }}" required
                           class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black"
                           placeholder="Contoh: Meja Kantor, Kursi, Rak">
                    @error('category')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="description" rows="4" 
                          class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black">{{ old('description') }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Gambar</label>
                    <input type="file" name="image" accept="image/*" class="w-full text-sm border border-gray-200 rounded-lg p-2">
                    <p class="text-xs text-gray-400 mt-1">Max 2MB. Format: JPG, PNG</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">File PDF</label>
                    <input type="file" name="pdf_file" accept="application/pdf" class="w-full text-sm border border-gray-200 rounded-lg p-2">
                    <p class="text-xs text-gray-400 mt-1">Max 5MB</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Urutan Tampil</label>
                    <input type="number" name="order" value="{{ old('order', 0) }}"
                           class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black">
                </div>
                <div class="flex items-center pt-6">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 rounded border-gray-300 text-black focus:ring-black">
                        <span class="text-sm text-gray-700">Aktif / Tampilkan di Website</span>
                    </label>
                </div>
            </div>

            <div class="flex gap-3 pt-4">
                <button type="submit" class="px-6 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition">
                    Simpan
                </button>
                <a href="{{ route('admin.catalogs.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

@endsection