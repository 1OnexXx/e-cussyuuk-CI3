<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Edit Data</h3>
                <h6 class="op-7 mb-2">Rasya Nazraditya</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Transportasi</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('index.php/Transportasi_Controller/updateTransportasi'); ?>" method="POST">
                            <input type="hidden" name="id_transportasi" value="<?= $transportasi['id_transportasi']; ?>">

                            <div class="mb-3">
                                <label for="kode" class="form-label">Kode Transportasi</label>
                                <input type="text" class="form-control" id="kode" name="kode" value="<?= $transportasi['kode']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="jumlah_kursi" class="form-label">Jumlah Kursi</label>
                                <input type="number" class="form-control" id="jumlah_kursi" name="jumlah_kursi" value="<?= $transportasi['jumlah_kursi']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="id_type_transportasi" class="form-label">Tipe Transportasi</label>
                                <select class="form-control" id="id_type_transportasi" name="id_type_transportasi" required>
                                    <?php foreach ($type_transportasi as $type) : ?>
                                        <option value="<?= $type['id_type_transportasi']; ?>" <?= ($type['id_type_transportasi'] == $transportasi['id_type_transportasi']) ? 'selected' : ''; ?>>
                                            <?= $type['nama_type']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="id_petugas" class="form-label">Petugas</label>
                                <select class="form-control" id="id_petugas" name="id_petugas" required>
                                    <?php foreach ($petugas as $p) : ?>
                                        <option value="<?= $p['id_petugas']; ?>" <?= ($p['id_petugas'] == $transportasi['id_petugas']) ? 'selected' : ''; ?>>
                                            <?= $p['nama_petugas']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="4"><?= $transportasi['keterangan']; ?></textarea>
                            </div>

                            <button type="submit" class="btn btn-success">
                                <i class="fa-solid fa-save"></i> Simpan Perubahan
                            </button>
                            <a href="<?= site_url('index.php/Transportasi_Controller/index'); ?>" class="btn btn-secondary">
                                <i class="fa-solid fa-arrow-left"></i> Kembali
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
