@extends('layouts.admin')
@section('title', 'Manajemen Konsultasi')
@section('header', 'Konsultasi')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-xl p-4 border border-gray-100">
        <div class="text-2xl font-bold text-black">{{ $stats['total'] }}</div>
        <div class="text-xs text-gray-500">Total Konsultasi</div>
    </div>
    <div class="bg-white rounded-xl p-4 border border-gray-100">
        <div class="text-2xl font-bold text-yellow-600">{{ $stats['pending'] }}</div>
        <div class="text-xs text-gray-500">Pending</div>
    </div>
    <div class="bg-white rounded-xl p-4 border border-gray-100">
        <div class="text-2xl font-bold text-blue-600">{{ $stats['processed'] }}</div>
        <div class="text-xs text-gray-500">Diproses</div>
    </div>
    <div class="bg-white rounded-xl p-4 border border-gray-100">
        <div class="text-2xl font-bold text-green-600">{{ $stats['completed'] }}</div>
        <div class="text-xs text-gray-500">Selesai</div>
    </div>
</div>

<div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-50 text-xs text-gray-500 uppercase tracking-wider border-b border-gray-100">
                    <th class="px-5 py-3 text-left">ID</th>
                    <th class="px-5 py-3 text-left">Nama</th>
                    <th class="px-5 py-3 text-left">Email/Telepon</th>
                    <th class="px-5 py-3 text-left">Tipe Proyek</th>
                    <th class="px-5 py-3 text-left">Tanggal</th>
                    <th class="px-5 py-3 text-center w-24">Status</th>
                    <th class="px-5 py-3 text-center w-24">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($consultations as $consult)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-5 py-3 font-mono text-xs">#{{ str_pad($consult->id, 6, '0', STR_PAD_LEFT) }}</td>
                    <td class="px-5 py-3">
                        <div class="font-medium text-gray-800">{{ $consult->name }}</div>
                    </div>
                    <td class="px-5 py-3">
                        <div class="text-gray-600">{{ $consult->email }}</div>
                        <div class="text-xs text-gray-400">{{ $consult->phone }}</div>
                    </div>
                    <td class="px-5 py-3">
                        <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full">{{ ucfirst($consult->project_type) }}</span>
                    </div>
                    <td class="px-5 py-3 text-gray-500 text-xs">
                        {{ $consult->created_at->format('d/m/Y H:i') }}
                    </div>
                    <td class="px-5 py-3 text-center">
                        <form method="POST" action="{{ route('admin.consultations.status', $consult->id) }}" class="status-form">
                            @csrf
                            @method('PATCH')
                            <select name="status" onchange="this.form.submit()" class="text-xs border border-gray-200 rounded-lg px-2 py-1">
                                <option value="pending" {{ $consult->status === 'pending' ? 'selected' : '' }} class="text-yellow-600">Pending</option>
                                <option value="processed" {{ $consult->status === 'processed' ? 'selected' : '' }} class="text-blue-600">Diproses</option>
                                <option value="completed" {{ $consult->status === 'completed' ? 'selected' : '' }} class="text-green-600">Selesai</option>
                            </select>
                        </form>
                    </div>
                    <td class="px-5 py-3">
                        <div class="flex gap-2 justify-center">
                            <a href="{{ route('admin.consultations.show', $consult->id) }}" 
                               class="w-8 h-8 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center hover:bg-blue-100 transition"
                               title="Detail">
                                <i class="ti ti-eye text-sm"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.consultations.destroy', $consult->id) }}"
                                  onsubmit="return confirm('Hapus konsultasi dari {{ $consult->name }}?')" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="w-8 h-8 bg-red-50 text-red-500 rounded-lg flex items-center justify-center hover:bg-red-100 transition"
                                        title="Hapus">
                                    <i class="ti ti-trash text-sm"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-5 py-12 text-center text-gray-400">
                        <i class="ti ti-message-circle text-4xl mb-3 block"></i>
                        Belum ada konsultasi
                    </div>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-5 py-4 border-t border-gray-100">
        {{ $consultations->links() }}
    </div>
</div>

@endsection