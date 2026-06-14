@extends('layouts.admin')
@section('title', 'Tambah Portfolio')
@section('header', 'Tambah Portfolio')

@section('content')

<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.portfolios.index') }}" class="text-gray-500 hover:text-black transition">
                    <i class="ti ti-arrow-left text-xl"></i>
                </a>
                <h1 class="text-xl font-bold text-black">Tambah Portfolio Baru</h1>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.portfolios.store') }}" enctype="multipart/form-data" class="p-6 space-y-5">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Judul <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" required
                           class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori <span class="text-red-500">*</span></label>
                    <input type="text" name="category" value="{{ old('category') }}" required
                           class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black"
                           placeholder="Contoh: Residential, Kantor, Hotel">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="description" rows="4" 
                          class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black">{{ old('description') }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
                    <input type="text" name="location" value="{{ old('location') }}"
                           class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black"
                           placeholder="Contoh: Yogyakarta, Jakarta">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tahun</label>
                    <input type="number" name="year" value="{{ old('year', date('Y')) }}"
                           class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Gambar Utama</label>
                <input type="file" name="image" accept="image/*" class="w-full text-sm border border-gray-200 rounded-lg p-2">
                <p class="text-xs text-gray-400 mt-1">Max 2MB. Format: JPG, PNG</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Galeri (Multiple)</label>
                <input type="file" name="gallery[]" accept="image/*" multiple class="w-full text-sm border border-gray-200 rounded-lg p-2">
                <p class="text-xs text-gray-400 mt-1">Bisa pilih beberapa gambar sekaligus</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Urutan Tampil</label>
                    <input type="number" name="order" value="{{ old('order', 0) }}"
                           class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black">
                </div>
                <div class="flex items-center gap-4 pt-6">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1" class="w-4 h-4 rounded border-gray-300 text-yellow-500">
                        <span class="text-sm text-gray-700">Jadikan Unggulan</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 rounded border-gray-300 text-black">
                        <span class="text-sm text-gray-700">Aktif</span>
                    </label>
                </div>
            </div>

            <div class="flex gap-3 pt-4">
                <button type="submit" class="px-6 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition">
                    Simpan
                </button>
                <a href="{{ route('admin.portfolios.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

@endsection