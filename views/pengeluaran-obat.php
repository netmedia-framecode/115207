<?php require_once("../controller/pengeluaran-obat.php");
$_SESSION["project_deo_gratias_farma"]["name_page"] = "Pengeluaran Obat";
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
              <th class="text-center">Jenis Pengeluaran</th>
              <th class="text-center">Jumlah Keluar</th>
              <th class="text-center">Harga Satuan</th>
              <th class="text-center">Total Harga</th>
              <th class="text-center">Tgl Pengeluaran</th>
              <th class="text-center" style="width: 200px;">Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th class="text-center">Nama Obat</th>
              <th class="text-center">Jenis Pengeluaran</th>
              <th class="text-center">Jumlah Keluar</th>
              <th class="text-center">Harga Satuan</th>
              <th class="text-center">Total Harga</th>
              <th class="text-center">Tgl Pengeluaran</th>
              <th class="text-center">Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            <?php foreach ($view_pengeluaran_obat as $data) { ?>
            <tr>
              <td><?= $data['nama_obat'] ?></td>
              <td><?= $data['jenis_pengeluaran'] ?></td>
              <td><?= $data['jumlah_keluar'] ?></td>
              <td>Rp.<?= number_format($data['harga_satuan']) ?></td>
              <td>Rp.<?= number_format($data['total_harga']) ?></td>
              <td><?= $data['tanggal_pengeluaran'] ?></td>
              <td class="text-center">
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                  data-target="#ubah<?= $data['id_pengeluaran'] ?>">
                  <i class="bi bi-pencil-square"></i> Ubah
                </button>
                <div class="modal fade" id="ubah<?= $data['id_pengeluaran'] ?>" tabindex="-1"
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
                        <input type="hidden" name="id_pengeluaran" value="<?= $data['id_pengeluaran'] ?>">
                        <input type="hidden" name="nama_obat" value="<?= $data['nama_obat'] ?>">
                        <input type="hidden" name="jumlah_keluarOld" value="<?= $data['jumlah_keluar'] ?>">
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="id_obat">Obat</label>
                            <select name="id_obat" class="form-control" id="id_obat" required>
                              <option value="" selected>Pilih Obat</option>
                              <?php $id_obat = $data['id_obat'];
                            foreach ($view_obat as $data_o) {
                              $selected = ($data_o['id_obat'] == $id_obat) ? 'selected' : ''; ?>
                              <option value="<?= $data_o['id_obat'] ?>" <?= $selected ?>><?= $data_o['nama_obat'] ?>
                              </option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="jenis_pengeluaran">Jenis Pengeluaran</label>
                            <select name="jenis_pengeluaran" class="form-control" id="jenis_pengeluaran" required>
                              <option value="" disabled selected>Pilih Jenis Pengeluaran</option>
                              <option value="penjualan">Penjualan</option>
                              <option value="internal">Internal</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="jumlah_keluar<?= $data['id_pengeluaran'] ?>">Jumlah Keluar</label>
                            <input type="number" name="jumlah_keluar" value="<?= $data['jumlah_keluar'] ?>"
                              class="form-control" id="jumlah_keluar<?= $data['id_pengeluaran'] ?>" required
                              oninput="hitungTotalHarga<?= $data['id_pengeluaran'] ?>()">
                          </div>
                          <div class="form-group">
                            <label for="harga_satuan<?= $data['id_pengeluaran'] ?>">Harga Satuan</label>
                            <input type="number" name="harga_satuan" value="<?= $data['harga_satuan'] ?>"
                              class="form-control" id="harga_satuan<?= $data['id_pengeluaran'] ?>" required
                              oninput="hitungTotalHarga<?= $data['id_pengeluaran'] ?>()">
                          </div>
                          <div class="form-group">
                            <label for="total_harga<?= $data['id_pengeluaran'] ?>">Total Harga</label>
                            <input type="number" name="total_harga" value="<?= $data['total_harga'] ?>"
                              class="form-control" id="total_harga<?= $data['id_pengeluaran'] ?>" readonly>
                          </div>

                          <script>
                          function hitungTotalHarga<?= $data['id_pengeluaran'] ?>() {
                            var jumlahKeluar<?= $data['id_pengeluaran'] ?> = document.getElementById(
                              'jumlah_keluar<?= $data['id_pengeluaran'] ?>').value;
                            var hargaSatuan<?= $data['id_pengeluaran'] ?> = document.getElementById(
                              'harga_satuan<?= $data['id_pengeluaran'] ?>').value;

                            // Pastikan input tidak kosong
                            if (jumlahKeluar<?= $data['id_pengeluaran'] ?> &&
                              hargaSatuan<?= $data['id_pengeluaran'] ?>) {
                              var totalHarga<?= $data['id_pengeluaran'] ?> =
                                jumlahKeluar<?= $data['id_pengeluaran'] ?> *
                                hargaSatuan<?= $data['id_pengeluaran'] ?>;
                              document.getElementById('total_harga<?= $data['id_pengeluaran'] ?>').value =
                                totalHarga<?= $data['id_pengeluaran'] ?>;
                            } else {
                              document.getElementById('total_harga<?= $data['id_pengeluaran'] ?>').value = 0;
                            }
                          }
                          </script>

                          <div class="form-group">
                            <label for="tanggal_pengeluaran">Tgl Pengeluaran</label>
                            <input type="date" name="tanggal_pengeluaran" value="<?= $data['tanggal_pengeluaran'] ?>"
                              class="form-control" id="tanggal_pengeluaran" required>
                          </div>
                        </div>
                        <div class="modal-footer justify-content-center border-top-0">
                          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                          <button type="submit" name="edit_pengeluaran_obat" class="btn btn-warning btn-sm">Ubah</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                  data-target="#hapus<?= $data['id_pengeluaran'] ?>">
                  <i class="bi bi-trash3"></i> Hapus
                </button>
                <div class="modal fade" id="hapus<?= $data['id_pengeluaran'] ?>" tabindex="-1"
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
                        <input type="hidden" name="id_pengeluaran" value="<?= $data['id_pengeluaran'] ?>">
                        <input type="hidden" name="id_obat" value="<?= $data['id_obat'] ?>">
                        <input type="hidden" name="nama_obat" value="<?= $data['nama_obat'] ?>">
                        <input type="hidden" name="jenis_pengeluaran" value="<?= $data['jenis_pengeluaran'] ?>">
                        <input type="hidden" name="jumlah_keluar" value="<?= $data['jumlah_keluar'] ?>">
                        <div class="modal-body">
                          <p>Jika anda yakin ingin menghapus data ini, klik Hapus!</p>
                        </div>
                        <div class="modal-footer justify-content-center border-top-0">
                          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                          <button type="submit" name="delete_pengeluaran_obat"
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
          <h5 class="modal-title" id="tambahLabel">Tambah Pengeluaran Obat</h5>
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
              <label for="jenis_pengeluaran">Jenis Pengeluaran</label>
              <select name="jenis_pengeluaran" class="form-control" id="jenis_pengeluaran" required>
                <option value="" disabled selected>Pilih Jenis Pengeluaran</option>
                <option value="penjualan">Penjualan</option>
                <option value="internal">Internal</option>
              </select>
            </div>
            <div class="form-group">
              <label for="jumlah_keluar">Jumlah Keluar</label>
              <input type="number" name="jumlah_keluar" class="form-control" id="jumlah_keluar" required
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
              var jumlahKeluar = document.getElementById('jumlah_keluar').value;
              var hargaSatuan = document.getElementById('harga_satuan').value;

              // Pastikan input tidak kosong
              if (jumlahKeluar && hargaSatuan) {
                var totalHarga = jumlahKeluar * hargaSatuan;
                document.getElementById('total_harga').value = totalHarga;
              } else {
                document.getElementById('total_harga').value = 0;
              }
            }
            </script>

            <div class="form-group">
              <label for="tanggal_pengeluaran">Tgl Pengeluaran</label>
              <input type="date" name="tanggal_pengeluaran" class="form-control" id="tanggal_pengeluaran" required>
            </div>
          </div>
          <div class="modal-footer justify-content-center border-top-0">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
            <button type="submit" name="add_pengeluaran_obat" class="btn btn-primary btn-sm">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php require_once("../templates/views_bottom.php") ?>