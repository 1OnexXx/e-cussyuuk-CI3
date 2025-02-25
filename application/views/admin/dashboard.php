<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Kaiadmin - Data Rute</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="assets/img/kaiadmin/favicon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />
    <link rel="stylesheet" href="assets/css/demo.css" />
    <link rel="stylesheet" href="assets/js/plugin/datatables/datatables.min.css" />
  </head>

  <body>
    <div class="container mt-5">
      <h2 class="mb-4">Daftar Rute</h2>
      <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambahRute">
        <i class="fas fa-plus"></i> Tambah Rute
      </button>

      <div class="table-responsive">
        <table id="ruteTable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Tujuan</th>
              <th>Rute Awal</th>
              <th>Rute Akhir</th>
              <th>Harga</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; foreach ($rute as $r) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $r['tujuan']; ?></td>
                <td><?= $r['rute_awal']; ?></td>
                <td><?= $r['rute_ahir']; ?></td>
                <td>Rp <?= number_format($r['harga'], 0, ',', '.'); ?></td>
                <td>

                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditRute_<?= $r['id_rute'] ?>">
                    Edit
                </button>
               <a href="<?= base_url('Dashboard_Controller/delete/' . $r['id_rute']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">
                    <i class="fas fa-trash-alt"></i> Hapus
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Modal Tambah Rute -->
    <div class="modal fade" id="modalTambahRute" tabindex="-1" aria-labelledby="modalTambahRuteLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalTambahRuteLabel">Tambah Rute</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?= base_url('Dashboard_Controller/store'); ?>" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label for="tujuan">Tujuan</label>
                <input type="text" name="tujuan" id="tujuan" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="rute_awal">Rute Awal</label>
                <input type="text" name="rute_awal" id="rute_awal" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="rute_akhir">Rute Akhir</label>
                <input type="text" name="rute_ahir" id="rute_ahir" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" name="harga" id="harga" class="form-control" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal Edit Rute -->
    <?php foreach ($rute as $r) : ?>
      <div class="modal fade" id="modalEditRute_<?=$r['id_rute']?>" tabindex="-1" aria-labelledby="modalTambahRuteLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalEditRuteLabel">Edit Rute</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?= base_url('Dashboard_Controller/update'); ?>" method="post">
          <input type="hidden" name="id_rute" value="<?= $r['id_rute']?>">

            <div class="modal-body">
              <div class="form-group">
                <label for="tujuan">Tujuan</label>
                <input type="text" name="tujuan" id="tujuan" class="form-control" required value="<?= $r['tujuan'] ?>">
              </div>
              <div class="form-group">
                <label for="rute_awal">Rute Awal</label>
                <input type="text" name="rute_awal" id="rute_awal" class="form-control" required value="<?= $r['rute_awal']?>">
              </div>
              <div class="form-group">
                <label for="rute_akhir">Rute Akhir</label>
                <input type="text" name="rute_ahir" id="rute_ahir" class="form-control" required value="<?= $r['rute_ahir']?>">
              </div>
              <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" name="harga" id="harga" class="form-control" required value="<?= $r['harga']?>">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
<?php endforeach; ?>


    <script>
  $(document).on("click", ".btnEditRute", function () {
    $("#edit_tujuan").val($(this).data("tujuan"));
    $("#edit_rute_awal").val($(this).data("rute_awal"));
    $("#edit_rute_ahir").val($(this).data("rute_ahir"));
    $("#edit_harga").val($(this).data("harga"));
  });
</script>

  </body>
</html>
