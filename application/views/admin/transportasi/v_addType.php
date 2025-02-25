<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Tambah Data</h3>
                <h6 class="op-7 mb-2">Rasya Nazraditya</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Type Transportasi</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('index.php/Transportasi_Controller/addDataType') ?>" method="POST">
                            <div class="mb-3">
                                <label for="nama_type" class="form-label">Nama Type</label>
                                <input type="text" class="form-control" id="nama_type" name="nama_type" required>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="4" required></textarea>
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
