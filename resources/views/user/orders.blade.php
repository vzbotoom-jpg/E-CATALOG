@extends('layouts.app')
@section('title', 'Pesanan Saya — SpaceINT')

@section('content')

<div class="bg-gray-50 min-h-screen py-16">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-black">
                <h1 class="text-xl font-bold text-white">Pesanan Saya</h1>
            </div>

            <div class="divide-y divide-gray-100">
                @forelse($consultations as $consultation)
                <div class="p-6">
                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <div>
                            <div class="flex items-center gap-3 mb-2">
                                <span class="text-sm font-mono text-gray-500">#{{ str_pad($consultation->id, 6, '0', STR_PAD_LEFT) }}</span>
                                <span class="text-xs px-2 py-1 rounded-full
                                    {{ $consultation->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                    {{ $consultation->status === 'processed' ? 'bg-blue-100 text-blue-700' : '' }}
                                    {{ $consultation->status === 'completed' ? 'bg-green-100 text-green-700' : '' }}">
                                    {{ ucfirst($consultation->status) }}
                                </span>
                            </div>
                            <p class="text-gray-600 text-sm">{{ $consultation->project_type }}</p>
                            <p class="text-gray-400 text-xs mt-1">{{ $consultation->created_at->format('d M Y H:i') }}</p>
                        </div>
                        <div class="text-right">
                            <div class="text-sm text-gray-500 mb-2">{{ $consultation->name }}</div>
                            <a href="{{ route('orders.show', $consultation->id) }}" 
                               class="text-sm text-black hover:text-gray-600 transition">
                                Lihat Detail →
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="p-12 text-center">
                    <i class="ti ti-shopping-bag-off text-5xl text-gray-300 mb-4 block"></i>
                    <p class="text-gray-400">Belum ada pesanan</p>
                    <a href="{{ route('consultation') }}" class="inline-block mt-4 px-6 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition">
                        Konsultasi Sekarang
                    </a>
                </div>
                @endforelse
            </div>

            <div class="px-6 py-4 border-t border-gray-100">
                {{ $consultations->links() }}
            </div>
        </div>

    </div>
</div>

@endsection