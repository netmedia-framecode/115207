<?php require_once("../controller/supplier.php");
$_SESSION["project_deo_gratias_farma"]["name_page"] = "Supplier";
require_once("../templates/views_top.php"); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $_SESSION["project_deo_gratias_farma"]["name_page"] ?></h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
      data-target="#tambah"><i class="bi bi-plus-lg"></i> Tambah</a>
  </div>

  <div class="card shadow mb-4 border-0">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th class="text-center">Nama Supplier</th>
              <th class="text-center">Kontak Supplier</th>
              <th class="text-center">Alamat Supplier</th>
              <th class="text-center" style="width: 200px;">Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th class="text-center">Nama Supplier</th>
              <th class="text-center">Kontak Supplier</th>
              <th class="text-center">Alamat Supplier</th>
              <th class="text-center">Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            <?php foreach ($view_supplier as $data) { ?>
            <tr>
              <td><?= $data['nama_supplier'] ?></td>
              <td><?= $data['kontak_supplier'] ?></td>
              <td><?= $data['alamat_supplier'] ?></td>
              <td class="text-center">
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                  data-target="#ubah<?= $data['id_supplier'] ?>">
                  <i class="bi bi-pencil-square"></i> Ubah
                </button>
                <div class="modal fade" id="ubah<?= $data['id_supplier'] ?>" tabindex="-1"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header border-bottom-0 shadow">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah <?= $data['nama_supplier'] ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="" method="post">
                        <input type="hidden" name="id_supplier" value="<?= $data['id_supplier'] ?>">
                        <input type="hidden" name="nama_supplierOld" value="<?= $data['nama_supplier'] ?>">
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="nama_supplier">Nama Supplier</label>
                            <input type="text" name="nama_supplier" value="<?= $data['nama_supplier'] ?>" class="form-control" id="nama_supplier" required>
                          </div>
                          <div class="form-group">
                            <label for="kontak_supplier">Kontak Supplier</label>
                            <input type="text" name="kontak_supplier" value="<?= $data['kontak_supplier'] ?>" class="form-control" id="kontak_supplier"
                              required>
                          </div>
                          <div class="form-group">
                            <label for="alamat_supplier">Alamat Supplier</label>
                            <input type="text" name="alamat_supplier" value="<?= $data['alamat_supplier'] ?>" class="form-control" id="alamat_supplier"
                              required>
                          </div>
                        </div>
                        <div class="modal-footer justify-content-center border-top-0">
                          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                          <button type="submit" name="edit_supplier" class="btn btn-warning btn-sm">Ubah</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                  data-target="#hapus<?= $data['id_supplier'] ?>">
                  <i class="bi bi-trash3"></i> Hapus
                </button>
                <div class="modal fade" id="hapus<?= $data['id_supplier'] ?>" tabindex="-1"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header border-bottom-0 shadow">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus <?= $data['nama_supplier'] ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="" method="post">
                        <input type="hidden" name="id_supplier" value="<?= $data['id_supplier'] ?>">
                        <input type="hidden" name="nama_supplier" value="<?= $data['nama_supplier'] ?>">
                        <div class="modal-body">
                          <p>Jika anda yakin ingin menghapus data ini, klik Hapus!</p>
                        </div>
                        <div class="modal-footer justify-content-center border-top-0">
                          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                          <button type="submit" name="delete_supplier" class="btn btn-danger btn-sm">hapus</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-bottom-0 shadow">
          <h5 class="modal-title" id="tambahLabel">Tambah Supplier</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="post">
          <div class="modal-body">
            <div class="form-group">
              <label for="nama_supplier">Nama Supplier</label>
              <input type="text" name="nama_supplier" class="form-control" id="nama_supplier" required>
            </div>
            <div class="form-group">
              <label for="kontak_supplier">Kontak Supplier</label>
              <input type="text" name="kontak_supplier" class="form-control" id="kontak_supplier" required>
            </div>
            <div class="form-group">
              <label for="alamat_supplier">Alamat Supplier</label>
              <input type="text" name="alamat_supplier" class="form-control" id="alamat_supplier" required>
            </div>
          </div>
          <div class="modal-footer justify-content-center border-top-0">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
            <button type="submit" name="add_supplier" class="btn btn-primary btn-sm">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php require_once("../templates/views_bottom.php") ?>