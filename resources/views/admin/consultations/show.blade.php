@extends('layouts.admin')
@section('title', 'Detail Konsultasi')
@section('header', 'Detail Konsultasi')

@section('content')

<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.consultations.index') }}" class="text-gray-500 hover:text-black transition">
                    <i class="ti ti-arrow-left text-xl"></i>
                </a>
                <h1 class="text-xl font-bold text-black">Detail Konsultasi</h1>
                <span class="ml-auto font-mono text-xs text-gray-400">#{{ str_pad($consultation->id, 6, '0', STR_PAD_LEFT) }}</span>
            </div>
        </div>

        <div class="p-6 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="text-xs text-gray-400 uppercase tracking-wider">Nama Lengkap</label>
                    <p class="text-gray-800 font-medium mt-1">{{ $consultation->name }}</p>
                </div>
                <div>
                    <label class="text-xs text-gray-400 uppercase tracking-wider">Email</label>
                    <p class="text-gray-800 mt-1">{{ $consultation->email }}</p>
                </div>
                <div>
                    <label class="text-xs text-gray-400 uppercase tracking-wider">Nomor Telepon</label>
                    <p class="text-gray-800 mt-1">{{ $consultation->phone }}</p>
                </div>
                <div>
                    <label class="text-xs text-gray-400 uppercase tracking-wider">Perusahaan</label>
                    <p class="text-gray-800 mt-1">{{ $consultation->company ?? '-' }}</p>
                </div>
                <div>
                    <label class="text-xs text-gray-400 uppercase tracking-wider">Tipe Proyek</label>
                    <p class="text-gray-800 mt-1">{{ ucfirst($consultation->project_type) }}</p>
                </div>
                <div>
                    <label class="text-xs text-gray-400 uppercase tracking-wider">Status</label>
                    <div class="mt-1">
                        <form method="POST" action="{{ route('admin.consultations.status', $consultation->id) }}" class="inline">
                            @csrf
                            @method('PATCH')
                            <select name="status" onchange="this.form.submit()" class="text-sm border border-gray-200 rounded-lg px-3 py-1">
                                <option value="pending" {{ $consultation->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="processed" {{ $consultation->status === 'processed' ? 'selected' : '' }}>Diproses</option>
                                <option value="completed" {{ $consultation->status === 'completed' ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-100 pt-4">
                <label class="text-xs text-gray-400 uppercase tracking-wider">Deskripsi Proyek</label>
                <div class="bg-gray-50 rounded-xl p-4 mt-2">
                    <p class="text-gray-700 leading-relaxed">{{ $consultation->message }}</p>
                </div>
            </div>

            <div class="border-t border-gray-100 pt-4">
                <label class="text-xs text-gray-400 uppercase tracking-wider">Informasi Tambahan</label>
                <div class="grid grid-cols-2 gap-4 mt-2">
                    <div>
                        <span class="text-xs text-gray-400">Dibuat pada</span>
                        <p class="text-gray-700">{{ $consultation->created_at->format('d M Y H:i:s') }}</p>
                    </div>
                    <div>
                        <span class="text-xs text-gray-400">Terakhir diperbarui</span>
                        <p class="text-gray-700">{{ $consultation->updated_at->format('d M Y H:i:s') }}</p>
                    </div>
                </div>
            </div>

            <div class="flex gap-3 pt-4">
                <a href="{{ route('admin.consultations.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                    Kembali
                </a>
                <a href="mailto:{{ $consultation->email }}" class="px-6 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition">
                    <i class="ti ti-mail mr-1"></i> Balas Email
                </a>
            </div>
        </div>
    </div>
</div>

@endsection