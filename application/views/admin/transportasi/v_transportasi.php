<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
<?php endif; ?>


<div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
              <div>
                <h3 class="fw-bold mb-3">transportasi</h3>
                <h6 class="op-7 mb-2">rasya nazraditya</h6>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">type transportasi</h4>
                    <a href="<?= base_url('index.php/Transportasi_Controller/addTypeForm'); ?>" class="btn btn-sm btn-primary">
    Add Data <i class="fa-solid fa-plus"></i>
</a>
<a class="btn btn-sm btn-success" href="<?= base_url('index.php/Transportasi_Controller/printType')?>">
  <i class="fa fa-print"></i>
</a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Type</th>
            <th>Keterangan</th>
            <th>gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no = 1; // Inisialisasi nomor urut
        foreach ($type_transportasi as $ttr) : ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $ttr['nama_type']; ?></td>
                <td><?= $ttr['keterangan']; ?></td>
                <td>
                <img src="<?= base_url('uploads/' . $ttr['gambar']); ?>" alt="Gambar Transportasi" width="100">
                </td>
                <td>
    <!-- Tombol Edit -->
    <a href="<?= site_url('index.php/Transportasi_Controller/editDataType/' . $ttr['id_type_transportasi']); ?>" 
       class="btn btn-sm btn-warning">
        <i class="fa-solid fa-edit"></i> Edit
    </a>

                    <!-- Tombol Hapus -->
                    <a href="#" 
   class="btn btn-sm btn-danger delete-btn" 
   data-url="<?= site_url('index.php/Transportasi_Controller/deleteDataType/' . $ttr['id_type_transportasi']); ?>">
    <i class="fa-solid fa-trash"></i> Delete
</a>
                </td>
            </tr>
        <?php 
        $no++; // Tambah nomor urut
        endforeach; ?>
    </tbody>
</table>


                    </div>
                  </div>
                </div>
              </div>
             
          </div>

            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">transportasi</h4>
                    <a href="<?= base_url('index.php/Transportasi_Controller/addTransportasiForm'); ?>" class="btn btn-sm btn-primary">
                     Add Data <i class="fa-solid fa-plus"></i>
                    </a>
     
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table
                        id="basic-datatables"
                        class="display table table-striped table-hover"
                      >
                        <thead>
                          <tr>
                            <th>no</th>
                            <th>kode</th>
                            <th>jumlah kursi</th>
                            <th>keterangan</th>
                            <th>type transportasi</th>
                            <th>petugas</th>
                            <th>action</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>no</th>
                            <th>kode</th>
                            <th>jumlah kursi</th>
                            <th>keterangan</th>
                            <th>type transportasi</th>
                            <th>petugas</th>
                            <th>action</th>
                          </tr>
                        </tfoot>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($transportasi as $tr) : ?>
                          <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $tr['kode'] ?></td>
                            <td><?= $tr['jumlah_kursi'] ?></td>
                            <td><?= $tr['keterangan']; ?></td>
                            <td><?= $tr['nama_type'] ?></td>
                            <td><?= $tr['nama_petugas'] ?></td>
                            <td> <!-- Tombol Edit -->
    <a href="<?= site_url('index.php/Transportasi_Controller/editTransportasiForm/' . $tr['id_transportasi']); ?>" 
       class="btn btn-sm btn-warning mb-2">
        <i class="fa-solid fa-edit"></i> Edit
    </a>

                    <!-- Tombol Hapus -->
                    <a href="<?= site_url('index.php/Transportasi_Controller/deleteDataTrans/' . $tr['id_transportasi']); ?>" 
           class="btn btn-sm btn-danger"
           onclick="return confirm('Yakin ingin menghapus data ini?');">
            <i class="fa-solid fa-trash"></i> Delete
        </a></td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?= $tr['keterangan'] ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
          </div>
        </div>


        <script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault(); // Mencegah langsung redirect

            let deleteUrl = this.getAttribute('data-url');

            Swal.fire({
                title: "Yakin ingin menghapus?",
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = deleteUrl;
                }
            });
        });
    });
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    <?php if ($this->session->flashdata('success')): ?>
        Swal.fire({
            title: "Berhasil!",
            text: "<?= $this->session->flashdata('success'); ?>",
            icon: "success",
            timer: 2000,
            showConfirmButton: false
        });
    <?php elseif ($this->session->flashdata('error')): ?>
        Swal.fire({
            title: "Gagal!",
            text: "<?= $this->session->flashdata('error'); ?>",
            icon: "error",
            timer: 2000,
            showConfirmButton: false
        });
    <?php endif; ?>
});
</script>