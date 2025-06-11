<?php

require_once("../config/Base.php");
require_once("../config/Auth.php");
require_once("../config/Alert.php");

$obat = "SELECT * FROM obat";
$view_obat = mysqli_query($conn, $obat);
$count_obat = mysqli_num_rows($view_obat);

$supplier = "SELECT * FROM supplier";
$view_supplier = mysqli_query($conn, $supplier);
$count_supplier = mysqli_num_rows($view_supplier);

$penerimaan_obat = "SELECT penerimaan_obat.*, obat.nama_obat, supplier.nama_supplier FROM penerimaan_obat JOIN obat ON penerimaan_obat.id_obat = obat.id_obat JOIN supplier ON penerimaan_obat.id_supplier = supplier.id_supplier";
$view_penerimaan_obat = mysqli_query($conn, $penerimaan_obat);
$count_penerimaan_obat = mysqli_num_rows($view_penerimaan_obat);

$pengeluaran_obat = "SELECT pengeluaran_obat.*, obat.nama_obat FROM pengeluaran_obat JOIN obat ON pengeluaran_obat.id_obat = obat.id_obat";
$view_pengeluaran_obat = mysqli_query($conn, $pengeluaran_obat);
$count_pengeluaran_obat = mysqli_num_rows($view_pengeluaran_obat);

$kategori_obat = "SELECT * FROM kategori_obat";
$view_kategori_obat = mysqli_query($conn, $kategori_obat);
$obat_minimum = "SELECT obat.*, kategori_obat.nama_kategori FROM obat JOIN kategori_obat ON obat.id_kategori = kategori_obat.id_kategori WHERE obat.stok_tersedia < obat.stok_minimum";
$view_obat_minimum = mysqli_query($conn, $obat_minimum);
if (isset($_POST["edit_obat"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (obat($conn, $validated_post, $action = 'update') > 0) {
    $message = "Obat " . $_POST['nama_obatOld'] . " berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: obat");
    exit();
  }
}
if (isset($_POST["delete_obat"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (obat($conn, $validated_post, $action = 'delete') > 0) {
    $message = "Obat " . $_POST['nama_obat'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: obat");
    exit();
  }
}