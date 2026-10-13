<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Top Up</title>
    <!-- Contoh pakai Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white font-sans">

    <div class="container mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold mb-6 text-center">Pilih Game Favorit Kamu</h1>

        <!-- Grid Daftar Game -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @forelse($games as $game)
                <div class="bg-gray-800 border border-gray-700 rounded-lg p-4 text-center hover:border-blue-500 transition">
                    <img src="{{ $game->banner ?? 'https://via.placeholder.com/150' }}" alt="{{ $game->name }}" class="w-full h-40 object-cover rounded-md mb-3">
                    <h2 class="font-semibold text-lg">{{ $game->name }}</h2>
                    <a href="#" class="mt-3 inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-md">Top Up Sekarang</a>
                </div>
            @empty
                <p class="col-span-4 text-center text-gray-400">Belum ada game yang tersedia saat ini.</p>
            @endforelse
        </div>
    </div>

</body>
</html>