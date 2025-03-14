<?php
$tipe = filter_input(INPUT_GET, 'tipe', FILTER_SANITIZE_STRING) ?? 'Tidak dipilih';
$dari = filter_input(INPUT_GET, 'dari', FILTER_SANITIZE_STRING) ?? 'Tidak ada';
$ke = filter_input(INPUT_GET, 'ke', FILTER_SANITIZE_STRING) ?? 'Tidak ada';
$tanggal = filter_input(INPUT_GET, 'tanggal', FILTER_SANITIZE_STRING) ?? 'Tidak ada';
$penumpang = filter_input(INPUT_GET, 'penumpang', FILTER_SANITIZE_STRING) ?? 'Tidak ada';

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Pesawat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="">
    <nav class=" p-4 text-white flex justify-between items-center" style="color: #135FAB;">
        <a href="<?= base_url() ?>" class="text-xl font-bold">E-cussyuuk</a>
        <div class="space-x-6 text-[#135FAB]">
            <a href="<?= base_url("PesanTiket") ?>"
                class="relative after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-[#135FAB] after:transition-all after:duration-300 hover:after:w-full">
                Pesan Tiket
            </a>
            <a href="<?= base_url("HistoryTiket") ?>"
                class="relative after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-[#135FAB] after:transition-all after:duration-300 hover:after:w-full">
                Riwayat Pemesanan
            </a>
            <a href="<?= base_url() ?>chekout"
                class="relative after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-[#135FAB] after:transition-all after:duration-300 hover:after:w-full">
                Keranjang
            </a>

        </div>
        <div>
            <!-- <span class="mr-4">Hai, Raihan Rpl</span> -->
            <button class="bg-white text-red-600 px-4 py-2 rounded">Logout</button>
        </div>
    </nav>

    <header class="bg-[#135FAB] text-white p-6 text-center" style="background-image: url('<?= base_url('assets/img/download.jpeg') ?>'); 
            background-size: cover; 
            background-position: center;">
        <h2 class="text-2xl font-bold">
            <?= htmlspecialchars($this->session->userdata('rute_awal') ?? 'Tidak memilih') ?>
            →
            <?= htmlspecialchars($this->session->userdata('rute_ahir') ?? 'Tidak memilih') ?>
        </h2>
        <div class="mt-4">
            <a href="<?= base_url('') ?>" class="bg-white text-[#135FAB] px-4 py-2 mt-4 rounded">Ubah Pencarian</a>
        </div>
    </header>


    <main class="container mx-auto p-4">
        <div class="w-full" x-data="{ tab: 'kereta' }">

            <!-- Tab Transportasi (Full Width) -->
            <div class="flex space-x-4 border-b-2 border-gray-300 pb-2 w-full ">
                <button @click="tab = 'pesawat'" :class="{'border-b-2 border-blue-500 font-bold': tab === 'pesawat'}"
                    class="px-4 py-2">Pesawat</button>
                <button @click="tab = 'kereta'" :class="{'border-b-2 border-blue-500 font-bold': tab === 'kereta'}"
                    class="px-4 py-2">Kereta Api</button>
                    <button onclick="resetSession()">Reset Pencarian</button>
            </div>

            <!-- <?php foreach ($rute as $r): ?>
            <tr>
                <td><?= $r['tujuan']; ?></td>
                <td><?= $r['rute_awal']; ?></td>
                <td><?= $r['rute_ahir']; ?></td>
                <td><?= $r['harga']; ?></td>
                <td><?= $r['kode']; ?></td>
                <td><?= $r['jumlah_kursi']; ?></td>
                <td><?= $r['nama_type']; ?></td>
            </tr>
            <?php endforeach; ?> -->

            <div class="w-full mt-4">
                <?php if ($this->session->userdata('rute_awal') && $this->session->userdata('rute_akhir')): ?>
                    <section class="col-span-3" x-show="tab === 'kereta'">
                        <div x-data="{ open: {} }">
                            <?php foreach ($rute as $r): ?>
                                <?php if ($r['nama_type'] == 'Kereta'): ?>
                                    <div class="bg-white p-4 rounded shadow">
                                        <!-- Card -->
                                        <div class="flex justify-between items-center pb-4">
                                            <div>
                                                <span class="text-red-500 font-semibold"><?= $r['keterangan'] ?></span>
                                                <h4 class="font-bold"><?= $r['kode']; ?></h4>
                                                <p><?= $r['rute_awal']; ?> → <?= $r['rute_ahir']; ?> | <?= $r['tujuan']; ?></p>
                                            </div>
                                            <div>
                                                <p class="text-[#135FAB] font-bold">Rp.
                                                    <?= number_format($r['harga'], 0, ',', '.'); ?></p>
                                                <button class="bg-[#135FAB] text-white px-4 py-2 rounded w-full"
                                                    @click="open[<?= $r['id_rute']; ?>] = !open[<?= $r['id_rute']; ?>]"
                                                    x-text="open[<?= $r['id_rute']; ?>] ? 'Close' : 'Pilih'">
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Detail -->
                                        <div x-show="open[<?= $r['id_rute']; ?>]" x-cloak x-transition.opacity.duration.300ms
                                            class="w-full bg-blue-100 p-4 mt-2">
                                            <div class="bg-white border border-[#135FAB] rounded-lg p-4 w-80 shadow-md">
                                                <div class="flex items-center text-[#135FAB]">
                                                    <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                                        <path
                                                            d="M21 16v1h-2v-1h2m-2-2h2v1h-2v-1M6 15h3.86L14 18v-2.5c1.58-.8 2.68-2.2 3.15-3.95l1.07-5.35c.14-.69-.1-1.42-.61-1.93C17.1 4.05 16.58 3.83 16 3.83c-.12 0-.24 0-.35.03l-3.36.72c-.68.15-1.28.53-1.72 1.07L4 13v1h2v-1l3-3 1 4H6v2m9-9.86l1.5-.32-.76 3.84c-.17.86-.67 1.6-1.36 2.07l-.61.42-.77-3.91 2-2.1z" />
                                                    </svg>
                                                    <h2 class="font-bold text-lg"><?= $r['kode']; ?></h2>
                                                </div>
                                                <p class="text-[#135FAB] text-xl font-bold">Rp.
                                                    <?= number_format($r['harga'], 0, ',', '.'); ?></p>
                                                <p class="text-gray-500 text-sm"><?= $r['jumlah_kursi']; ?> Kursi</p>
                                                <div class="mt-2">
                                                    <h3 class="font-semibold">Rute & tujuan</h3>
                                                    <p class="text-gray-700"><?= $r['rute_awal']; ?> → <?= $r['rute_ahir']; ?></p>
                                                    <p class="text-gray-700"> Tujuan : <?= $r['tujuan']; ?></p>
                                                </div>
                                                <div class="mt-2">
                                                    <h3 class="font-semibold">Transportasi</h3>
                                                    <p class="text-green-600"><?= $r['nama_type']; ?></p>
                                                    <p class="text-green-600"><?= $r['keterangan']; ?></p>
                                                </div>
                                                    ></button>
                                                <button class="bg-[#135FAB] text-white w-full mt-4 py-2 rounded-lg">Booking</button>
                                            </div>
                                        </div>
                                    </div>
                      
                                    <button class="text-[#135FAB] font-semibold mt-2">Lihat Detail ></button>
                                    
                                    <a href="<?= base_url('chekout/add/' . $r['id_rute']); ?>" 
                                        class="bg-[#135FAB] text-white w-full mt-4 py-2 rounded-lg block text-center">
                                        Booking
                                     </a>
                                </div>
                            </div>
      
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>

                    </section>

                    <section class="col-span-3" x-show="tab === 'pesawat'">
                        <div x-data="{ open: {} }"> <!-- Hanya satu x-data di sini -->
                            <?php foreach ($rute as $r): ?>
                                <?php if ($r['nama_type'] == 'Pesawat'): ?>
                                    <div class="bg-white p-4 rounded shadow">
                                        <!-- Card -->
                                        <div class="flex justify-between items-center pb-4">
                                            <div>
                                                <span class="text-red-500 font-semibold"><?= $r['keterangan']; ?></span>
                                                <h4 class="font-bold"><?= $r['kode']; ?></h4>
                                                <p><?= $r['rute_awal']; ?> → <?= $r['rute_ahir']; ?> | <?= $r['tujuan']; ?></p>
                                            </div>
                                            <div>
                                                <p class="text-[#135FAB] font-bold">Rp.
                                                    <?= number_format($r['harga'], 0, ',', '.'); ?></p>
                                                <button class="bg-[#135FAB] text-white px-4 py-2 rounded w-full"
                                                    @click="open[<?= $r['id_rute']; ?>] = !open[<?= $r['id_rute']; ?>]"
                                                    x-text="open[<?= $r['id_rute']; ?>] ? 'Close' : 'Pilih'">
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Detail -->
                                        <div x-show="open[<?= $r['id_rute']; ?>]" x-cloak x-transition.opacity.duration.300ms
                                            class="w-full bg-blue-100 p-4 mt-2">
                                            <div class="bg-white border border-[#135FAB] rounded-lg p-4 w-80 shadow-md">
                                                <div class="flex items-center text-[#135FAB]">
                                                    <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                                        <path
                                                            d="M21 16v1h-2v-1h2m-2-2h2v1h-2v-1M6 15h3.86L14 18v-2.5c1.58-.8 2.68-2.2 3.15-3.95l1.07-5.35c.14-.69-.1-1.42-.61-1.93C17.1 4.05 16.58 3.83 16 3.83c-.12 0-.24 0-.35.03l-3.36.72c-.68.15-1.28.53-1.72 1.07L4 13v1h2v-1l3-3 1 4H6v2m9-9.86l1.5-.32-.76 3.84c-.17.86-.67 1.6-1.36 2.07l-.61.42-.77-3.91 2-2.1z" />
                                                    </svg>
                                                    <h2 class="font-bold text-lg"><?= $r['kode']; ?></h2>
                                                </div>
                                                <p class="text-[#135FAB] text-xl font-bold">Rp.
                                                    <?= number_format($r['harga'], 0, ',', '.'); ?></p>
                                                <p class="text-gray-500 text-sm"><?= $r['jumlah_kursi']; ?> Kursi</p>
                                                <div class="mt-2">
                                                    <h3 class="font-semibold">Rute & Tujuan</h3>
                                                    <p class="text-gray-700"><?= $r['rute_awal']; ?> → <?= $r['rute_ahir']; ?></p>
                                                    <p class="text-gray-700">Tujuan: <?= $r['tujuan']; ?></p>
                                                </div>
                                                <div class="mt-2">
                                                    <h3 class="font-semibold">Transportasi</h3>
                                                    <p class="text-green-600"><?= $r['nama_type']; ?></p>
                                                    <p class="text-green-600"><?= $r['keterangan']; ?></p>
                                                </div>
                                                <button class="bg-[#135FAB] text-white w-full mt-4 py-2 rounded-lg">Booking</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php else: ?>
                    <section class="col-span-3" x-show="tab === 'kereta'">
                        <div x-data="{ open: {} }">
                            <?php foreach ($rute as $r): ?>
                                <?php if ($r['nama_type'] == 'Kereta'): ?>
                                    <div class="bg-white p-4 rounded shadow">
                                        <!-- Card -->
                                        <div class="flex justify-between items-center pb-4">
                                            <div>
                                                <span class="text-red-500 font-semibold"><?= $r['keterangan']; ?></span>
                                                <h4 class="font-bold"><?= $r['kode']; ?></h4>
                                                <p><?= $r['rute_awal']; ?> → <?= $r['rute_ahir']; ?> | <?= $r['tujuan']; ?></p>
                                            </div>
                                            <div>
                                                <p class="text-[#135FAB] font-bold">Rp.
                                                    <?= number_format($r['harga'], 0, ',', '.'); ?></p>
                                                <button class="bg-[#135FAB] text-white px-4 py-2 rounded w-full"
                                                    @click="open[<?= $r['id_rute']; ?>] = !open[<?= $r['id_rute']; ?>]"
                                                    x-text="open[<?= $r['id_rute']; ?>] ? 'Close' : 'Pilih'">
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Detail -->
                                        <div x-show="open[<?= $r['id_rute']; ?>]" x-cloak x-transition.opacity.duration.300ms
                                            class="w-full bg-blue-100 p-4 mt-2">
                                            <div class="bg-white border border-[#135FAB] rounded-lg p-4 w-80 shadow-md">
                                                <div class="flex items-center text-[#135FAB]">
                                                    <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                                        <path
                                                            d="M21 16v1h-2v-1h2m-2-2h2v1h-2v-1M6 15h3.86L14 18v-2.5c1.58-.8 2.68-2.2 3.15-3.95l1.07-5.35c.14-.69-.1-1.42-.61-1.93C17.1 4.05 16.58 3.83 16 3.83c-.12 0-.24 0-.35.03l-3.36.72c-.68.15-1.28.53-1.72 1.07L4 13v1h2v-1l3-3 1 4H6v2m9-9.86l1.5-.32-.76 3.84c-.17.86-.67 1.6-1.36 2.07l-.61.42-.77-3.91 2-2.1z" />
                                                    </svg>
                                                    <h2 class="font-bold text-lg"><?= $r['kode']; ?></h2>
                                                </div>
                                                <p class="text-[#135FAB] text-xl font-bold">Rp.
                                                    <?= number_format($r['harga'], 0, ',', '.'); ?></p>
                                                <p class="text-gray-500 text-sm"><?= $r['jumlah_kursi']; ?> Kursi</p>
                                                <div class="mt-2">
                                                    <h3 class="font-semibold">Rute & tujuan</h3>
                                                    <p class="text-gray-700"><?= $r['rute_awal']; ?> → <?= $r['rute_ahir']; ?></p>
                                                    <p class="text-gray-700"> Tujuan : <?= $r['tujuan']; ?></p>
                                                </div>
                                                <div class="mt-2">
                                                    <h3 class="font-semibold">Transportasi</h3>
                                                    <p class="text-green-600"><?= $r['nama_type']; ?></p>
                                                    <p class="text-green-600"><?= $r['keterangan']; ?></p>
                                                </div>
                                                    ></button>
                                                <button class="bg-[#135FAB] text-white w-full mt-4 py-2 rounded-lg">Booking</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>

                    </section>

                    <section class="col-span-3" x-show="tab === 'pesawat'">
                        <div x-data="{ open: {} }"> <!-- Hanya satu x-data di sini -->
                            <?php foreach ($rute as $r): ?>
                                <?php if ($r['nama_type'] == 'Pesawat'): ?>
                                    <div class="bg-white p-4 rounded shadow">
                                        <!-- Card -->
                                        <div class="flex justify-between items-center pb-4">
                                            <div>
                                                <span class="text-red-500 font-semibold"><?= $r['keterangan']; ?></span>
                                                <h4 class="font-bold"><?= $r['kode']; ?></h4>
                                                <p><?= $r['rute_awal']; ?> → <?= $r['rute_ahir']; ?> | <?= $r['tujuan']; ?></p>
                                            </div>
                                            <div>
                                                <p class="text-[#135FAB] font-bold">Rp.
                                                    <?= number_format($r['harga'], 0, ',', '.'); ?></p>
                                                <button class="bg-[#135FAB] text-white px-4 py-2 rounded w-full"
                                                    @click="open[<?= $r['id_rute']; ?>] = !open[<?= $r['id_rute']; ?>]"
                                                    x-text="open[<?= $r['id_rute']; ?>] ? 'Close' : 'Pilih'">
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Detail -->
                                        <div x-show="open[<?= $r['id_rute']; ?>]" x-cloak x-transition.opacity.duration.300ms
                                            class="w-full bg-blue-100 p-4 mt-2">
                                            <div class="bg-white border border-[#135FAB] rounded-lg p-4 w-80 shadow-md">
                                                <div class="flex items-center text-[#135FAB]">
                                                    <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                                        <path
                                                            d="M21 16v1h-2v-1h2m-2-2h2v1h-2v-1M6 15h3.86L14 18v-2.5c1.58-.8 2.68-2.2 3.15-3.95l1.07-5.35c.14-.69-.1-1.42-.61-1.93C17.1 4.05 16.58 3.83 16 3.83c-.12 0-.24 0-.35.03l-3.36.72c-.68.15-1.28.53-1.72 1.07L4 13v1h2v-1l3-3 1 4H6v2m9-9.86l1.5-.32-.76 3.84c-.17.86-.67 1.6-1.36 2.07l-.61.42-.77-3.91 2-2.1z" />
                                                    </svg>
                                                    <h2 class="font-bold text-lg"><?= $r['kode']; ?></h2>
                                                </div>
                                                <p class="text-[#135FAB] text-xl font-bold">Rp.
                                                    <?= number_format($r['harga'], 0, ',', '.'); ?></p>
                                                <p class="text-gray-500 text-sm"><?= $r['jumlah_kursi']; ?> Kursi</p>
                                                <div class="mt-2">
                                                    <h3 class="font-semibold">Rute & Tujuan</h3>
                                                    <p class="text-gray-700"><?= $r['rute_awal']; ?> → <?= $r['rute_ahir']; ?></p>
                                                    <p class="text-gray-700">Tujuan: <?= $r['tujuan']; ?></p>
                                                </div>
                                                <div class="mt-2">
                                                    <h3 class="font-semibold">Transportasi</h3>
                                                    <p class="text-green-600"><?= $r['nama_type']; ?></p>
                                                    <p class="text-green-600"><?= $r['keterangan']; ?></p>
                                                </div>
                                                <button class="bg-[#135FAB] text-white w-full mt-4 py-2 rounded-lg">Booking</button>
                                            </div>
                                        </div>

                                        <button class="text-[#135FAB] font-semibold mt-2">Lihat Detail ></button>

                                        <a href="<?= base_url('chekout/add/' . $r['id_rute']); ?>" 
                                        class="bg-[#135FAB] text-white w-full mt-4 py-2 rounded-lg block text-center">
                                            Booking
                                        </a>

                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </section>

                <?php endif; ?>

            </div>
        </div>
    </main>


    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</body>
<script>
function resetSession() {
    if (confirm("Apakah Anda yakin ingin mereset pencarian?")) {
        window.location.href = "<?= base_url('PesanTiket/reset_session') ?>";
    }
}
</script>
</html>