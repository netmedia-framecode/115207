<?php

require_once("../config/Base.php");
require_once("../config/Auth.php");
require_once("../config/Alert.php");

$penerimaan_obat = "SELECT penerimaan_obat.*, obat.nama_obat, supplier.nama_supplier FROM penerimaan_obat JOIN obat ON penerimaan_obat.id_obat = obat.id_obat JOIN supplier ON penerimaan_obat.id_supplier = supplier.id_supplier";
$view_penerimaan_obat = mysqli_query($conn, $penerimaan_obat);
if (isset($_POST["export_penerimaan_obat"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (penerimaan_obat($conn, $validated_post, $action = 'export') > 0) {
    $message = "Penerimaan Obat baru berhasil diexport.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: laporan?p=penerimaan");
    exit();
  }
}

$pengeluaran_obat = "SELECT pengeluaran_obat.*, obat.nama_obat FROM pengeluaran_obat JOIN obat ON pengeluaran_obat.id_obat = obat.id_obat";
$view_pengeluaran_obat = mysqli_query($conn, $pengeluaran_obat);
if (isset($_POST["export_pengeluaran_obat"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (pengeluaran_obat($conn, $validated_post, $action = 'export') > 0) {
    $message = "Pengeluaran Obat baru berhasil diexport.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: laporan?p=pengeluaran");
    exit();
  }
}