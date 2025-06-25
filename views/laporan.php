<?php require_once("../controller/laporan.php");
$_SESSION["project_deo_gratias_farma"]["name_page"] = "Laporan";
require_once("../templates/views_top.php"); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $_SESSION["project_deo_gratias_farma"]["name_page"] ?></h1>
  </div>

  <div class="row">
    <div class="col-sm-6 mb-4">
      <div class="card shadow border-0 h-100">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div class="left">
              <h3 class="card-title text-dark">Penerimaan Obat</h3>
              <p class="card-text">Memastikan stok obat di apotek tercatat dengan baik, memudahkan proses audit, serta membantu dalam pengelolaan persediaan agar tidak terjadi kekurangan atau kelebihan stok.</p>
              <a href="<?= $baseURL ?>views/laporan?p=penerimaan" class="btn btn-primary"><i class="fas fa-file-alt"></i> Laporan</a>
            </div>
            <div class="right">
              <img src="../assets/img/left-report.png" alt="Report Image" class="img-fluid" style="max-width: 200px;">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 mb-4">
      <div class="card shadow border-0 h-100">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div class="left">
              <h3 class="card-title text-dark">Pengeluaran Obat</h3>
              <p class="card-text">Dokumen yang mencatat setiap obat yang dikeluarkan dari stok, baik untuk penjualan, resep pasien, maupun kebutuhan internal. Laporan ini membantu memastikan penggunaan obat tercatat dengan rapi, mencegah penyalahgunaan, serta memudahkan proses audit dan pengelolaan stok agar tetap optimal.</p>
              <a href="<?= $baseURL ?>views/laporan?p=pengeluaran" class="btn btn-primary"><i class="fas fa-file-alt"></i> Laporan</a>
            </div>
            <div class="right">
              <img src="../assets/img/right-report.png" alt="Report Image" class="img-fluid" style="max-width: 200px;">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <?php if (isset($_GET['p'])) {
        if ($_GET['p'] == 'penerimaan') { ?>
        <div class="col lg-12">
          <div class="card shadow mb-4 border-0">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h3 class="card-title text-dark">Laporan Penerimaan Obat</h3>
              <div class="dropdown">
                <button class="btn btn-primary float-right" type="button" data-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-print"></i> Cetak Laporan
                </button>
                <ul class="dropdown-menu">
                  <form action="" method="post">
                    <input type="hidden" name="format_file" value="excel">
                    <button type="submit" name="export_penerimaan_obat" class="dropdown-item">Excel</button>
                  </form>
                  <!-- <form action="" method="post">
                    <input type="hidden" name="format_file" value="pdf">
                    <button type="submit" name="export_penerimaan_obat" class="dropdown-item">PDF</button>
                  </form> -->
                </ul>
              </div>
            </div>
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
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      <?php } elseif ($_GET['p'] == 'pengeluaran') { ?>
        <div class="col-lg-12">
          <div class="card shadow mb-4 border-0">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h3 class="card-title text-dark">Laporan Pengeluaran Obat</h3>
              <div class="dropdown">
                <button class="btn btn-primary float-right" type="button" data-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-print"></i> Cetak Laporan
                </button>
                <ul class="dropdown-menu">
                  <form action="" method="post">
                    <input type="hidden" name="format_file" value="excel">
                    <button type="submit" name="export_pengeluaran_obat" class="dropdown-item">Excel</button>
                  </form>
                  <!-- <form action="" method="post">
                    <input type="hidden" name="format_file" value="pdf">
                    <button type="submit" name="export_pengeluaran_obat" class="dropdown-item">PDF</button>
                  </form> -->
                </ul>
              </div>
            </div>
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
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    <?php }
      } ?>
  </div>

</div>
<!-- /.container-fluid -->

<?php require_once("../templates/views_bottom.php") ?>