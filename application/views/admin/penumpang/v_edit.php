<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Forms</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="<?= base_url("admin/Penumpang_Controller/index" . "?id_penumpang=" . $penumpang['id_penumpang']) ?>">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Forms</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Basic Form</a>      
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Form Elements</div>
                    </div>
                    <div class="card-body">
                    <form action="<?= site_url('admin/Penumpang_Controller/update/' . $penumpang['id_penumpang']) ?>" method="post">

                            <div class="row">

                                <input type="text" class="form-control" id="id_penumpang" name="id_penumpang" value="<?= $penumpang['id_penumpang'] ?>" hidden>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_penumpang">Nama Penumpang</label>
                                        <input type="text" class="form-control" id="nama_penumpang"
                                            name="nama_penumpang" placeholder="Enter Email" value="<?= $penumpang['nama_penumpang'] ?>" required>
                                        <?= form_error('nama_penumpang', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            placeholder="Enter Username" value="<?= $penumpang['username'] ?>" required>
                                        <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                            placeholder="Enter Email" value="<?= $penumpang['tanggal_lahir'] ?>" required>
                                        <?= form_error('tanggal_lahir', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select class="form-select form-control" id="jenis_kelamin"
                                            name="jenis_kelamin" required>
                                            <option value="" selected disabled>Select Jenis Kelamin</option>
                                            <option value="P">Perempuan</option>
                                            <option value="L">Laki - Laki</option>
                                        </select>
                                        <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_telpon">No telpon</label>
                                        <input type="number" class="form-control" id="no_telpon" name="telepon"
                                            placeholder="Enter No Telpon" value="<?= $penumpang['telepon'] ?>" required>
                                        <?= form_error('no_telpon', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="alamat">alamat</label>
                                        <textarea class="form-control" name="alamat" id="alamat"
                                            placeholder="Enter Alamat" width="2" required><?= $penumpang['alamat_penumpang'] ?></textarea>
                                        <?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Enter Password" required>
                                        </div>
                                        <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="confirm_password">Confirm Password</label>
                                            <input type="password" class="form-control" id="confirm_password"
                                                name="confirm_password" placeholder="Enter Confirm Password" required>
                                            <?= form_error('confirm_password', '<small class="text-danger">', '</small>') ?>
                                        </div>

                                    </div>


                                    <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
