<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ringkasan Perjalanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-[#135FAB] p-4 text-white flex justify-between items-center">
        <a href="<?= base_url() ?>" class="text-xl font-bold">E-cussyuuk</a>
        <div class="space-x-6">
            <a href="<?= base_url('PesanTiket') ?>" class="hover:underline">Pesan Tiket</a>
            <a href="<?= base_url('HistoryTiket') ?>" class="hover:underline">Riwayat Pemesanan</a>
            <a href="<?= base_url('chekout') ?>" class="hover:underline">Keranjang</a>
        </div>
        <button class="bg-white text-red-600 px-4 py-2 rounded font-semibold hover:bg-red-100 transition">Logout</button>
    </nav>

    <!-- Kontainer Utama -->
    <div class="max-w-4xl mx-auto bg-white p-6 mt-10 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Ringkasan Perjalanan</h2>
        <?php $total_harga = 0; ?>
        <?php if (!empty($checkout_data) && is_array($checkout_data)) : ?>
            <?php foreach ($checkout_data as $r) : ?>
                <div class="bg-gray-50 p-5 rounded-lg mb-4 shadow-sm">
                    <h3 class="font-semibold text-lg text-gray-700">🛫 <?= htmlspecialchars($r['rute_awal']); ?> → <?= htmlspecialchars($r['rute_ahir']); ?> | <?= htmlspecialchars($r['tujuan']); ?></h3>
                    <h3 class="font-semibold text-lg text-blue-700">KODE: <?= htmlspecialchars($r['kode']); ?></h3>
                    <p class="text-sm text-gray-500 mt-1">Transportasi: <span class="font-medium"> <?= htmlspecialchars($r['nama_type']); ?></span> | Type: <span class="font-medium">#<?= htmlspecialchars($r['keterangan']); ?></span></p>

                    <!-- Input Kuantitas -->
                    <input type="number" name="qty" value="<?= $r['qty']; ?>" min="1"
                            class="qty-input w-16 text-center border border-gray-300 rounded-md px-2 py-1"
                            data-id="<?= $r['id_rute']; ?>">


                    <p class="text-xl font-bold text-[#135FAB] mt-2">Rp <?= number_format($r['harga'] * $r['qty'], 0, ',', '.'); ?> (<?= $r['qty']; ?> Tiket)</p>
                    <a href="<?= base_url('chekout/remove/' . $r['id_rute']); ?>" class="mt-3 inline-block px-4 py-2 text-sm font-semibold text-red-500 border border-red-500 rounded-lg hover:bg-red-50 transition">Hapus</a>
                </div>
            <?php endforeach; ?>

            <!-- Rincian Harga -->
            <div class="bg-white p-5 rounded-lg shadow-md mt-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Rincian Harga</h3>
                <?php $total_harga = 0; ?>
                <?php foreach ($checkout_data as $r) : ?>
                    <div class="flex justify-between text-lg text-gray-700 py-2 border-b">
                        <p><?= htmlspecialchars($r['tujuan']); ?> (<?= htmlspecialchars($r['rute_awal']); ?> → <?= htmlspecialchars($r['rute_ahir']); ?>) x <?= $r['qty']; ?></p>
                        <p>Rp <?= number_format($r['harga'] * $r['qty'], 0, ',', '.'); ?></p>
                    </div>
                    <?php $total_harga += $r['harga'] * $r['qty']; ?>
                <?php endforeach; ?>
                
                <div class="flex justify-between font-bold text-xl text-gray-900 mt-4">
                    <p>Total</p>
                    <p>Rp <?= number_format($total_harga, 0, ',', '.'); ?></p>
                </div>

                <!-- Form Checkout -->
                

                <button type="button" id="openModal" class="mt-6 w-full bg-[#FF4D4D] text-white py-3 rounded-lg text-lg font-semibold hover:bg-red-600 transition">Checkout</button>

            </div>
        <?php else : ?>
            <p class="text-gray-500 text-center py-10">🚀 Belum ada perjalanan yang dipilih.</p>
        <?php endif; ?>
    </div>

    

  <!-- Modal Checkout -->
<div id="checkoutModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h3 class="text-xl font-semibold text-gray-800 mb-4 text-center">Konfirmasi Checkout</h3>

        <form action="<?= base_url('chekout/process_checkout') ?>" method="POST">
            <!-- Data Hidden -->
            <input type="hidden" name="kode_pemesanan" value="<?= strtoupper(substr(md5(uniqid()), 0, 8)) ?>">
            <input type="hidden" name="id_pelanggan" value="<?= $this->session->userdata('id_pelanggan'); ?>">
            <input type="hidden" name="id_rute" value="<?= !empty($checkout_data) ? implode(',', array_keys($checkout_data)) : '' ?>">
            <input type="hidden" name="kode_kursi" value="<?= chr(rand(65, 70)) . rand(1, 10) ?>">
            <input type="hidden" name="status" value="Tertunda">

            <!-- Tanggal & Waktu -->
            <div class="space-y-3">
                <div>
                    <label class="block text-gray-700 font-medium">Tanggal Berangkat</label>
                    <input type="date" name="tanggal_berangkat" required class="w-full border p-2 rounded-md">
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-gray-700 font-medium">Jam Berangkat</label>
                        <select name="jam_berangkat" id="jamBerangkat" required class="w-full border p-2 rounded-md">
                            <option value="06:00">06:00</option>
                            <option value="09:00">09:00</option>
                            <option value="12:00">12:00</option>
                            <option value="15:00">15:00</option>
                            <option value="18:00">18:00</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium">Jam Cekin</label>
                        <input type="text" name="jam_cekin" id="jamCekin" readonly class="w-full border p-2 rounded-md bg-gray-100">
                    </div>
                </div>

               <div>
                    <label class="block text-gray-700 font-medium">Total Bayar (Rp)</label>
                    <input type="text" name="total_bayar" value="Rp <?= number_format($total_harga ?? 0, 0, ',', '.') ?>" readonly 
                        class="w-full border p-2 rounded-md bg-gray-100">
                </div>

            </div>

            <!-- Tombol Checkout -->
            <div class="flex justify-end space-x-4 mt-5">
                <button type="button" id="cancelCheckout" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition">
                    Batal
                </button>
                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition">
                    Checkout
                </button>
            </div>
        </form>
    </div>
</div>





    <script>
document.addEventListener("DOMContentLoaded", function() {
    // Ambil semua input qty
    document.querySelectorAll(".qty-input").forEach(input => {
        input.addEventListener("change", function() {
            let idRute = this.dataset.id;  // Ambil ID rute dari atribut data-id
            let newQty = this.value;  // Ambil jumlah tiket baru

            if (newQty < 1) {
                alert("Jumlah tiket tidak boleh kurang dari 1!");
                this.value = 1;
                return;
            }

            // Kirim data ke server dengan Fetch API
            fetch(`<?= base_url('chekout/update_quantity/') ?>${idRute}`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: `qty=${newQty}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload(); // Refresh halaman untuk update total harga
                } else {
                    alert("Gagal mengupdate jumlah tiket!");
                }
            })
            .catch(error => console.error("Error:", error));
        });
    });
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const modal = document.getElementById("checkoutModal");
    const openModalBtn = document.getElementById("openModal");
    const cancelCheckoutBtn = document.getElementById("cancelCheckout");
    const jamBerangkat = document.getElementById("jamBerangkat");
    const jamCekin = document.getElementById("jamCekin");

    // Buka modal saat tombol checkout ditekan
    openModalBtn.addEventListener("click", function() {
        modal.classList.remove("hidden");
    });

    // Tutup modal saat tombol batal ditekan
    cancelCheckoutBtn.addEventListener("click", function() {
        modal.classList.add("hidden");
    });

    // Otomatis hitung jam cekin (jam berangkat - 1 jam)
    jamBerangkat.addEventListener("change", function() {
        let jam = parseInt(this.value.split(":")[0]); // Ambil jam dari value
        let menit = this.value.split(":")[1]; // Ambil menit
        let jamCekinBaru = (jam - 1 < 0 ? 23 : jam - 1) + ":" + menit; // Kurangi 1 jam
        jamCekin.value = jamCekinBaru;
    });

    // Trigger perubahan pertama kali
    jamBerangkat.dispatchEvent(new Event("change"));
});
</script>

</body>
</html>
