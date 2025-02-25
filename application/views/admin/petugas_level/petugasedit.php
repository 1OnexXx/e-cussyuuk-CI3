<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Edit Petugas</h3>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('Petugas_Controller/update/' . $petugas['id_petugas']) ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" value="<?= $petugas['username'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password (Kosongkan jika tidak ingin mengubah)</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="nama_petugas">Nama Petugas</label>
                                <input type="text" name="nama_petugas" class="form-control" value="<?= $petugas['nama_petugas'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="id_level">Level</label>
                                <select name="id_level" class="form-control" required>
                                    <option value="">Pilih Level</option>
                                    <?php foreach ($level as $lv): ?>
                                        <option value="<?= $lv['id_level'] ?>" <?= ($petugas['id_level'] == $lv['id_level']) ? 'selected' : '' ?>>
                                            <?= $lv['nama_level'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Foto Saat Ini</label><br>
                                <img src="<?= base_url('assets/uploads/petugas/' . $petugas['photo_petugas']) ?>" width="100" alt="Foto Petugas">
                            </div>
                            <div class="form-group">
                                <label for="foto">Ganti Foto</label>
                                <input type="file" name="foto" class="form-control" accept="image/*">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Update</button>
                            <a href="<?= base_url('Petugas_Controller') ?>" class="btn btn-secondary mt-3">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
