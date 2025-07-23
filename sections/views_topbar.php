<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

  <!-- Sidebar Toggle (Topbar) -->
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
  </button>

  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto">

    <!-- Nav Item - Notification Obat -->
    <li class="nav-item dropdown no-arrow mx-1">
      <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <?php if ($jumlah_notifikasi > 0) : ?>
          <span class="badge badge-danger badge-counter"><?php echo $jumlah_notifikasi; ?></span>
        <?php endif; ?>
      </a>
      <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
          Notifikasi Obat Kadaluarsa
        </h6>

        <?php if ($jumlah_notifikasi > 0) : ?>
          <?php
          // Loop untuk menampilkan setiap notifikasi
          while ($obat = mysqli_fetch_assoc($result_kadaluarsa)) :
            // Mengubah format tanggal agar lebih mudah dibaca
            $tanggal_exp = new DateTime($obat['tanggal_kadaluarsa']);
            $tanggal_formatted = $tanggal_exp->format('d F Y');
          ?>
            <div class="dropdown-item d-flex align-items-center">
              <div class="mr-3">
                <div class="icon-circle bg-warning">
                  <i class="fas fa-exclamation-triangle text-white"></i>
                </div>
              </div>
              <div>
                <div class="small text-gray-500">Kadaluarsa: <?php echo $tanggal_formatted; ?></div>
                <span class="font-weight-bold"><?php echo htmlspecialchars($obat['nama_obat']); ?></span>
              </div>
            </div>
          <?php endwhile; ?>
        <?php else : ?>
          <div class="dropdown-item text-center small text-gray-500">
            Tidak ada notifikasi
          </div>
        <?php endif; ?>

        <a class="dropdown-item text-center small text-gray-500" href="obat.php">Tampilkan Semua Obat</a>
      </div>
    </li>

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $name ?></span>
        <img class="img-profile rounded-circle" src="../assets/img/profil/<?= $image ?>">
      </a>
      <!-- Dropdown - User Information -->
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="profil">
          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
          Profil
        </a>
        <?php if ($id_role <= 2) { ?>
          <a class="dropdown-item" href="setting">
            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
            Setting
          </a>
        <?php } ?>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Logout
        </a>
      </div>
    </li>

  </ul>

</nav>