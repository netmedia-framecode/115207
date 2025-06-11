-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 11 Jun 2025 pada 16.24
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deo_gratias_farma`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `bg` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `auth`
--

INSERT INTO `auth` (`id`, `image`, `bg`) VALUES
(1, '2340792435.png', '#5bd908');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_obat`
--

CREATE TABLE `kategori_obat` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_obat`
--

INSERT INTO `kategori_obat` (`id_kategori`, `nama_kategori`, `deskripsi`) VALUES
(3, 'Antibiotik', 'Obat yang digunakan untuk mengobati infeksi bakteri.'),
(4, 'Analgesik', 'Obat yang digunakan untuk meredakan nyeri.'),
(5, 'Antipiretik', 'Obat yang digunakan untuk menurunkan demam.'),
(6, 'Antihistamin', 'Obat yang digunakan untuk mengatasi alergi.'),
(7, 'Antiseptik', 'Obat yang digunakan untuk membersihkan luka dari infeksi mikroba.'),
(8, 'Obat Penurun Tekanan Darah', 'Obat yang digunakan untuk mengontrol tekanan darah tinggi.'),
(9, 'Obat Diabetes', 'Obat yang digunakan untuk mengontrol kadar gula darah.'),
(10, 'Vitamin dan Suplemen', 'Produk yang digunakan untuk memenuhi kebutuhan nutrisi.'),
(11, 'Obat Saluran Pernapasan', 'Obat untuk mengatasi masalah pernapasan seperti batuk atau asma.'),
(12, 'Obat Mata', 'Obat yang digunakan untuk pengobatan mata, seperti tetes mata.'),
(13, 'Obat Kulit', 'Obat yang digunakan untuk perawatan dan pengobatan masalah kulit.'),
(14, 'Obat Lambung', 'Obat yang digunakan untuk masalah lambung, seperti antasida.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `harga_beli` decimal(10,2) NOT NULL,
  `harga_jual` decimal(10,2) NOT NULL,
  `stok_tersedia` int(11) NOT NULL,
  `stok_minimum` int(11) NOT NULL,
  `satuan_obat` varchar(20) NOT NULL,
  `tanggal_kadaluarsa` date DEFAULT NULL,
  `lokasi_penyimpanan` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `id_kategori`, `nama_obat`, `harga_beli`, `harga_jual`, `stok_tersedia`, `stok_minimum`, `satuan_obat`, `tanggal_kadaluarsa`, `lokasi_penyimpanan`, `created_at`, `updated_at`) VALUES
(2, 3, 'Amoxicillin 500mg', 2000.00, 3500.00, 175, 20, 'Kapsul', '2025-05-12', 'Rak A - Baris 1', '2024-09-25 12:18:45', '2024-09-25 21:44:25'),
(3, 5, 'Paracetamol 500mg', 500.00, 1000.00, 240, 30, 'Tablet', '2024-11-20', 'Rak B - Baris 2', '2024-09-25 12:18:45', '2024-09-25 13:45:15'),
(4, 6, 'Cetirizine 10mg', 1500.00, 2500.00, 50, 15, 'Tablet', '2025-02-15', 'Rak C - Baris 3', '2024-09-25 12:18:45', '2024-09-25 12:18:45'),
(5, 4, 'Ibuprofen 400mg', 1000.00, 2000.00, 80, 25, 'Tablet', '2024-09-10', 'Rak D - Baris 4', '2024-09-25 12:18:45', '2024-09-25 14:36:03'),
(6, 9, 'Metformin 500mg', 2500.00, 4500.00, 60, 10, 'Tablet', '2026-01-01', 'Rak E - Baris 2', '2024-09-25 12:18:45', '2024-09-25 12:18:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerimaan_obat`
--

CREATE TABLE `penerimaan_obat` (
  `id_penerimaan` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `jumlah_terima` int(11) NOT NULL,
  `harga_satuan` decimal(10,2) NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `tanggal_penerimaan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penerimaan_obat`
--

INSERT INTO `penerimaan_obat` (`id_penerimaan`, `id_obat`, `id_supplier`, `jumlah_terima`, `harga_satuan`, `total_harga`, `tanggal_penerimaan`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 50, 25000.00, 1250000.00, '2024-09-25', '2024-09-25 12:57:22', '2024-09-25 13:18:10'),
(2, 2, 2, 75, 15000.00, 1125000.00, '2024-09-25', '2024-09-25 13:08:55', '2024-09-25 13:18:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran_obat`
--

CREATE TABLE `pengeluaran_obat` (
  `id_pengeluaran` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `jenis_pengeluaran` enum('penjualan','internal') NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `harga_satuan` decimal(10,2) NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `tanggal_pengeluaran` date NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengeluaran_obat`
--

INSERT INTO `pengeluaran_obat` (`id_pengeluaran`, `id_obat`, `jenis_pengeluaran`, `jumlah_keluar`, `harga_satuan`, `total_harga`, `tanggal_pengeluaran`, `created_at`, `updated_at`) VALUES
(1, 3, 'penjualan', 10, 1000.00, 10000.00, '2024-09-25', '2024-09-25 13:34:01', '2024-09-25 13:45:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_log`
--

CREATE TABLE `stok_log` (
  `id_log` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `jenis_perubahan` enum('penerimaan','pengeluaran') NOT NULL,
  `jumlah_perubahan` int(11) NOT NULL,
  `stok_awal` int(11) NOT NULL,
  `stok_akhir` int(11) NOT NULL,
  `tanggal_perubahan` timestamp NULL DEFAULT current_timestamp(),
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `stok_log`
--

INSERT INTO `stok_log` (`id_log`, `id_obat`, `jenis_perubahan`, `jumlah_perubahan`, `stok_awal`, `stok_akhir`, `tanggal_perubahan`, `keterangan`) VALUES
(1, 5, 'penerimaan', 1, 80, 81, '2024-09-25 14:04:11', 'Menambahkan data penerimaan obat baru.'),
(2, 5, 'penerimaan', 100, 81, 180, '2024-09-25 14:27:20', 'Mengubah data penerimaan obat baru.'),
(3, 5, 'penerimaan', 100, 180, 80, '2024-09-25 14:28:39', 'Menghapus data penerimaan obat baru.'),
(4, 5, 'penerimaan', 10, 80, 90, '2024-09-25 14:34:44', 'Menambahkan data pengeluaran obat dari jenis pengeluaran penjualan.'),
(5, 5, 'penerimaan', 5, 70, 75, '2024-09-25 14:35:42', 'Mengubah data pengeluaran obat dari jenis pengeluaran penjualan.'),
(6, 5, 'penerimaan', 5, 75, 80, '2024-09-25 14:36:03', 'Menghapus data pengeluaran obat dari jenis pengeluaran penjualan.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `kontak_supplier` varchar(20) DEFAULT NULL,
  `alamat_supplier` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `kontak_supplier`, `alamat_supplier`, `created_at`, `updated_at`) VALUES
(1, 'PT Farma Sejahtera', '021-5551234', 'Jl. Merdeka No. 45, Jakarta', '2024-09-25 12:21:31', '2024-09-25 12:21:31'),
(2, 'CV Apotek Medika', '022-7894567', 'Jl. Ahmad Yani No. 12, Bandung', '2024-09-25 12:21:31', '2024-09-25 12:21:31'),
(3, 'PT Kimia Farma', '021-6789012', 'Jl. Sudirman No. 10, Jakarta', '2024-09-25 12:21:31', '2024-09-25 12:21:31'),
(4, 'PT Anugerah Pharma', '0341-2345678', 'Jl. S. Parman No. 5, Malang', '2024-09-25 12:21:31', '2024-09-25 12:21:31'),
(5, 'CV Sehat Selalu', '031-1239876', 'Jl. Dr. Sutomo No. 23, Surabaya', '2024-09-25 12:21:31', '2024-09-25 12:21:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `id_active` int(11) DEFAULT 2,
  `en_user` varchar(75) DEFAULT NULL,
  `token` char(6) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT 'default.svg',
  `email` varchar(75) DEFAULT NULL,
  `password` varchar(75) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `id_role`, `id_active`, `en_user`, `token`, `name`, `image`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, 'developer', 'default.svg', 'developer@gmail.com', '$2y$10$//KMATh3ibPoI3nHFp7x/u7vnAbo2WyUgmI4x0CVVrH8ajFhMvbjG', '2024-09-25 10:13:18', '2024-09-25 10:13:18'),
(2, 2, 1, NULL, NULL, 'Administrator', 'default.svg', 'admin@gmail.com', '$2y$10$//KMATh3ibPoI3nHFp7x/u7vnAbo2WyUgmI4x0CVVrH8ajFhMvbjG', '2024-09-25 10:13:18', '2024-09-25 10:13:18'),
(3, 3, 1, '2y10k8t3bpLsHxtOhxRd4saegRdkLtzeVjssttVKnI2RgbDP6PpGn1O', '411633', 'Pemilik Apotek', 'default.svg', 'pemilikapotek@gmail.com', '$2y$10$yvs7bx2bPvWj4q/BfckDx.bLPsbkLd8r3mNa2feURVR5x97QhwVPa', '2025-06-11 21:53:40', '2025-06-11 21:53:40'),
(4, 4, 1, '2y1079uCOuFZBtGXYS0UkPGjSoFBBvi5NnKmAhEWAbr38rAGChpNoha', '243272', 'Staf Apotek', 'default.svg', 'stafapotek@gmail.com', '$2y$10$lCcLcEaL2WsZ/LkPkfGmqOzeNWGlSlQTOZaBcEUcBJI69ww2MlEDK', '2025-06-11 21:54:32', '2025-06-11 21:54:32');

--
-- Trigger `users`
--
DELIMITER $$
CREATE TRIGGER `insert_users` BEFORE INSERT ON `users` FOR EACH ROW BEGIN
    SET NEW.id_role = (
        SELECT id_role
        FROM `user_role`
        ORDER BY id_role DESC
        LIMIT 1
    );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id_access_menu` int(11) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id_access_menu`, `id_role`, `id_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 3),
(5, 2, 1),
(6, 3, 3),
(7, 4, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_sub_menu`
--

CREATE TABLE `user_access_sub_menu` (
  `id_access_sub_menu` int(11) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `id_sub_menu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_access_sub_menu`
--

INSERT INTO `user_access_sub_menu` (`id_access_sub_menu`, `id_role`, `id_sub_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 8),
(8, 1, 9),
(9, 1, 10),
(10, 1, 11),
(11, 1, 12),
(12, 1, 7),
(14, 2, 8),
(15, 2, 9),
(16, 2, 10),
(17, 2, 11),
(18, 2, 12),
(19, 2, 7),
(21, 2, 1),
(22, 3, 8),
(23, 3, 9),
(24, 3, 10),
(25, 3, 11),
(26, 3, 12),
(27, 4, 8),
(28, 4, 9),
(29, 4, 10),
(30, 4, 11),
(31, 4, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id_menu`, `menu`) VALUES
(1, 'User Management'),
(2, 'Menu Management'),
(3, 'Data Master');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'Developer'),
(2, 'Administrator'),
(3, 'Pemilik Apotek'),
(4, 'Staf Apotek');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_status`
--

CREATE TABLE `user_status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_status`
--

INSERT INTO `user_status` (`id_status`, `status`) VALUES
(1, 'Active'),
(2, 'No Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id_sub_menu` int(11) NOT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `id_active` int(11) DEFAULT 2,
  `title` varchar(50) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id_sub_menu`, `id_menu`, `id_active`, `title`, `url`, `icon`) VALUES
(1, 1, 1, 'Users', 'users', 'fas fa-users'),
(2, 1, 1, 'Role', 'role', 'fas fa-user-cog'),
(3, 2, 1, 'Menu', 'menu', 'fas fa-fw fa-folder'),
(4, 2, 1, 'Sub Menu', 'sub-menu', 'fas fa-fw fa-folder-open'),
(5, 2, 1, 'Menu Access', 'menu-access', 'fas fa-user-lock'),
(6, 2, 1, 'Sub Menu Access', 'sub-menu-access', 'fas fa-user-lock'),
(7, 3, 1, 'Kategori Obat', 'kategori-obat', 'fas fa-list-ol'),
(8, 3, 1, 'Obat', 'obat', 'fas fa-pills'),
(9, 3, 1, 'Supplier', 'supplier', 'fas fa-parachute-box'),
(10, 3, 1, 'Penerimaan Obat', 'penerimaan-obat', 'fas fa-people-carry'),
(11, 3, 1, 'Pengeluaran Obat', 'pengeluaran-obat', 'fas fa-boxes'),
(12, 3, 1, 'Stok Log', 'stok-log', 'fas fa-clipboard-list');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_obat`
--
ALTER TABLE `kategori_obat`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `penerimaan_obat`
--
ALTER TABLE `penerimaan_obat`
  ADD PRIMARY KEY (`id_penerimaan`),
  ADD KEY `penerimaan_obat_ibfk_1` (`id_obat`),
  ADD KEY `penerimaan_obat_ibfk_2` (`id_supplier`);

--
-- Indeks untuk tabel `pengeluaran_obat`
--
ALTER TABLE `pengeluaran_obat`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD KEY `pengeluaran_obat_ibfk_1` (`id_obat`);

--
-- Indeks untuk tabel `stok_log`
--
ALTER TABLE `stok_log`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `stok_log_ibfk_1` (`id_obat`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_active` (`id_active`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id_access_menu`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `user_access_sub_menu`
--
ALTER TABLE `user_access_sub_menu`
  ADD PRIMARY KEY (`id_access_sub_menu`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_sub_menu` (`id_sub_menu`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id_sub_menu`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_active` (`id_active`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori_obat`
--
ALTER TABLE `kategori_obat`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `penerimaan_obat`
--
ALTER TABLE `penerimaan_obat`
  MODIFY `id_penerimaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran_obat`
--
ALTER TABLE `pengeluaran_obat`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `stok_log`
--
ALTER TABLE `stok_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id_access_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_access_sub_menu`
--
ALTER TABLE `user_access_sub_menu`
  MODIFY `id_access_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_status`
--
ALTER TABLE `user_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_obat` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `penerimaan_obat`
--
ALTER TABLE `penerimaan_obat`
  ADD CONSTRAINT `penerimaan_obat_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penerimaan_obat_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`);

--
-- Ketidakleluasaan untuk tabel `pengeluaran_obat`
--
ALTER TABLE `pengeluaran_obat`
  ADD CONSTRAINT `pengeluaran_obat_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `stok_log`
--
ALTER TABLE `stok_log`
  ADD CONSTRAINT `stok_log_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id_role`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_active`) REFERENCES `user_status` (`id_status`);

--
-- Ketidakleluasaan untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id_role`),
  ADD CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `user_menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_access_sub_menu`
--
ALTER TABLE `user_access_sub_menu`
  ADD CONSTRAINT `user_access_sub_menu_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id_role`),
  ADD CONSTRAINT `user_access_sub_menu_ibfk_2` FOREIGN KEY (`id_sub_menu`) REFERENCES `user_sub_menu` (`id_sub_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `user_menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_sub_menu_ibfk_2` FOREIGN KEY (`id_active`) REFERENCES `user_status` (`id_status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
