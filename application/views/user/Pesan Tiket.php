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

        </div>
        <div>
            <!-- <span class="mr-4">Hai, Raihan Rpl</span> -->
            <button class="bg-white text-red-600 px-4 py-2 rounded">Logout</button>
        </div>
    </nav>

    <header class="bg-[#135FAB] text-white p-6 text-center" style="background-image: url('<?= base_url('assets/img/download.jpeg') ?>'); 
            background-size: cover; 
            background-position: center;">
        <h2 class="text-2xl font-bold"><?= htmlspecialchars($dari) ?>  (KNO) → <?= htmlspecialchars($ke) ?> (JKTA)</h2>
        <p> <?= htmlspecialchars($tanggal) ?> | <?= htmlspecialchars($penumpang) ?> Penumpang | <?= htmlspecialchars($tipe) ?></p>
        <div class="mt-4">
            <button class="bg-white text-[#135FAB] px-4 py-2 mt-4 rounded">Ubah Pencarian</button>
        </div>
    </header>

    <main class="container mx-auto p-4">
        <div class="grid grid-cols-4 gap-4" x-data="{ tab: 'pesawat' }">

            <aside class="col-span-1 bg-white p-4 rounded shadow">
                <div class="flex space-x-4 border-b-2 border-gray-300 pb-2">
                    <button @click="tab = 'pesawat'"
                        :class="{'border-b-2 border-blue-500 font-bold': tab === 'pesawat'}"
                        class="px-4 py-2">Pesawat</button>
                    <button @click="tab = 'kereta'" :class="{'border-b-2 border-blue-500 font-bold': tab === 'kereta'}"
                        class="px-4 py-2">Kereta Api</button>
                </div>
                <h3 class="font-bold mb-2">Filter</h3>
                <p class="text-[#135FAB] cursor-pointer">Reset Semua</p>
                <div x-show="tab === 'kereta'">
                    <h4 class="font-semibold mt-2">Pemberhentian</h4>
                    <label class="block"><input type="checkbox"> Langsung</label>
                    <label class="block"><input type="checkbox"> 1 Berhenti</label>
                    <label class="block"><input type="checkbox"> 2+ Pemberhentian</label>
                </div>

                <div x-show="tab === 'pesawat'">
                    <h4 class="font-semibold mt-2">Pemberhentian</h4>
                    <label class="block"><input type="checkbox"> Langsung</label>
                    <label class="block"><input type="checkbox"> 1 Berhenti</label>
                    <label class="block"><input type="checkbox"> 100 Pemberhentian</label>
                </div>
            </aside>

            <section class="col-span-3" x-show="tab === 'kereta'">
                <div class="flex space-x-4 mb-4">
                    <div class="p-4 bg-[#B1D1F1] rounded text-[#135FAB] font-bold">Direkomendasikan Rp 2.444.150</div>
                    <div class="p-4 bg-gray-200 rounded">Termurah Rp 2.444.150</div>
                    <div class="p-4 bg-gray-200 rounded">Tercepat Rp 2.529.650</div>
                </div>
                <div class="bg-white p-4 rounded shadow" x-data="{ open: false }">
                    <!-- card -->
                    <div class="flex justify-between items-center  pb-4">
                        <div>
                            <span class="text-red-500 font-semibold">Ekonomi</span>
                            <h4 class="font-bold">Lion Air</h4>
                            <p>06.00 KNO → 08.20 CGK (PSK) | Langsung</p>
                        </div>
                        <div>
                            <p class="text-[#135FAB] font-bold">Rp 1.222.075</p>
                            <p class="text-gray-500">Jumlah Rp 2.444.150 / Org</p>
                            <button class="bg-[#135FAB] text-white px-4 py-2 rounded w-full" @click="open = !open"
                                x-text="open ? 'Close' : 'Pilih'">
                            </button>
                        </div>
                    </div>

                    <!-- Detail (agar muncul di bawah) -->
                    <div x-show="open" x-cloak x-transition.opacity.duration.300ms class="w-full bg-blue-100 p-4 mt-2">
                        <div class="bg-white border border-[#135FAB] rounded-lg p-4 w-80 shadow-md">
                            <div class="flex items-center text-[#135FAB]">
                                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M21 16v1h-2v-1h2m-2-2h2v1h-2v-1M6 15h3.86L14 18v-2.5c1.58-.8 2.68-2.2 3.15-3.95l1.07-5.35c.14-.69-.1-1.42-.61-1.93C17.1 4.05 16.58 3.83 16 3.83c-.12 0-.24 0-.35.03l-3.36.72c-.68.15-1.28.53-1.72 1.07L4 13v1h2v-1l3-3 1 4H6v2m9-9.86l1.5-.32-.76 3.84c-.17.86-.67 1.6-1.36 2.07l-.61.42-.77-3.91 2-2.1z" />
                                </svg>
                                <h2 class="font-bold text-lg">Basic</h2>
                            </div>
                            <p class="text-gray-500 text-sm">Ekonomi: KNO to HLP</p>
                            <p class="text-[#135FAB] text-xl font-bold">Rp 1.122.517</p>
                            <p class="text-gray-500 text-sm">Jumlah Rp 2.245.033 / Org</p>
                            <div class="mt-2">
                                <h3 class="font-semibold">Bagasi</h3>
                                <p class="text-gray-700">&#128187; Bagasi Kabin 7kg</p>
                                <p class="text-gray-700">&#128187; Bagasi Terdaftar 15kg</p>
                            </div>
                            <div class="mt-2">
                                <h3 class="font-semibold">Fleksibilitas</h3>
                                <p class="text-green-600">✔ Bisa Refund</p>
                                <p class="text-green-600">✔ Reschedulable</p>
                            </div>
                            <button @click="open = !open" class="text-[#135FAB] font-semibold mt-2">Lihat Detail
                                ></button>
                            <div x-show="open" x-cloak x-transition.opacity.duration.300ms
                                class="w-full bg-blue-100 p-4 mt-2">
                                <p>Detail tambahan mengenai penerbangan...</p>
                            </div>
                            <button class="bg-[#135FAB] text-white w-full mt-4 py-2 rounded-lg">Booking</button>
                        </div>
                    </div>
                </div>

            </section>

            <section class="col-span-3" x-show="tab === 'pesawat'">
                <div class="flex space-x-4 mb-4">
                    <div class="p-4 bg-[#B1D1F1] rounded text-[#135FAB] font-bold">Direkomendasikan Rp 2.444.150</div>
                    <div class="p-4 bg-gray-200 rounded">Termurah Rp 2.444.150</div>
                    <div class="p-4 bg-gray-200 rounded">Tercepat Rp 2.529.650</div>
                </div>
                <div class="bg-white p-4 rounded shadow" x-data="{ open: false }">
                    <!-- card -->
                    <div class="flex justify-between items-center pb-4">
                        <div>
                            <span class="text-red-500 font-semibold">Ekonomi</span>
                            <h4 class="font-bold">Lion Air</h4>
                            <p>06.00 KNO → 08.20 CGK (LPK) | Langsung</p>
                        </div>
                        <div>
                            <p class="text-[#135FAB] font-bold">Rp 1.222.075</p>
                            <p class="text-gray-500">Jumlah Rp 2.444.150 / Org</p>
                            <button class="bg-[#135FAB] text-white px-4 py-2 rounded w-full" @click="open = !open"
                                x-text="open ? 'Close' : 'Pilih'">
                            </button>
                        </div>
                    </div>
                    <!-- Detail (agar muncul di bawah) -->
                    <div x-show="open" x-cloak x-transition.opacity.duration.300ms class="w-full bg-blue-100 p-4 mt-2">
                        <div class="bg-white border border-[#135FAB] rounded-lg p-4 w-80 shadow-md">
                            <div class="flex items-center text-[#135FAB]">
                                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M21 16v1h-2v-1h2m-2-2h2v1h-2v-1M6 15h3.86L14 18v-2.5c1.58-.8 2.68-2.2 3.15-3.95l1.07-5.35c.14-.69-.1-1.42-.61-1.93C17.1 4.05 16.58 3.83 16 3.83c-.12 0-.24 0-.35.03l-3.36.72c-.68.15-1.28.53-1.72 1.07L4 13v1h2v-1l3-3 1 4H6v2m9-9.86l1.5-.32-.76 3.84c-.17.86-.67 1.6-1.36 2.07l-.61.42-.77-3.91 2-2.1z" />
                                </svg>
                                <h2 class="font-bold text-lg">Basic</h2>
                            </div>
                            <p class="text-gray-500 text-sm">Ekonomi: KNO to HLP</p>
                            <p class="text-[#135FAB] text-xl font-bold">Rp 1.122.517</p>
                            <p class="text-gray-500 text-sm">Jumlah Rp 2.245.033 / Org</p>
                            <div class="mt-2">
                                <h3 class="font-semibold">Bagasi</h3>
                                <p class="text-gray-700">&#128187; Bagasi Kabin 7kg</p>
                                <p class="text-gray-700">&#128187; Bagasi Terdaftar 15kg</p>
                            </div>
                            <div class="mt-2">
                                <h3 class="font-semibold">Fleksibilitas</h3>
                                <p class="text-green-600">✔ Bisa Refund</p>
                                <p class="text-green-600">✔ Reschedulable</p>
                            </div>
                            <button @click="open = !open" class="text-[#135FAB] font-semibold mt-2">Lihat Detail
                                ></button>
                            <div x-show="open" x-cloak x-transition.opacity.duration.300ms
                                class="w-full bg-blue-100 p-4 mt-2">
                                <p>Detail tambahan mengenai penerbangan...</p>
                            </div>
                            <button class="bg-[#135FAB] text-white w-full mt-4 py-2 rounded-lg">Booking</button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>


    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</body>

</html>