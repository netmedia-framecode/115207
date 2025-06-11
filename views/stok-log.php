<?php require_once("../controller/stok-log.php");
$_SESSION["project_deo_gratias_farma"]["name_page"] = "Stok Log";
require_once("../templates/views_top.php"); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $_SESSION["project_deo_gratias_farma"]["name_page"] ?></h1>
  </div>

  <div class="card shadow mb-4 border-0">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th class="text-center">Nama Obat</th>
              <th class="text-center">Jenis Perubahan</th>
              <th class="text-center">Jumlah Perubahan</th>
              <th class="text-center">Stok Awal</th>
              <th class="text-center">Stok Akhir</th>
              <th class="text-center">Keterangan</th>
              <th class="text-center">Tgl Perubahan</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th class="text-center">Nama Obat</th>
              <th class="text-center">Jenis Perubahan</th>
              <th class="text-center">Jumlah Perubahan</th>
              <th class="text-center">Stok Awal</th>
              <th class="text-center">Stok Akhir</th>
              <th class="text-center">Keterangan</th>
              <th class="text-center">Tgl Perubahan</th>
            </tr>
          </tfoot>
          <tbody>
            <?php foreach ($view_stok_log as $data) { ?>
            <tr>
              <td><?= $data['nama_obat'] ?></td>
              <td><?= $data['jenis_perubahan'] ?></td>
              <td><?= $data['jumlah_perubahan'] ?></td>
              <td><?= $data['stok_awal'] ?></td>
              <td><?= $data['stok_akhir'] ?></td>
              <td><?= $data['keterangan'] ?></td>
              <td><?= $data['tanggal_perubahan'] ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php require_once("../templates/views_bottom.php") ?>