<?php $this->load->view('template/sidebar'); ?>
<?php $this->load->view('template/header'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<!-- Tambahkan SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                        <h4 class="card-title">Edit Type Transportasi</h4>
                    </div>
                    <div class="card-body">
<<<<<<< HEAD
                        <form id="editForm" action="<?= base_url('index.php/Transportasi_Controller/updateDataType') ?>" method="POST">
=======
                        <form action="<?= base_url('admin/Transportasi_Controller/updateDataType') ?>" method="POST">
>>>>>>> 4c4cd0009e4b1e3d961037c3c832962aa358157e
                            <!-- ID Type Transportasi (Hidden) -->
                            <input type="hidden" name="id_type_transportasi" value="<?= $type_transportasi['id_type_transportasi']; ?>">

                            <div class="mb-3">
                                <label for="nama_type" class="form-label">Nama Type</label>
                                <input type="text" class="form-control" id="nama_type" name="nama_type" 
                                    value="<?= $type_transportasi['nama_type']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="4" required><?= $type_transportasi['keterangan']; ?></textarea>
                            </div>

                            <!-- Tombol Simpan -->
                            <button type="button" id="btnSubmit" class="btn btn-success">
                                <i class="fa-solid fa-save"></i> Simpan Perubahan
                            </button>

                            <a href="<?= base_url('index.php/Transportasi_Controller/index'); ?>" class="btn btn-secondary">

                                <i class="fa-solid fa-arrow-left"></i> Kembali
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

<!-- Script untuk SweetAlert -->
<script>
    document.getElementById("btnSubmit").addEventListener("click", function(event) {
        Swal.fire({
            title: "Konfirmasi",
            text: "Apakah Anda yakin ingin menyimpan perubahan?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Simpan!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("editForm").submit(); // Submit form jika dikonfirmasi
            }
        });
    });
</script>

<?php $this->load->view('template/footer'); ?>
