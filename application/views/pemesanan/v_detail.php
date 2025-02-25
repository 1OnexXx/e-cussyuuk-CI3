<div class="container">
    <div class="container-fluid mt-4">
        <div class="card shadow-lg">
              <div class="card-header text-end">
                <a href="<?= base_url('pemesanan/cetak/'.$detail['id_pemesanan']); ?>" class="btn btn-success"><i class="fa fa-print"></i></a>
            </div>
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Detail Transaksi Tiket</h4>
                <a href="<?php echo base_url('/pemesanan_controller/tiket/'.$detail['id_pemesanan']); ?>" class="btn btn-warning fs-6">
                    <i class="fas fa-eye"></i> Lihat tiket
                </a>

            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Informasi Pemesanan -->
                    <div class="col-md-6">
                        <h5 class="text-primary">Informasi Pemesanan</h5>
                        <table class="table table-bordered">
                            <tr><td><strong>Kode Pemesanan</strong></td><td><?= $detail['kode_pemesanan']; ?></td></tr>
                            <tr><td><strong>Tanggal Pemesanan</strong></td><td><?= $detail['tanggal_pemesanan']; ?></td></tr>
                            <tr><td><strong>Nama Penumpang</strong></td><td><?= $detail['nama_penumpang']; ?></td></tr>
                            <tr><td><strong>Telepon</strong></td><td><?= $detail['telepon']; ?></td></tr>
                        </table>
                    </div>

                    <!-- Informasi Penumpang -->
                    <div class="col-md-6">
                        <h5 class="text-primary">Informasi Penumpang</h5>
                        <table class="table table-bordered">
                            <tr><td><strong>Alamat</strong></td><td><?= $detail['alamat_penumpang']; ?></td></tr>
                            <tr><td><strong>Tanggal Lahir</strong></td><td><?= $detail['tanggal_lahir']; ?></td></tr>
                            <tr><td><strong>Jenis Kelamin</strong></td><td><?= $detail['jenis_kelamin']; ?></td></tr>
                        </table>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <!-- Informasi Perjalanan -->
                    <div class="col-md-6">
                        <h5 class="text-primary">Detail Perjalanan</h5>
                        <table class="table table-bordered">
                            <tr><td><strong>Tujuan</strong></td><td><?= $detail['tujuan']; ?></td></tr>
                            <tr><td><strong>Rute</strong></td><td><?= $detail['rute_awal']; ?> → <?= $detail['rute_ahir']; ?></td></tr>
                            <tr><td><strong>Tanggal Berangkat</strong></td><td><?= $detail['tanggal_berangkat']; ?></td></tr>
                            <tr><td><strong>Jam Cekin</strong></td><td><?= $detail['jam_cekin']; ?></td></tr>
                            <tr><td><strong>Jam Berangkat</strong></td><td><?= $detail['jam_berangkat']; ?></td></tr>
                        </table>
                    </div>

                    <!-- Informasi Transportasi -->
                    <div class="col-md-6">
                        <h5 class="text-primary">Detail Transportasi</h5>
                        <table class="table table-bordered">
                            <tr><td><strong>Kode Transportasi</strong></td><td><?= $detail['kode_transportasi']; ?></td></tr>
                            <tr><td><strong>Jenis Transportasi</strong></td><td><?= $detail['nama_type']; ?></td></tr>
                            <tr><td><strong>Jumlah Kursi</strong></td><td><?= $detail['jumlah_kursi']; ?> Kursi</td></tr>
                            <tr><td><strong>Keterangan</strong></td><td><?= $detail['keterangan_transportasi']; ?></td></tr>
                        </table>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <!-- Informasi Petugas -->
                    <div class="col-md-6">
                        <h5 class="text-primary">Petugas</h5>
                        <table class="table table-bordered">
                            <tr><td><strong>Nama Petugas</strong></td><td><?= $detail['nama_petugas']; ?></td></tr>
                            <tr><td><strong>Level</strong></td><td><?= $detail['nama_level']; ?></td></tr>
                        </table>
                    </div>

                    <!-- Informasi Pembayaran -->
                    <div class="col-md-6">
                        <h5 class="text-primary">Detail Pembayaran</h5>
                        <table class="table table-bordered">
                            <tr><td><strong>Harga Tiket</strong></td><td>Rp <?= number_format($detail['harga']); ?></td></tr>
                            <tr><td><strong>Total Bayar</strong></td><td><h4 class="text-danger fw-bold">Rp <?= number_format($detail['total_bayar']); ?></h4></td></tr>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Tombol Aksi -->
          
        </div>
    </div>
</div>