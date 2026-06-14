@extends('layouts.admin')
@section('title', 'Edit Katalog')
@section('header', 'Edit Katalog')

@section('content')

<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.catalogs.index') }}" class="text-gray-500 hover:text-black transition">
                    <i class="ti ti-arrow-left text-xl"></i>
                </a>
                <h1 class="text-xl font-bold text-black">Edit Katalog</h1>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.catalogs.update', $catalog->id) }}" enctype="multipart/form-data" class="p-6 space-y-5">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Katalog <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $catalog->name) }}" required
                           class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori <span class="text-red-500">*</span></label>
                    <input type="text" name="category" value="{{ old('category', $catalog->category) }}" required
                           class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="description" rows="4" 
                          class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black">{{ old('description', $catalog->description) }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Gambar</label>
                    @if($catalog->image)
                        <div class="mb-2">
                            <img src="{{ Storage::url($catalog->image) }}" class="w-20 h-20 object-cover rounded-lg">
                            <p class="text-xs text-gray-400 mt-1">Gambar saat ini</p>
                        </div>
                    @endif
                    <input type="file" name="image" accept="image/*" class="w-full text-sm border border-gray-200 rounded-lg p-2">
                    <p class="text-xs text-gray-400 mt-1">Kosongkan jika tidak ingin mengganti</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">File PDF</label>
                    @if($catalog->pdf_file)
                        <div class="mb-2">
                            <a href="{{ Storage::url($catalog->pdf_file) }}" target="_blank" class="text-blue-600 text-sm">PDF saat ini</a>
                        </div>
                    @endif
                    <input type="file" name="pdf_file" accept="application/pdf" class="w-full text-sm border border-gray-200 rounded-lg p-2">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Urutan Tampil</label>
                    <input type="number" name="order" value="{{ old('order', $catalog->order) }}"
                           class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-black">
                </div>
                <div class="flex items-center pt-6">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ $catalog->is_active ? 'checked' : '' }} class="w-4 h-4 rounded border-gray-300 text-black">
                        <span class="text-sm text-gray-700">Aktif / Tampilkan di Website</span>
                    </label>
                </div>
            </div>

            <div class="flex gap-3 pt-4">
                <button type="submit" class="px-6 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.catalogs.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

@endsection