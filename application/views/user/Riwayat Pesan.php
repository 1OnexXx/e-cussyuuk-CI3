<!DOCTYPE html>
<html lang="id" x-data="{ tab: 'semua', pesanan: [] }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="w-full bg-[#135FAB] text-white mb-20">
        <div class="p-4 flex justify-between items-center px-10">
            <a href="<?= base_url() ?>" class="text-2xl font-bold">E-cussyuuk.com</a>
            <div class="space-x-6">
                <a href="<?= base_url("PesanTiket") ?>" class="relative after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-white after:transition-all after:duration-300 hover:after:w-full">
                    Pesan Tiket
                </a>
                <a href="<?= base_url("HistoryTiket") ?>" class="relative after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-white after:transition-all after:duration-300 hover:after:w-full">
                    Riwayat Pemesanan
                </a>
            </div>
            <button class="bg-white text-blue-600 px-4 py-2 rounded-md">Cari Pemesanan</button>
        </div>
    </nav>

    <!-- Kontainer Daftar Pesanan -->
    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold">Daftar Pesanan Saya</h2>

        <!-- Tombol Filter Pesanan -->
        <div class="flex space-x-4 mt-4 border-b pb-2 text-gray-600">
            <button @click="tab='semua'" :class="{'text-[#135FAB] border-b-2 border-[#135FAB]': tab === 'semua'}" class="pb-2">
                Semua
            </button>
            <button @click="tab='diterbitkan'" :class="{'text-[#135FAB] border-b-2 border-[#135FAB]': tab === 'diterbitkan'}" class="pb-2">
                Diterbitkan
            </button>
            <button @click="tab='terkonfirmasi'" :class="{'text-[#135FAB] border-b-2 border-[#135FAB]': tab === 'terkonfirmasi'}" class="pb-2">
                Terkonfirmasi
            </button>
            <button @click="tab='tertunda'" :class="{'text-[#135FAB] border-b-2 border-[#135FAB]': tab === 'tertunda'}" class="pb-2">
                Tertunda
            </button>
            <button @click="tab='dibatalkan'" :class="{'text-[#135FAB] border-b-2 border-[#135FAB]': tab === 'dibatalkan'}" class="pb-2">
                Dibatalkan
            </button>
        </div>

        <!-- Input Pencarian -->
        <div class="mt-4 flex space-x-2">
            <input type="text" x-ref="searchInput" placeholder="Masukkan kode pesanan" class="border p-2 rounded w-full">
            <button class="bg-[#135FAB] text-white px-4 py-2 rounded">Cari</button>
        </div>
        <p class="text-xs text-red-500 my-2">Kode E-cussyuuk diperlukan</p>

        <!-- Dummy UI untuk masing-masing tab -->
        <div class="mt-6 border p-4 rounded-lg shadow-lg bg-white">
            <div x-show="tab === 'semua'">
                <h2 class="text-xl font-semibold mb-4">📋 Semua Pesanan</h2>
                <p>Menampilkan semua pesanan yang tersedia...</p>
            </div>

            <div x-show="tab === 'diterbitkan'">
                <h2 class="text-xl font-semibold mb-4">✅ Pesanan Diterbitkan</h2>
                <p>Pesanan yang telah diterbitkan dan siap diproses.</p>
            </div>

            <div x-show="tab === 'terkonfirmasi'">
                <h2 class="text-xl font-semibold mb-4">🔍 Pesanan Terkonfirmasi</h2>
                <p>Pesanan yang telah dikonfirmasi oleh sistem.</p>
            </div>

            <div x-show="tab === 'tertunda'">
                <h2 class="text-xl font-semibold mb-4">⏳ Pesanan Tertunda</h2>
                <p>Pesanan yang masih dalam status menunggu.</p>
            </div>

            <div x-show="tab === 'dibatalkan'">
                <h2 class="text-xl font-semibold mb-4">❌ Pesanan Dibatalkan</h2>
                <p>Pesanan yang telah dibatalkan dan tidak dapat diproses.</p>
            </div>
        </div>

        <!-- Tombol untuk memfokuskan input pencarian -->
        <button class="bg-[#135FAB] text-white px-4 py-2 mt-4 rounded" @click="tab = 'semua'; $refs.searchInput.focus();">
            Temukan Pesanan Anda
        </button>
    </div>

</body>

</html>
