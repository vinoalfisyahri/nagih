<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Game - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-900 text-white p-5">
            <h2 class="text-2xl font-bold mb-6">Admin Panel</h2>
            <ul>
                <li class="mb-3"><a href="{{ route('admin.dashboard') }}" class="block py-2 px-3 hover:bg-gray-800 rounded">Dashboard</a></li>
                <li class="mb-3"><a href="{{ route('admin.game.index') }}" class="block py-2 px-3 bg-blue-600 rounded">Kelola Game</a></li>
            </ul>
        </div>

        <!-- Content -->
        <div class="flex-1 p-10 overflow-y-auto">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">Daftar Game Top-Up</h1>
                <a href="{{ route('admin.game.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah Game</a>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-lg shadow overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="p-3">No</th>
                            <th class="p-3">Nama Game</th>
                            <th class="p-3">Slug</th>
                            <th class="p-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($games as $index => $game)
                            <tr class="border-b">
                                <td class="p-3">{{ $index + 1 }}</td>
                                <td class="p-3 font-semibold">{{ $game->name }}</td>
                                <td class="p-3 text-gray-500">{{ $game->slug }}</td>
                                <td class="p-3">
                                    <span class="text-gray-400 text-sm">Opsi edit/hapus menyusul</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-4 text-center text-gray-500">Belum ada data game.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>