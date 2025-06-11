-- Active: 1721730379871@@127.0.0.1@3306@deo_gratias_farma
CREATE TABLE
  auth (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image VARCHAR(50),
    bg VARCHAR(35)
  );

CREATE TABLE
  user_role (
    id_role INT AUTO_INCREMENT PRIMARY KEY,
    role VARCHAR(35)
  );

INSERT INTO
  user_role (role)
VALUES
  ('Administrator'),
  ('Owner'),
  ('Member');

CREATE TABLE
  user_status (
    id_status INT AUTO_INCREMENT PRIMARY KEY,
    status VARCHAR(35)
  );

INSERT INTO
  user_status (status)
VALUES
  ('Active'),
  ('No Active');

CREATE TABLE
  users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    id_role INT,
    id_active INT,
    en_user VARCHAR(75),
    token CHAR(6),
    name VARCHAR(100),
    image VARCHAR(100),
    email VARCHAR(75),
    password VARCHAR(100),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_role) REFERENCES user_role (id_role) ON UPDATE NO ACTION ON DELETE NO ACTION,
    FOREIGN KEY (id_active) REFERENCES user_status (id_active) ON UPDATE NO ACTION ON DELETE NO ACTION
  );

CREATE TABLE
  user_menu (
    id_menu INT AUTO_INCREMENT PRIMARY KEY,
    menu VARCHAR(50)
  );

CREATE TABLE
  user_sub_menu (
    id_sub_menu INT AUTO_INCREMENT PRIMARY KEY,
    id_menu INT,
    id_active INT,
    title VARCHAR(50),
    url VARCHAR(50),
    icon VARCHAR(50),
    FOREIGN KEY (id_menu) REFERENCES user_menu (id_menu) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (id_active) REFERENCES user_status (id_active) ON UPDATE NO ACTION ON DELETE NO ACTION
  );

CREATE TABLE
  user_access_menu (
    id_access_menu INT AUTO_INCREMENT PRIMARY KEY,
    id_role INT,
    id_menu INT,
    FOREIGN KEY (id_role) REFERENCES user_role (id_role) ON UPDATE NO ACTION ON DELETE NO ACTION,
    FOREIGN KEY (id_menu) REFERENCES user_menu (id_menu) ON UPDATE CASCADE ON DELETE CASCADE
  );

CREATE TABLE
  user_access_sub_menu (
    id_access_sub_menu INT AUTO_INCREMENT PRIMARY KEY,
    id_role INT,
    id_sub_menu INT,
    FOREIGN KEY (id_role) REFERENCES user_role (id_role) ON UPDATE NO ACTION ON DELETE NO ACTION,
    FOREIGN KEY (id_sub_menu) REFERENCES user_sub_menu (id_sub_menu) ON UPDATE CASCADE ON DELETE CASCADE
  );

CREATE TABLE
  kategori_obat (
    id_kategori INT PRIMARY KEY AUTO_INCREMENT,
    nama_kategori VARCHAR(50) NOT NULL,
    deskripsi TEXT
  );

CREATE TABLE
  obat (
    id_obat INT PRIMARY KEY AUTO_INCREMENT,
    id_kategori INT,
    nama_obat VARCHAR(100) NOT NULL,
    harga_beli DECIMAL(10, 2) NOT NULL,
    harga_jual DECIMAL(10, 2) NOT NULL,
    stok_tersedia INT NOT NULL,
    stok_minimum INT NOT NULL, -- Untuk peringatan stok menipis
    satuan_obat VARCHAR(20) NOT NULL,
    tanggal_kadaluarsa DATE,
    lokasi_penyimpanan VARCHAR(100), -- Informasi lokasi penyimpanan obat
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_kategori) REFERENCES kategori_obat (id_kategori),
  );

CREATE TABLE
  supplier (
    id_supplier INT PRIMARY KEY AUTO_INCREMENT,
    nama_supplier VARCHAR(100) NOT NULL,
    kontak_supplier VARCHAR(20),
    alamat_supplier TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  );

CREATE TABLE
  penerimaan_obat (
    id_penerimaan INT PRIMARY KEY AUTO_INCREMENT,
    id_obat INT NOT NULL,
    id_supplier INT NOT NULL,
    jumlah_terima INT NOT NULL,
    harga_satuan DECIMAL(10, 2) NOT NULL,
    total_harga DECIMAL(10, 2) NOT NULL,
    tanggal_penerimaan DATE NOT NULL,
    FOREIGN KEY (id_obat) REFERENCES obat (id_obat),
    FOREIGN KEY (id_supplier) REFERENCES supplier (id_supplier),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  );

CREATE TABLE
  pengeluaran_obat (
    id_pengeluaran INT PRIMARY KEY AUTO_INCREMENT,
    id_obat INT NOT NULL,
    jenis_pengeluaran ENUM ('penjualan', 'internal') NOT NULL, -- Penjualan ke pelanggan atau penggunaan internal
    jumlah_keluar INT NOT NULL,
    harga_satuan DECIMAL(10, 2) NOT NULL,
    total_harga DECIMAL(10, 2) NOT NULL,
    tanggal_pengeluaran DATE NOT NULL,
    FOREIGN KEY (id_obat) REFERENCES obat (id_obat),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  );

CREATE TABLE
  stok_log (
    id_log INT PRIMARY KEY AUTO_INCREMENT,
    id_obat INT NOT NULL,
    jenis_perubahan ENUM ('penerimaan', 'pengeluaran') NOT NULL,
    jumlah_perubahan INT NOT NULL,
    stok_awal INT NOT NULL,
    stok_akhir INT NOT NULL,
    tanggal_perubahan TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    keterangan TEXT,
    FOREIGN KEY (id_obat) REFERENCES obat (id_obat)
  );