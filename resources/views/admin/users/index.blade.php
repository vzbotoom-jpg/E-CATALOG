@extends('layouts.admin')
@section('title', 'Kelola User')
@section('header', 'Kelola User')

@section('content')

<div class="flex justify-between items-center mb-6">
    <div>
        <p class="text-gray-400">Total {{ $users->total() }} user terdaftar</p>
    </div>
    <a href="{{ route('admin.users.create') }}" 
       class="bg-black hover:bg-gray-800 text-white px-4 py-2 rounded-xl text-sm transition">
        <i class="ti ti-plus mr-1"></i> Tambah User
    </a>
</div>

<div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-50 text-xs text-gray-500 uppercase tracking-wider">
                    <th class="px-5 py-3 text-left">User</th>
                    <th class="px-5 py-3 text-left">Email</th>
                    <th class="px-5 py-3 text-left">Telepon</th>
                    <th class="px-5 py-3 text-left">Bergabung</th>
                    <th class="px-5 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($users as $user)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-5 py-3">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center">
                                <i class="ti ti-user text-gray-500 text-sm"></i>
                            </div>
                            <span class="font-medium text-gray-800">{{ $user->name }}</span>
                        </div>
                    </td>
                    <td class="px-5 py-3 text-gray-600">{{ $user->email }}</td>
                    <td class="px-5 py-3 text-gray-600">{{ $user->phone ?? '-' }}</td>
                    <td class="px-5 py-3 text-xs text-gray-400">{{ $user->created_at->format('d M Y') }}</td>
                    <td class="px-5 py-3">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.users.edit', $user->id) }}" 
                               class="w-8 h-8 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center hover:bg-blue-100 transition"
                               title="Edit">
                                <i class="ti ti-edit text-sm"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}"
                                  onsubmit="return confirm('Hapus user {{ $user->name }}?')" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="w-8 h-8 bg-red-50 text-red-500 rounded-lg flex items-center justify-center hover:bg-red-100 transition"
                                        title="Hapus">
                                    <i class="ti ti-trash text-sm"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-5 py-12 text-center text-gray-400">
                        <i class="ti ti-users text-4xl mb-3 block"></i>
                        Belum ada user terdaftar
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-5 py-4 border-t border-gray-100">
        {{ $users->links() }}
    </div>
</div>

@endsection