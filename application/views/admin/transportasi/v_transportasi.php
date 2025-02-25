
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
                            <th>nama type</th>
                            <th>keterangan</th>
                            <th>action</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>no</th>
                            <th>nama type</th>
                            <th>keterangan</th>
                            <th>action</th>
                        </tfoot>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($type_transportasi as $ttr) : ?>
                          <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $ttr['nama_type'] ?></td>
                            <td>
                                <!-- Button trigger modal -->
                               <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                 keterangan
                               </button>
                                </td>
                            <td>61</td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?= $ttr['keterangan'] ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
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
                            <td>
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                 keterangan
                               </button>
                               </td>
                            <td><?= $tr['nama_type'] ?></td>
                            <td><?= $tr['nama_petugas'] ?></td>
                            <td><div class="btn btn-warning"><i class="bi bi-pencil"></i></div></td>
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
