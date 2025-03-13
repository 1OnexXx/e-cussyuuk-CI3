<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Tambah Petugas</h3>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('admin/Petugas_Controller/add') ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_petugas">Nama Petugas</label>
                                <input type="text" name="nama_petugas" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="id_level">Level</label>
                                <select name="id_level" class="form-control" required>
                                    <option value="">Pilih Level</option>
                                    <?php foreach ($level as $lv): ?>
                                        <option value="<?= $lv['id_level'] ?>"><?= $lv['nama_level'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto Petugas</label>
                                <input type="file" name="foto" class="form-control" required accept="image/*">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                            <a href="<?= base_url('admin/Petugas_Controller') ?>" class="btn btn-secondary mt-3">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
