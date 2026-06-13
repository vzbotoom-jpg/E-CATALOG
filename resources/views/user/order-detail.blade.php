@extends('layouts.app')
@section('title', 'Detail Pesanan — SpaceINT')

@section('content')

<div class="bg-gray-50 min-h-screen py-16">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-black">
                <div class="flex items-center gap-4">
                    <a href="{{ route('orders') }}" class="text-white hover:text-gray-300 transition">
                        <i class="ti ti-arrow-left text-xl"></i>
                    </a>
                    <h1 class="text-xl font-bold text-white">Detail Pesanan</h1>
                </div>
            </div>

            <div class="p-6 space-y-5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-xs text-gray-400">Nomor Pesanan</p>
                        <p class="font-mono text-sm">#{{ str_pad($consultation->id, 6, '0', STR_PAD_LEFT) }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400">Status</p>
                        <span class="text-xs px-2 py-1 rounded-full
                            {{ $consultation->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : '' }}
                            {{ $consultation->status === 'processed' ? 'bg-blue-100 text-blue-700' : '' }}
                            {{ $consultation->status === 'completed' ? 'bg-green-100 text-green-700' : '' }}">
                            {{ ucfirst($consultation->status) }}
                        </span>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400">Tanggal</p>
                        <p class="text-sm">{{ $consultation->created_at->format('d M Y H:i') }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400">Tipe Proyek</p>
                        <p class="text-sm">{{ $consultation->project_type }}</p>
                    </div>
                </div>

                <div class="border-t border-gray-100 pt-4">
                    <h3 class="font-semibold text-black mb-3">Informasi Kontak</h3>
                    <div class="space-y-2">
                        <p><span class="text-gray-500 text-sm">Nama:</span> {{ $consultation->name }}</p>
                        <p><span class="text-gray-500 text-sm">Email:</span> {{ $consultation->email }}</p>
                        <p><span class="text-gray-500 text-sm">Telepon:</span> {{ $consultation->phone }}</p>
                        @if($consultation->company)
                        <p><span class="text-gray-500 text-sm">Perusahaan:</span> {{ $consultation->company }}</p>
                        @endif
                    </div>
                </div>

                <div class="border-t border-gray-100 pt-4">
                    <h3 class="font-semibold text-black mb-3">Deskripsi Proyek</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">{{ $consultation->message }}</p>
                </div>

                @if($consultation->status === 'completed')
                <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                    <div class="flex items-center gap-2">
                        <i class="ti ti-circle-check text-green-500 text-lg"></i>
                        <span class="text-green-700 text-sm">Pesanan telah selesai. Terima kasih!</span>
                    </div>
                </div>
                @endif
            </div>
        </div>

    </div>
</div>

@endsection