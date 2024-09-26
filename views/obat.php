<?php require_once("../controller/obat.php");
$_SESSION["project_deo_gratias_farma"]["name_page"] = "Obat";
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
              <th class="text-center">Kategori Obat</th>
              <th class="text-center">Nama Obat</th>
              <th class="text-center">Harga Beli</th>
              <th class="text-center">Harga Jual</th>
              <th class="text-center">Stok Tersedia</th>
              <th class="text-center">Stok Minimum</th>
              <th class="text-center">Satuan Obat</th>
              <th class="text-center">Tgl Kadaluarsa</th>
              <th class="text-center">Lokasi Penyimpanan</th>
              <th class="text-center" style="width: 200px;">Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th class="text-center">Kategori Obat</th>
              <th class="text-center">Nama Obat</th>
              <th class="text-center">Harga Beli</th>
              <th class="text-center">Harga Jual</th>
              <th class="text-center">Stok Tersedia</th>
              <th class="text-center">Stok Minimum</th>
              <th class="text-center">Satuan Obat</th>
              <th class="text-center">Tgl Kadaluarsa</th>
              <th class="text-center">Lokasi Penyimpanan</th>
              <th class="text-center">Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            <?php foreach ($view_obat as $data) { ?>
            <tr>
              <td><?= $data['nama_kategori'] ?></td>
              <td><?= $data['nama_obat'] ?></td>
              <td>Rp.<?= number_format($data['harga_beli']) ?></td>
              <td>Rp.<?= number_format($data['harga_jual']) ?></td>
              <td><?= $data['stok_tersedia'] ?></td>
              <td><?= $data['stok_minimum'] ?></td>
              <td><?= $data['satuan_obat'] ?></td>
              <td><?= $data['tanggal_kadaluarsa'] ?></td>
              <td><?= $data['lokasi_penyimpanan'] ?></td>
              <td class="text-center">
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                  data-target="#ubah<?= $data['id_obat'] ?>">
                  <i class="bi bi-pencil-square"></i> Ubah
                </button>
                <div class="modal fade" id="ubah<?= $data['id_obat'] ?>" tabindex="-1"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header border-bottom-0 shadow">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah <?= $data['nama_obat'] ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="" method="post">
                        <input type="hidden" name="id_obat" value="<?= $data['id_obat'] ?>">
                        <input type="hidden" name="nama_obatOld" value="<?= $data['nama_obat'] ?>">
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="id_kategori">Kategori Obat</label>
                            <select name="id_kategori" class="form-control" id="id_kategori" required>
                              <option value="" selected>Pilih Kategori Obat</option>
                              <?php $id_kategori = $data['id_kategori'];
                              foreach ($view_kategori_obat as $data_ko) {
                                $selected = ($data_ko['id_kategori'] == $id_kategori) ? 'selected' : ''; ?>
                              <option value="<?= $data_ko['id_kategori'] ?>" <?= $selected ?>>
                                <?= $data_ko['nama_kategori'] ?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="nama_obat">Nama Obat</label>
                            <input type="text" name="nama_obat" value="<?= $data['nama_obat']?>" class="form-control"
                              id="nama_obat" minlength="3" required>
                          </div>
                          <div class="form-group">
                            <label for="harga_beli">Harga Beli</label>
                            <input type="number" name="harga_beli" value="<?= $data['harga_beli']?>"
                              class="form-control" id="harga_beli" required>
                          </div>
                          <div class="form-group">
                            <label for="harga_jual">Harga Jual</label>
                            <input type="number" name="harga_jual" value="<?= $data['harga_jual']?>"
                              class="form-control" id="harga_jual" required>
                          </div>
                          <div class="form-group">
                            <label for="stok_minimum">Stok Minimum</label>
                            <input type="number" name="stok_minimum" value="<?= $data['stok_minimum']?>"
                              class="form-control" id="stok_minimum" required>
                          </div>
                          <div class="form-group">
                            <label for="satuan_obat">Satuan Obat</label>
                            <input type="text" name="satuan_obat" value="<?= $data['satuan_obat']?>"
                              class="form-control" id="satuan_obat" required>
                          </div>
                          <div class="form-group">
                            <label for="tanggal_kadaluarsa">Tgl Kadaluarsa</label>
                            <input type="date" name="tanggal_kadaluarsa" value="<?= $data['tanggal_kadaluarsa']?>"
                              class="form-control" id="tanggal_kadaluarsa" required>
                          </div>
                          <div class="form-group">
                            <label for="lokasi_penyimpanan">Lokasi Penyimpanan</label>
                            <input type="text" name="lokasi_penyimpanan" value="<?= $data['lokasi_penyimpanan']?>"
                              class="form-control" id="lokasi_penyimpanan" required>
                          </div>
                        </div>
                        <div class="modal-footer justify-content-center border-top-0">
                          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                          <button type="submit" name="edit_obat" class="btn btn-warning btn-sm">Ubah</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                  data-target="#hapus<?= $data['id_obat'] ?>">
                  <i class="bi bi-trash3"></i> Hapus
                </button>
                <div class="modal fade" id="hapus<?= $data['id_obat'] ?>" tabindex="-1"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header border-bottom-0 shadow">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus <?= $data['nama_obat'] ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="" method="post">
                        <input type="hidden" name="id_obat" value="<?= $data['id_obat'] ?>">
                        <input type="hidden" name="nama_obat" value="<?= $data['nama_obat'] ?>">
                        <div class="modal-body">
                          <p>Jika anda yakin ingin menghapus data ini, klik Hapus!</p>
                        </div>
                        <div class="modal-footer justify-content-center border-top-0">
                          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                          <button type="submit" name="delete_obat" class="btn btn-danger btn-sm">hapus</button>
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
          <h5 class="modal-title" id="tambahLabel">Tambah Obat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="post">
          <div class="modal-body">
            <div class="form-group">
              <label for="id_kategori">Kategori Obat</label>
              <select name="id_kategori" class="form-control" id="id_kategori" required>
                <option value="" selected>Pilih Kategori Obat</option>
                <?php foreach ($view_kategori_obat as $data_ko) { ?>
                <option value="<?= $data_ko['id_kategori'] ?>"><?= $data_ko['nama_kategori'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="nama_obat">Nama Obat</label>
              <input type="text" name="nama_obat" class="form-control" id="nama_obat" required>
            </div>
            <div class="form-group">
              <label for="harga_beli">Harga Beli</label>
              <input type="number" name="harga_beli" class="form-control" id="harga_beli" required>
            </div>
            <div class="form-group">
              <label for="harga_jual">Harga Jual</label>
              <input type="number" name="harga_jual" class="form-control" id="harga_jual" required>
            </div>
            <div class="form-group">
              <label for="stok_minimum">Stok Minimum</label>
              <input type="number" name="stok_minimum" class="form-control" id="stok_minimum" required>
            </div>
            <div class="form-group">
              <label for="satuan_obat">Satuan Obat</label>
              <input type="text" name="satuan_obat" class="form-control" id="satuan_obat" required>
            </div>
            <div class="form-group">
              <label for="tanggal_kadaluarsa">Tgl Kadaluarsa</label>
              <input type="date" name="tanggal_kadaluarsa" class="form-control" id="tanggal_kadaluarsa" required>
            </div>
            <div class="form-group">
              <label for="lokasi_penyimpanan">Lokasi Penyimpanan</label>
              <input type="text" name="lokasi_penyimpanan" class="form-control" id="lokasi_penyimpanan" required>
            </div>
          </div>
          <div class="modal-footer justify-content-center border-top-0">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
            <button type="submit" name="add_obat" class="btn btn-primary btn-sm">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php require_once("../templates/views_bottom.php") ?>