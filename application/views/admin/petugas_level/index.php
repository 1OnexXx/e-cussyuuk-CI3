<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Data Level</h3>
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
                    <a href="#">Data Level</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h4 class="card-title">Data Master Level</h4>
                    <div class="card-header d-flex justify-content-between align-items-center">
                        
                        <a href="<?= base_url('Level_Controller/add') ?>" class="btn btn-primary">Add</a>
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama Level</th>
                                        <th>action</th>
                                        
                                    </tr>
                                </thead>
                                <!-- <tfoot>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama Level</th>
                                        <th>action</th>
                                    </tr>
                                </tfoot> -->

                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($level as $lv): ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $lv['nama_level']; ?></td>
                                           
                                            <td class="d-flex justify-content-start">
                                                <a href="<?= base_url('Level_Controller/edit/' . $lv['id_level']) ?>"
                                                    class="btn btn-primary me-2">Edit</a>
                                                <form action="<?= base_url('Level_Controller/delete') ?>"
                                                    method="POST"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus level ini?');">
                                                    <input type="hidden" name="id_level"
                                                        value="<?= $lv['id_level']; ?>">
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