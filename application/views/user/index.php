<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Tambahkan Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</head>

<body class="relative ">

    <!-- Navbar -->
    <nav class="w-full relative bg-[#135FAB] text-whitez-10">

        <!-- Gambar Latar -->
        <div class="absolute w-full z-0">
            <img src="<?= base_url('assets/img/download.jpeg') ?>" alt="Background" class="w-full object-cover">
        </div>

        <!-- Kontainer Menu -->
        <div class="relative bg-['#135FAB'] text-white p-4 flex justify-between items-center px-10 z-10">
            <a href="<?= base_url() ?>" class="text-2xl font-bold">E-cussyuuk.com</a>
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
            <?php if ($this->session->userdata('user')): ?>
                <a href="<?= base_url("auth/logout") ?>" class="bg-red-600 text-white px-4 py-2 rounded-md">Logout</a>
            <?php else: ?>
                <a href="<?= base_url("auth") ?>" class="bg-white text-blue-600 px-4 py-2 rounded-md">Login</a>
            <?php endif; ?>

        </div>
    </nav>

    <!-- Bagian Konten -->
    <form action="<?= base_url("Home_Controller/cari_penerbangan") ?>" method="GET">
    <div class="relative z-10 flex flex-col items-center mt-32 text-center sticky h-[600px]">
        <h2 class="text-4xl font-bold text-white">Beli Tiket Pesawat Aman Banget</h2>
        <p class="mt-2 text-base text-white">Jangan lewatkan harga terbaik untuk perjalanan ini.</p>

        <div class="bg-white shadow-lg rounded-lg p-6 w-11/12 max-w-3xl mt-6">
            <div class="flex flex-wrap gap-4">
                <div class="flex flex-col sm:flex-row w-full gap-4">
                    <div class="flex flex-col w-full sm:w-1/2">
                        <label for="awal" class="font-semibold">Rute Awal</label>
                        <input type="text" id="awal" name="rute_awal" placeholder="Jakarta" list="kota-list-awal"
                            class="border p-2 rounded focus:ring-2 focus:ring-blue-400">
                        <datalist id="kota-list-awal">
                            <option value="Jakarta">
                            <option value="Surabaya">
                            <option value="Bali">
                        </datalist>
                    </div>
                    <div class="flex flex-col w-full sm:w-1/2">
                        <label for="tujuan" class="font-semibold">Rute Tujuan</label>
                        <input type="text" id="tujuan" name="rute_akhir" placeholder="Bandung" 
                            class="border p-2 rounded focus:ring-2 focus:ring-blue-400" list="kota-list-akhir">
                        <datalist id="kota-list-akhir">
                            <option value="Jakarta">
                            <option value="Surabaya">
                            <option value="Bali">
                        </datalist>
                    </div>
                </div>

                <div class="w-full text-center mt-4">
                    <button type="submit"
                        class="bg-blue-600 w-full text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">🔍
                        Cari</button>
                </div>
            </div>
        </div>
    </div>
</form>

    <div class="w-full text-black p-4 z-20 mt-20">
        <div class="w-4/5 mx-auto">
            <h1 class="text-3xl font-medium mb-6">Pilihan Penerbangan Terbaru</h1>

            <div class="grid grid-cols-3 gap-4">
                <?php if (empty($flights)): ?>
                    <p class="col-span-3 text-center text-gray-500">Tidak ada penerbangan terbaru yang tersedia.</p>
                <?php else: ?>
                    <?php foreach ($flights as $flight): ?>
                        <div class="relative bg-black text-white rounded-lg overflow-hidden group">
                            <div class="overflow-hidden">
                                <img src="<?= base_url('assets/img/download.jpeg') ?>"
                                    alt="Penerbangan ke <?= isset($flight['tujuan']) ? htmlspecialchars($flight['tujuan']) : 'Tujuan Tidak Diketahui' ?>"
                                    class="w-full h-full object-cover opacity-80 transition-transform duration-500 group-hover:scale-110">
                            </div>
                            <div class="absolute inset-0 p-4 flex flex-col justify-between 
                            bg-gradient-to-b from-black/60 to-black/80 
                            transition-all duration-500 group-hover:from-black/30 group-hover:to-black/50">
                                <div>
                                    <?php if (!empty($flight['id']) && $flight['id'] !== "-"): ?>
                                        <p class="text-sm text-gray-300">Penerbangan dari
                                            <?= htmlspecialchars($flight['rute_awal'] ?? 'Tidak Diketahui') ?>
                                        </p>
                                    <?php else: ?>
                                        <p class="text-sm text-gray-300">Penerbangan ke
                                            <?= htmlspecialchars($flight['rute_ahir'] ?? 'Tidak Diketahui') ?>
                                        </p>
                                    <?php endif; ?>
                                    <h2 class="text-xl font-bold group-hover:text-yellow-400 transition-colors duration-500">
                                        ✈
                                        <?= isset($flight['tujuan']) ? htmlspecialchars($flight['tujuan']) : 'Tujuan Tidak Diketahui' ?>
                                    </h2>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-300">Mulai dari</p>
                                    <h3 class="text-2xl font-bold group-hover:text-yellow-400 transition-colors duration-500">
                                        <?= isset($flight['harga']) ? 'Rp ' . number_format($flight['harga'], 0, ',', '.') : 'Harga Tidak Tersedia' ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="bg-blue-100 py-10 px-4 sm:px-6 lg:px-8 my-20 ">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-2xl font-semibold text-gray-900">Mengapa harus berpergian bareng E-cussyuuk</h2>
            <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <!-- Card Item -->
                <div
                    class="flex flex-col items-center text-center bg-white p-6 rounded-lg shadow hover:shadow-lg transition duration-300">
                    <i class="fa-solid fa-calendar-check text-blue-500 text-5xl"></i>
                    <h3 class="font-semibold text-gray-900 mt-4">Mempermudah Pengalaman Booking Anda</h3>
                    <p class="text-gray-600 text-sm">Rasakan fleksibilitas dan kemudahan selama proses pemesanan</p>
                </div>

                <div
                    class="flex flex-col items-center text-center bg-white p-6 rounded-lg shadow hover:shadow-lg transition duration-300">
                    <i class="fa-solid fa-map-location-dot text-green-500 text-5xl"></i>
                    <h3 class="font-semibold text-gray-900 mt-4">Banyak Pilihan Produk Travel</h3>
                    <p class="text-gray-600 text-sm">Nikmati momen yang mengesankan dengan jutaan rute dan akomodasi</p>
                </div>

                <div
                    class="flex flex-col items-center text-center bg-white p-6 rounded-lg shadow hover:shadow-lg transition duration-300">
                    <i class="fa-solid fa-briefcase text-yellow-500 text-5xl"></i>
                    <h3 class="font-semibold text-gray-900 mt-4">Ahlinya Travel Agent</h3>
                    <p class="text-gray-600 text-sm">Bersama mitra terpercaya, memenuhi kebutuhan traveler</p>
                </div>

                <div
                    class="flex flex-col items-center text-center bg-white p-6 rounded-lg shadow hover:shadow-lg transition duration-300">
                    <i class="fa-solid fa-headset text-purple-500 text-5xl"></i>
                    <h3 class="font-semibold text-gray-900 mt-4">Layanan Pelanggan Yang Ramah</h3>
                    <p class="text-gray-600 text-sm">Layanan pelanggan tersedia 24/7 memberikan bantuan terbaik</p>
                </div>

                <div
                    class="flex flex-col items-center text-center bg-white p-6 rounded-lg shadow hover:shadow-lg transition duration-300">
                    <i class="fa-solid fa-globe text-indigo-500 text-5xl"></i>
                    <h3 class="font-semibold text-gray-900 mt-4">Kenyamanan Booking Secara Lokal</h3>
                    <p class="text-gray-600 text-sm">Pesan dengan pembayaran, mata uang, dan bahasa lokal</p>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-gray-900 text-gray-300 py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <!-- Tentang Kami -->
                <div>
                    <h3 class="text-lg font-semibold text-white">Tentang Kami</h3>
                    <p class="mt-4 text-sm text-gray-400">
                        Kami adalah platform perjalanan terbaik yang memberikan kemudahan dalam pemesanan tiket dan
                        akomodasi dengan harga terbaik.
                    </p>
                </div>

                <!-- Layanan Lain -->
                <div>
                    <h3 class="text-lg font-semibold text-white">Layanan Lain</h3>
                    <ul class="mt-4 space-y-2 text-sm">
                        <li><a href="#" class="hover:text-blue-400">Pemesanan Tiket</a></li>
                        <li><a href="#" class="hover:text-blue-400">Hotel & Akomodasi</a></li>
                        <li><a href="#" class="hover:text-blue-400">Sewa Kendaraan</a></li>
                        <li><a href="#" class="hover:text-blue-400">Paket Wisata</a></li>
                    </ul>
                </div>

                <!-- Hubungi Kami -->
                <div>
                    <h3 class="text-lg font-semibold text-white">Hubungi Kami</h3>
                    <ul class="mt-4 space-y-2 text-sm">
                        <li>
                            <i class="fa-solid fa-envelope text-blue-400"></i>
                            <a href="mailto:info@airpaz.com" class="hover:text-blue-400"> info@airpaz.com</a>
                        </li>
                        <li>
                            <i class="fa-solid fa-phone text-green-400"></i>
                            <a href="tel:+6281234567890" class="hover:text-green-400"> +62 812-3456-7890</a>
                        </li>
                        <li>
                            <i class="fa-solid fa-location-dot text-red-400"></i>
                            <span class="text-gray-400"> Jakarta, Indonesia</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Copyright -->
            <div class="mt-8 text-center border-t border-gray-700 pt-4 text-sm text-gray-500">
                © 2025 Airpaz. All Rights Reserved.
            </div>
        </div>
    </footer>


</body>

</html>