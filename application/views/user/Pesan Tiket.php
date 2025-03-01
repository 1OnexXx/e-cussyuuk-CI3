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
            <a href="#"
                class="relative after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-[#135FAB] after:transition-all after:duration-300 hover:after:w-full">
                Atraksi
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
        <h2 class="text-2xl font-bold">Medan (KNO) → Jakarta (JKTA)</h2>
        <p>Kamis, 27 Feb | 1 Penumpang | Ekonomi</p>
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
                            <button class="bg-[#135FAB] text-white px-4 py-2 rounded w-full" @click="open = !open">
                                Pilih
                            </button>
                        </div>
                    </div>

                    <!-- Detail (agar muncul di bawah) -->
                    <div x-show="open" x-cloak x-transition.opacity.duration.300ms class="w-full bg-blue-100 p-4 mt-2">
                        <p>Detail tambahan mengenai penerbangan...</p>
                    </div>
                </div>

            </section>

            <section class="col-span-3" x-show="tab === 'pesawat'">
                <div class="flex space-x-4 mb-4" >
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
                            <button class="bg-[#135FAB] text-white px-4 py-2 rounded w-full" @click="open = !open">
                                Pilih
                            </button>
                        </div>
                    </div>
                    <!-- Detail (agar muncul di bawah) -->
                    <div x-show="open" x-cloak x-transition.opacity.duration.300ms class="w-full bg-blue-100 p-4 mt-2">
                        <p>Detail tambahan mengenai penerbangan...</p>
                    </div>
                </div>
            </section>
        </div>
    </main>


    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</body>

</html>