<!DOCTYPE html>
<html lang="id">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kaiadmin - Data Rute</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
    <link rel="icon" href="assets/img/kaiadmin/favicon.ico" type="image/x-icon">
    
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- jQuery (Dibutuhkan untuk SweetAlert2 konfirmasi) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Daftar Rute</h2>
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambahRute">
            <i class="fas fa-plus"></i> Tambah Rute
        </button>

        <div class="table-responsive">
            <table id="ruteTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tujuan</th>
                        <th>Rute Awal</th>
                        <th>Rute Akhir</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach ($rute as $r) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $r['tujuan']; ?></td>
                            <td><?= $r['rute_awal']; ?></td>
                            <td><?= $r['rute_ahir']; ?></td>
                            <td>Rp <?= number_format($r['harga'], 0, ',', '.'); ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditRute_<?= $r['id_rute'] ?>">
                                    Edit
                                </button>
                                <button class="btn btn-danger btn-sm btnHapus" data-id="<?= $r['id_rute']; ?>">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah Rute -->
    <div class="modal fade" id="modalTambahRute" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Rute</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="<?= base_url('Rute_Controller/store'); ?>" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="tujuan">Tujuan</label>
                            <input type="text" name="tujuan" id="tujuan" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="rute_awal">Rute Awal</label>
                            <input type="text" name="rute_awal" id="rute_awal" class="form-control" required>
                        </div>
                        <div class="mb-3">
                        <label for="rute_ahir">Rute Akhir</label>
                        <input type="text" name="rute_ahir" id="rute_ahir" class="form-control" required>
 
                        </div>
                        <div class="mb-3">
                            <label for="harga">Harga</label>
                            <input type="number" name="harga" id="harga" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Rute -->
    <?php foreach ($rute as $r) : ?>
        <div class="modal fade" id="modalEditRute_<?= $r['id_rute'] ?>" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Rute</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="<?= base_url('Rute_Controller/update'); ?>" method="post">
                        <input type="hidden" name="id_rute" value="<?= $r['id_rute'] ?>">

                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="tujuan">Tujuan</label>
                                <input type="text" name="tujuan" class="form-control" required value="<?= $r['tujuan'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="rute_awal">Rute Awal</label>
                                <input type="text" name="rute_awal" class="form-control" required value="<?= $r['rute_awal'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="rute_akhir">Rute Akhir</label>
                                <input type="text" name="rute_ahir" class="form-control" required value="<?= $r['rute_ahir'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="harga">Harga</label>
                                <input type="number" name="harga" class="form-control" required value="<?= $r['harga'] ?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <script>
        $(document).ready(function () {
            $(".btnHapus").click(function () {
                var id = $(this).data("id");
                Swal.fire({
                    title: "Hapus Data?",
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Ya, Hapus!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "<?= base_url('Rute_Controller/delete/') ?>" + id;
                    }
                });
            });
        });
    </script>

    <!-- SweetAlert2 Notifikasi -->
    <?php if ($this->session->flashdata('success')) : ?>
        <script>
            Swal.fire("Sukses!", "<?= $this->session->flashdata('success') ?>", "success");
        </script>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')) : ?>
        <script>
            Swal.fire("Gagal!", "<?= $this->session->flashdata('error') ?>", "error");
        </script>
    <?php endif; ?>

</body>
</html>
