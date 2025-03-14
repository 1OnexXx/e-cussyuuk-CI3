<div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Forms</h3>
              <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                  <a href="<?= base_url("admin/Level_Controller/index")?>">
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
                    <form action="<?= base_url('admin/Level_Controller/add') ?>" method="post">
                    <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="nama_level">Nama Level</label>
                          <input type="text" class="form-control" id="nama_level" name="nama_level" placeholder="Enter Level" required>
                          <?= form_error('nama_level', '<small class="text-danger">', '</small>') ?>
                        </div>
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
