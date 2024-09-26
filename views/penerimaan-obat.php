<?php require_once("../controller/penerimaan-obat.php");
$_SESSION["project_deo_gratias_farma"]["name_page"] = "Penerimaan Obat";
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
              <th class="text-center">Nama Obat</th>
              <th class="text-center">Nama Supplier</th>
              <th class="text-center">Jumlah Terima</th>
              <th class="text-center">Harga Satuan</th>
              <th class="text-center">Total Harga</th>
              <th class="text-center">Tgl Penerimaan</th>
              <th class="text-center" style="width: 200px;">Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th class="text-center">Nama Obat</th>
              <th class="text-center">Nama Supplier</th>
              <th class="text-center">Jumlah Terima</th>
              <th class="text-center">Harga Satuan</th>
              <th class="text-center">Total Harga</th>
              <th class="text-center">Tgl Penerimaan</th>
              <th class="text-center">Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            <?php foreach ($view_penerimaan_obat as $data) { ?>
            <tr>
              <td><?= $data['nama_obat'] ?></td>
              <td><?= $data['nama_supplier'] ?></td>
              <td><?= $data['jumlah_terima'] ?></td>
              <td>Rp.<?= number_format($data['harga_satuan']) ?></td>
              <td>Rp.<?= number_format($data['total_harga']) ?></td>
              <td><?= $data['tanggal_penerimaan'] ?></td>
              <td class="text-center">
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                  data-target="#ubah<?= $data['id_penerimaan'] ?>">
                  <i class="bi bi-pencil-square"></i> Ubah
                </button>
                <div class="modal fade" id="ubah<?= $data['id_penerimaan'] ?>" tabindex="-1"
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
                        <input type="hidden" name="id_penerimaan" value="<?= $data['id_penerimaan'] ?>">
                        <input type="hidden" name="nama_obat" value="<?= $data['nama_obat'] ?>">
                        <input type="hidden" name="jumlah_terimaOld" value="<?= $data['jumlah_terima'] ?>">
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="id_obat">Obat</label>
                            <select name="id_obat" class="form-control" id="id_obat" required>
                              <option value="" selected>Pilih Obat</option>
                              <?php $id_obat = $data['id_obat'];
                              foreach ($view_obat as $data_o) {
                                $selected = ($data_o['id_obat'] == $id_obat) ? 'selected' : ''; ?>
                              <option value="<?= $data_o['id_obat'] ?>" <?= $selected ?>><?= $data_o['nama_obat'] ?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="id_supplier">Supplier</label>
                            <select name="id_supplier" class="form-control" id="id_supplier" required>
                              <option value="" selected>Pilih Supplier</option>
                              <?php $id_supplier = $data['id_supplier'];
                              foreach ($view_supplier as $data_s) {
                                $selected = ($data_s['id_supplier'] == $id_supplier) ? 'selected' : ''; ?>
                              <option value="<?= $data_s['id_supplier'] ?>" <?= $selected ?>><?= $data_s['nama_supplier'] ?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="jumlah_terima<?= $data['id_penerimaan'] ?>">Jumlah Terima</label>
                            <input type="number" name="jumlah_terima" value="<?= $data['jumlah_terima'] ?>" class="form-control" id="jumlah_terima<?= $data['id_penerimaan'] ?>" required
                              oninput="hitungTotalHarga<?= $data['id_penerimaan'] ?>()">
                          </div>
                          <div class="form-group">
                            <label for="harga_satuan<?= $data['id_penerimaan'] ?>">Harga Satuan</label>
                            <input type="number" name="harga_satuan" value="<?= $data['harga_satuan'] ?>"  class="form-control" id="harga_satuan<?= $data['id_penerimaan'] ?>" required
                              oninput="hitungTotalHarga<?= $data['id_penerimaan'] ?>()">
                          </div>
                          <div class="form-group">
                            <label for="total_harga<?= $data['id_penerimaan'] ?>">Total Harga</label>
                            <input type="number" name="total_harga" value="<?= $data['total_harga'] ?>"  class="form-control" id="total_harga<?= $data['id_penerimaan'] ?>" readonly>
                          </div>

                          <script>
                          function hitungTotalHarga<?= $data['id_penerimaan'] ?>() {
                            var jumlahTerima<?= $data['id_penerimaan'] ?> = document.getElementById('jumlah_terima<?= $data['id_penerimaan'] ?>').value;
                            var hargaSatuan<?= $data['id_penerimaan'] ?> = document.getElementById('harga_satuan<?= $data['id_penerimaan'] ?>').value;

                            // Pastikan input tidak kosong
                            if (jumlahTerima<?= $data['id_penerimaan'] ?> && hargaSatuan<?= $data['id_penerimaan'] ?>) {
                              var totalHarga<?= $data['id_penerimaan'] ?> = jumlahTerima<?= $data['id_penerimaan'] ?> * hargaSatuan<?= $data['id_penerimaan'] ?>;
                              document.getElementById('total_harga<?= $data['id_penerimaan'] ?>').value = totalHarga<?= $data['id_penerimaan'] ?>;
                            } else {
                              document.getElementById('total_harga<?= $data['id_penerimaan'] ?>').value = 0;
                            }
                          }
                          </script>

                          <div class="form-group">
                            <label for="tanggal_penerimaan">Tgl Penerimaan</label>
                            <input type="date" name="tanggal_penerimaan" value="<?= $data['tanggal_penerimaan'] ?>"  class="form-control" id="tanggal_penerimaan"
                              required>
                          </div>
                        </div>
                        <div class="modal-footer justify-content-center border-top-0">
                          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                          <button type="submit" name="edit_penerimaan_obat" class="btn btn-warning btn-sm">Ubah</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                  data-target="#hapus<?= $data['id_penerimaan'] ?>">
                  <i class="bi bi-trash3"></i> Hapus
                </button>
                <div class="modal fade" id="hapus<?= $data['id_penerimaan'] ?>" tabindex="-1"
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
                        <input type="hidden" name="id_penerimaan" value="<?= $data['id_penerimaan'] ?>">
                        <input type="hidden" name="id_obat" value="<?= $data['id_obat'] ?>">
                        <input type="hidden" name="nama_obat" value="<?= $data['nama_obat'] ?>">
                        <input type="hidden" name="jumlah_terima" value="<?= $data['jumlah_terima'] ?>">
                        <div class="modal-body">
                          <p>Jika anda yakin ingin menghapus data ini, klik Hapus!</p>
                        </div>
                        <div class="modal-footer justify-content-center border-top-0">
                          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                          <button type="submit" name="delete_penerimaan_obat"
                            class="btn btn-danger btn-sm">hapus</button>
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
          <h5 class="modal-title" id="tambahLabel">Tambah Penerimaan Obat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="post">
          <div class="modal-body">
            <div class="form-group">
              <label for="id_obat">Obat</label>
              <select name="id_obat" class="form-control" id="id_obat" required>
                <option value="" selected>Pilih Obat</option>
                <?php foreach ($view_obat as $data_o) { ?>
                <option value="<?= $data_o['id_obat'] ?>"><?= $data_o['nama_obat'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="id_supplier">Supplier</label>
              <select name="id_supplier" class="form-control" id="id_supplier" required>
                <option value="" selected>Pilih Supplier</option>
                <?php foreach ($view_supplier as $data_s) { ?>
                <option value="<?= $data_s['id_supplier'] ?>"><?= $data_s['nama_supplier'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="jumlah_terima">Jumlah Terima</label>
              <input type="number" name="jumlah_terima" class="form-control" id="jumlah_terima" required
                oninput="hitungTotalHarga()">
            </div>
            <div class="form-group">
              <label for="harga_satuan">Harga Satuan</label>
              <input type="number" name="harga_satuan" class="form-control" id="harga_satuan" required
                oninput="hitungTotalHarga()">
            </div>
            <div class="form-group">
              <label for="total_harga">Total Harga</label>
              <input type="number" name="total_harga" class="form-control" id="total_harga" readonly>
            </div>

            <script>
            function hitungTotalHarga() {
              var jumlahTerima = document.getElementById('jumlah_terima').value;
              var hargaSatuan = document.getElementById('harga_satuan').value;

              // Pastikan input tidak kosong
              if (jumlahTerima && hargaSatuan) {
                var totalHarga = jumlahTerima * hargaSatuan;
                document.getElementById('total_harga').value = totalHarga;
              } else {
                document.getElementById('total_harga').value = 0;
              }
            }
            </script>

            <div class="form-group">
              <label for="tanggal_penerimaan">Tgl Penerimaan</label>
              <input type="date" name="tanggal_penerimaan" class="form-control" id="tanggal_penerimaan" required>
            </div>
          </div>
          <div class="modal-footer justify-content-center border-top-0">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
            <button type="submit" name="add_penerimaan_obat" class="btn btn-primary btn-sm">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php require_once("../templates/views_bottom.php") ?>