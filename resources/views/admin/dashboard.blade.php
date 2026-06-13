@extends('layouts.admin')

@section('title', 'Dashboard')
@section('header', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Total Konsultasi</p>
                <p class="text-3xl font-bold text-black">{{ $stats['total_consultations'] }}</p>
            </div>
            <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center">
                <i class="ti ti-message-circle text-black text-xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Pending Konsultasi</p>
                <p class="text-3xl font-bold text-black">{{ $stats['pending_consultations'] }}</p>
            </div>
            <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center">
                <i class="ti ti-clock text-yellow-600 text-xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Total Katalog</p>
                <p class="text-3xl font-bold text-black">{{ $stats['total_catalogs'] }}</p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                <i class="ti ti-file-description text-blue-600 text-xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Total User</p>
                <p class="text-3xl font-bold text-black">{{ $stats['total_users'] }}</p>
            </div>
            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                <i class="ti ti-users text-purple-600 text-xl"></i>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-white rounded-2xl border border-gray-100">
        <div class="px-6 py-4 border-b border-gray-100">
            <h3 class="font-semibold text-black">Konsultasi Terbaru</h3>
        </div>
        <div class="divide-y divide-gray-100">
            @forelse($recentConsultations as $consult)
            <div class="px-6 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="font-medium text-black">{{ $consult->name }}</p>
                        <p class="text-sm text-gray-500">{{ $consult->email }}</p>
                        <p class="text-xs text-gray-400 mt-1">{{ $consult->created_at->diffForHumans() }}</p>
                    </div>
                    <span class="text-xs px-2 py-1 rounded-full
                        {{ $consult->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : '' }}
                        {{ $consult->status === 'processed' ? 'bg-blue-100 text-blue-700' : '' }}
                        {{ $consult->status === 'completed' ? 'bg-green-100 text-green-700' : '' }}">
                        {{ ucfirst($consult->status) }}
                    </span>
                </div>
            </div>
            @empty
            <div class="px-6 py-8 text-center text-gray-400">Belum ada konsultasi</div>
            @endforelse
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100">
        <div class="px-6 py-4 border-b border-gray-100">
            <h3 class="font-semibold text-black">User Terbaru</h3>
        </div>
        <div class="divide-y divide-gray-100">
            @forelse($recentUsers as $user)
            <div class="px-6 py-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center">
                        <i class="ti ti-user text-gray-500"></i>
                    </div>
                    <div>
                        <p class="font-medium text-black">{{ $user->name }}</p>
                        <p class="text-sm text-gray-500">{{ $user->email }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="px-6 py-8 text-center text-gray-400">Belum ada user</div>
            @endforelse
        </div>
    </div>
</div>
@endsection