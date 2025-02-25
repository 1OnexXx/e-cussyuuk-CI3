<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Daftar Petugas</h3>
            <a href="<?= base_url('Petugas_Controller/add') ?>" class="btn btn-primary">+ Tambah Petugas</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Username</th>
                                    <th>Nama Petugas</th>
                                    <th>Level</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($petugas as $p) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td>
                                            <img src="<?= base_url('uploads/petugas/' . $p['photo_petugas']) ?>" width="50" height="50" style="border-radius: 50%;">
                                        </td>
                                        <td><?= $p['username'] ?></td>
                                        <td><?= $p['nama_petugas'] ?></td>
                                        <td><?= $p['nama_level'] ?></td>
                                        <td>
                                            <a href="<?= base_url('Petugas_Controller/edit/' . $p['id_petugas']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <button class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $p['id_petugas'] ?>)">Hapus</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id) {
        if (confirm("Apakah Anda yakin ingin menghapus petugas ini?")) {
            window.location.href = "<?= base_url('Petugas_Controller/delete/') ?>" + id;
        }
    }
</script>
