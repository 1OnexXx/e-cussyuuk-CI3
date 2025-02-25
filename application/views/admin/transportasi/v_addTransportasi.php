
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Tambah Data Transportasi</h3>
                <h6 class="op-7 mb-2">Rasya Nazraditya</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Transportasi</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('index.php/Transportasi_Controller/addTransportasi') ?>" method="POST">
                            <div class="mb-3">
                                <label for="kode" class="form-label">Kode Transportasi</label>
                                <input type="text" class="form-control" id="kode" name="kode" required>
                            </div>
                            <div class="mb-3">
                                <label for="jumlah_kursi" class="form-label">Jumlah Kursi</label>
                                <input type="number" class="form-control" id="jumlah_kursi" name="jumlah_kursi" required>
                            </div>
                            <div class="mb-3">
                                <label for="id_type_transportasi" class="form-label">Tipe Transportasi</label>
                                <select class="form-control" id="id_type_transportasi" name="id_type_transportasi" required>
                                    <option value="">Pilih Tipe Transportasi</option>
                                    <?php foreach ($type_transportasi as $type) : ?>
                                        <option value="<?= $type['id_type_transportasi']; ?>"><?= $type['nama_type']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
    <label for="keterangan">Keterangan</label>
    <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder="Masukkan keterangan"></textarea>
</div>
                            <div class="mb-3">
                                <label for="id_petugas" class="form-label">Petugas</label>
                                <select class="form-control" id="id_petugas" name="id_petugas" required>
                                    <option value="">Pilih Petugas</option>
                                    <?php foreach ($petugas as $p) : ?>
                                        <option value="<?= $p['id_petugas']; ?>"><?= $p['nama_petugas']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-solid fa-plus"></i> Tambah Data
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


