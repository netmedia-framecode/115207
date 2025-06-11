<?php require_once("controller/visitor.php"); 
require_once("templates/top.php"); 
?>

<!-- banner section start here -->
<section class="banner style-1" style="background-image: url(<?= $baseURL?>assets/img/banner.png);">
  <div class="banner-top">
    <div class="container">
      <div class="row">
        <div class="col-xl-6 col-lg-8 col-12">
          <div class="banner-content-area">
            <div class="banner-content">
              <h1>Deo Gratias Farma</h1>
              <h4>System Manajemen Apotek Dalam Pengolahan Stok Obat</h4>
              <div class="banner-btn">
                <a href="#daftar-obat" class="lab-btn"><span>Daftar Obat <i
                      class="icofont-rounded-double-right"></i></span></a>
                <div class="video-btn">
                  <a href="https://www.youtube.com/embed/" data-rel="lightcase" title="Watch Now"
                    class="video-icon">
                    <img src="<?= $baseURL?>assets/img/icon-01.png" alt="video">
                    <div class="wave-wrapper">
                      <div class="wave-pulse wave-pulse-1"></div>
                      <div class="wave-pulse wave-pulse-2"></div>
                      <div class="wave-pulse wave-pulse-3"></div>
                      <div class="wave-pulse wave-pulse-4"></div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- banner section ending here -->

<!-- about section start here -->
<section class="about style-1 padding-tb bg-ash">
  <div class="pattan-shape"></div>
  <div class="container">
    <div class="section-header">
      <h2>Layanan Kesehatan <span class="theme-color">Deo Gratias Farma</span></h2>
    </div>
    <div class="section-wrapper">
      <div class="row justify-content-center no-gutters">
        <div class="col-xl-3 col-md-6 col-12">
          <div class="about-item style-1 text-center">
            <div class="about-thumb">
              <img src="<?= $baseURL?>assets/img/about/01.png" alt="about">
            </div>
            <div class="about-content">
              <h5>Medical Treatment</h5>
              <p>Caborin levera then andin tha qualit bwdh thenig covae thm anying value cordin</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6 col-12">
          <div class="about-item style-1 text-center">
            <div class="about-thumb">
              <img src="<?= $baseURL?>assets/img/about/02.png" alt="about">
            </div>
            <div class="about-content">
              <h5>Emergency Help</h5>
              <p>Caborin levera then andin tha qualit bwdh thenig covae thm anying value cordin</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6 col-12">
          <div class="about-item style-1 text-center">
            <div class="about-thumb">
              <img src="<?= $baseURL?>assets/img/about/03.png" alt="about">
            </div>
            <div class="about-content">
              <h5>Locations & Directions</h5>
              <p>Caborin levera then andin tha qualit bwdh thenig covae thm anying value cordin</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6 col-12">
          <div class="about-item style-1 text-center">
            <div class="about-thumb">
              <img src="<?= $baseURL?>assets/img/about/04.png" alt="about">
            </div>
            <div class="about-content">
              <h5>Qualified Doctors</h5>
              <p>Caborin levera then andin tha qualit bwdh thenig covae thm anying value cordin</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- about section ending here -->

<!-- Services section start here -->
<section class="service-section style-1 padding-tb bg-white" id="daftar-obat">
  <div class="pattan-shape"></div>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-header">
          <h2>Daftar Obat Yang Tersedia</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="service-area">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="section-wrapper">
            <div class="row align-items-center">
              <div class="col-xl-12 col-12">
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="Surgery" role="tabpanel">
                    <div class="card">
                      <div class="row no-gutters align-items-center flex-row-reverse">
                        <div class="col-lg-12">
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
                                  </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Services section ending here -->

<?php require_once("templates/bottom.php"); ?>