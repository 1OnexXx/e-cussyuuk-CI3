<!DOCTYPE html>
<html lang="id" x-data="{ tab: 'tertunda' }">
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
            <a href="#" class="text-2xl font-bold">E-cussyuuk.com</a>
            <div class="space-x-6">
                <a href="#" class="hover:underline">Pesan Tiket</a>
                <a href="#" class="hover:underline">Riwayat Pemesanan</a>
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

        <!-- Daftar Pesanan -->
        <div class="mt-6 space-y-4">
            <?php if (!empty($pesanan)): ?>
                <?php foreach ($pesanan as $row): ?>
                    <?php 
                        $status = strtolower($row['status']); // Pastikan status dalam huruf kecil
                        $total_bayar = number_format($row['total_bayar'], 0, ',', '.'); 
                    ?>
                    <div x-show="tab === 'semua' || tab === '<?= $status ?>'" class="border p-4 rounded-lg shadow-lg bg-white relative">
                        <h3 class="text-lg font-semibold">Kode: <?= $row['kode_pemesanan'] ?></h3>
                        <p>Tujuan: <?= $row['tujuan'] ?></p>
                        <p>Tanggal Berangkat: <?= $row['tanggal_berangkat'] ?></p>
                        <p>Jam Cek-in: <?= $row['jam_cekin'] ?></p>
                        <p>Jam Berangkat: <?= $row['jam_berangkat'] ?></p>
                        <p>Total Bayar: Rp. <?= $total_bayar ?></p>
                        <p>Status: <span class="font-bold"><?= ucfirst($status) ?></span></p>
                        
                        <!-- Tombol Hapus -->
                        <form action="<?= base_url('index.php/HistoryTiket/delete/' . $row['id_pemesanan']); ?>" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?');">
                            <button type="submit" class="mt-3 bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
                                Hapus
                            </button>
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-gray-500">Belum ada pesanan.</p>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>
