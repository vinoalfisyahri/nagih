<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Game - Admin Panel</title>
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
            <h1 class="text-3xl font-bold mb-6">Tambah Game Baru</h1>

            <div class="bg-white p-6 rounded-lg shadow max-w-xl">
                <form action="{{ route('admin.game.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block font-semibold mb-2">Nama Game</label>
                        <input type="text" name="name" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" placeholder="Contoh: Mobile Legends" required>
                    </div>

                    <div class="flex justify-end gap-2">
                        <a href="{{ route('admin.game.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Batal</a>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>