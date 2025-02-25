<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">DataTables.Net</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Tables</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Datatables</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h4 class="card-title">Data Master Penumpang</h4>
                    <div class="card-header d-flex justify-content-between align-items-center">
                        
                        <a href="<?= base_url('Penumpang_Controller/add') ?>" class="btn btn-primary">Add</a>
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>username</th>
                                        <th>password</th>
                                        <th>nama penumpang</th>
                                        <th>alamat penumpang</th>
                                        <th>tgl lahir</th>
                                        <th>jenis kelamin</th>
                                        <th>telepon</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <!-- <tfoot>
                                    <tr>
                                        <th>NO</th>
                                        <th>username</th>
                                        <th>password</th>
                                        <th>nama penumpang</th>
                                        <th>alamat penumpang</th>
                                        <th>tgl lahir</th>
                                        <th>jenis kelamin</th>
                                        <th>telepon</th>
                                    </tr>
                                </tfoot> -->

                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($penumpang as $penum): ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $penum['username']; ?></td>
                                            <td><?= $penum['password']; ?></td>
                                            <td><?= $penum['nama_penumpang']; ?></td>
                                            <td><?= $penum['alamat_penumpang']; ?></td>
                                            <td><?= $penum['tanggal_lahir']; ?></td>
                                            <td><?= $penum['jenis_kelamin']; ?></td>
                                            <td><?= $penum['telepon']; ?></td>
                                            <td class="d-flex justify-content-start">
                                                <a href="<?= base_url('admin/Penumpang_Controller/edit/' . $penum['id_penumpang']) ?>"
                                                    class="btn btn-primary me-2">Edit</a>
                                                <form action="<?= base_url('admin/penumpang/delete') ?>"
                                                    method="POST"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus penumpang ini?');">
                                                    <input type="hidden" name="id_penumpang"
                                                        value="<?= $penum['id_penumpang']; ?>">
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
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
</div>