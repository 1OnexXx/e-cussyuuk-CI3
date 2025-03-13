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

                    <?php if ($this->session->flashdata('validation_errors')): ?>
    <div class="alert alert-danger">
        <?= $this->session->flashdata('validation_errors'); ?>
    </div>
<?php endif; ?>



                        <form action="<?= base_url('admin/Transportasi_Controller/addDataType') ?>" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nama_type" class="form-label">Nama Type</label>
                                <input type="text" class="form-control <?= form_error('nama_type') ? 'is-invalid' : '' ?>" id="nama_type" name="nama_type" value="<?= set_value('nama_type'); ?>" novalidate>
                                <div class="invalid-feedback">
                                    <?= form_error('nama_type'); ?>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control <?= form_error('keterangan') ? 'is-invalid' : '' ?>" id="keterangan" name="keterangan" rows="4" novalidate><?= set_value('keterangan'); ?></textarea>
                                <div class="invalid-feedback">
                                    <?= form_error('keterangan'); ?>
                                </div>
                            </div>

                                <!-- Input Upload Gambar -->
    <div class="mb-3">
        <label for="gambar" class="form-label">Upload Gambar</label>
        <input type="file" class="form-control" id="gambar" name="gambar" >
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
