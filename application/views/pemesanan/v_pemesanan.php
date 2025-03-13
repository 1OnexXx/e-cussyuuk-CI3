<div class="container">
    <div class="container-fluid p-4">
        <div class="row mb-4">
          <div class="fw-bold mb-3 ">
            <h1>Pemesanan</h1>
          </div>
            <div class="ml-4 d-flex justify-content-between">
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                            <input type="text" class="form-control" placeholder="Cari Pelanggan" id="filterNama">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <input type="date" class="form-control mb-3" id="filterTanggal">
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-primary " id="resetFilter"><i class="fas fa-refresh text-black"></i></button>
                    </div>
                </div>
                <div class="d-grid gap-2 d-md-block">
					<!-- <button class="btn btn-success" id="btnExportExcel"><i class="fas fa-download text-white"></i> Excel</button> -->
                        <a href="<?= base_url('admin/pemesanan_controller/export') ?>" class="btn btn-danger" id="btnExportPDF"><i class="fas fa-download text-white"></i> PDF</a>
                </div>
            </div>
        <div class="card shadow-sm h-50">
            <div class="card-body">
                <table class="table table-striped table-hover text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Kode</th>
                            <th>Tgl Pemesanan</th>
                            <th>Nama Pelanggan</th>
                            <th>Tujuan</th>
                            <th>Transportasi</th>
                            <th>Kode Kursi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($pemesanan as $row): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['kode_pemesanan'] ?></td>
                                <td><?= $row['tanggal_pemesanan'] ?></td>
                                <td><?= $row['nama_penumpang'] ?></td>
                                <td><?= $row['tujuan'] ?></td>
                                <td><?= $row['nama_transportasi'] ?></td>
                                <td><?= $row['kode_kursi'] ?></td>
                                <td>
                                    <a href="<?php echo base_url('admin/pemesanan_controller/detail/' . $row['id_pemesanan']) ?>" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i> Detail</a>
                                </td> 
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('resetFilter').addEventListener('click', function() {
        document.getElementById('filterNama').value = '';
        document.getElementById('filterTanggal').value = '';
        document.getElementById('filterTujuan').value = '';
        document.getElementById('filterTransportasi').value = '';
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const filterNama = document.getElementById("filterNama");
        const filterTanggal = document.getElementById("filterTanggal");
        const resetFilter = document.getElementById("resetFilter");
        const tableRows = document.querySelectorAll("tbody tr");

        filterNama.addEventListener("input", function () {
            filterTable();
        });

        filterTanggal.addEventListener("change", function () {
            filterTable();
        });

        resetFilter.addEventListener("click", function () {
            filterNama.value = "";
            filterTanggal.value = "";
            filterTable();
        });

        function filterTable() {
            const namaQuery = filterNama.value.toLowerCase();
            const tanggalQuery = filterTanggal.value;
            
            tableRows.forEach(row => {
                const namaPelanggan = row.children[3].textContent.toLowerCase();
                const tanggalPemesanan = row.children[2].textContent;
                
                const matchNama = namaQuery === "" || namaPelanggan.includes(namaQuery);
                const matchTanggal = tanggalQuery === "" || tanggalPemesanan.includes(tanggalQuery);
                
                if (matchNama && matchTanggal) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }
    });
</script>

