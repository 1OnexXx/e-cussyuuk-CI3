<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ringkasan Perjalanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="">
    <!-- Navbar -->
    <nav class="w-full relative bg-[#135FAB] text-whitez-10 mb-10">
        <!-- Kontainer Menu -->
        <div class="relative bg-['#135FAB'] text-white p-4 flex justify-between items-center px-10 z-10">
            <a href="<?= base_url('') ?>" class="text-2xl font-bold">E-cussyuuk.com</a>
            <div class="space-x-6">
                <a href="<?= base_url("PesanTiket") ?>"
                    class="relative text-white after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-white after:transition-all after:duration-300 hover:after:w-full">
                    Pesan Tiket
                </a>
                <a href="<?= base_url("HistoryTiket") ?>"
                    class="relative text-white after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-white after:transition-all after:duration-300 hover:after:w-full">
                    Riwayat Pemesanan
                </a>
            </div>
            <button class="bg-white text-blue-600 px-4 py-2 rounded-md">Cari Pemesanan</button>
        </div>
    </nav>


    <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4">Ringkasan Perjalanan</h2>
        
        <div class="bg-gray-50 p-4 rounded-lg mb-4">
            <h3 class="font-semibold">Penerbangan Berangkat</h3>
            <p class="text-sm text-gray-600">Medan (KNO) → Jakarta (CGK)</p>
            <div class="flex justify-between mt-2">
                <div>
                    <p class="text-lg font-semibold">06:00</p>
                    <p class="text-sm text-gray-600">Medan (KNO)</p>
                </div>
                <p class="text-sm text-gray-600">2j 20m</p>
                <div>
                    <p class="text-lg font-semibold">08:20</p>
                    <p class="text-sm text-gray-600">Jakarta (CGK)</p>
                </div>
            </div>
            <button class="mt-3 px-4 py-2 text-sm font-semibold text-red-500 border border-red-500 rounded-lg hover:bg-red-50">Ubah Penerbangan</button>
        </div>

        <div class="bg-gray-50 p-4 rounded-lg mb-4">
            <h3 class="font-semibold">Penerbangan Pulang</h3>
            <p class="text-sm text-gray-600">Jakarta (CGK) → Medan (KNO)</p>
            <div class="flex justify-between mt-2">
                <div>
                    <p class="text-lg font-semibold">17:35</p>
                    <p class="text-sm text-gray-600">Jakarta (CGK)</p>
                </div>
                <p class="text-sm text-gray-600">2j 20m</p>
                <div>
                    <p class="text-lg font-semibold">19:55</p>
                    <p class="text-sm text-gray-600">Medan (KNO)</p>
                </div>
            </div>
            <button class="mt-3 px-4 py-2 text-sm font-semibold text-red-500 border border-red-500 rounded-lg hover:bg-red-50">Ubah Penerbangan</button>
        </div>
        
        <div class="bg-white p-4 rounded-lg shadow-md mt-4">
            <h3 class="font-semibold">Rincian Harga</h3>
            <div class="flex justify-between text-sm mt-2">
                <p>Dewasa (1 Org)</p>
                <p>Rp 2.335.450</p>
            </div>
            <div class="flex justify-between text-sm text-green-500 mt-1">
                <p>Diskon</p>
                <p>-Rp 60.000</p>
            </div>
            <div class="flex justify-between font-bold text-lg mt-2">
                <p>Harga Total</p>
                <p>Rp 2.275.450</p>
            </div>
            <button class="mt-4 w-full bg-red-500 text-white py-2 rounded-lg text-center font-semibold hover:bg-red-600">Checkout</button>
        </div>
    </div>
</body>
</html>
