<?php

require_once("../config/Base.php");
require_once("../config/Auth.php");
require_once("../config/Alert.php");

$obat = "SELECT * FROM obat";
$view_obat = mysqli_query($conn, $obat);
$supplier = "SELECT * FROM supplier";
$view_supplier = mysqli_query($conn, $supplier);
$penerimaan_obat = "SELECT penerimaan_obat.*, obat.nama_obat, supplier.nama_supplier FROM penerimaan_obat JOIN obat ON penerimaan_obat.id_obat = obat.id_obat JOIN supplier ON penerimaan_obat.id_supplier = supplier.id_supplier";
$view_penerimaan_obat = mysqli_query($conn, $penerimaan_obat);
if (isset($_POST["add_penerimaan_obat"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (penerimaan_obat($conn, $validated_post, $action = 'insert') > 0) {
    $message = "Penerimaan Obat baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: penerimaan-obat");
    exit();
  }
}
if (isset($_POST["edit_penerimaan_obat"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (penerimaan_obat($conn, $validated_post, $action = 'update') > 0) {
    $message = "Penerimaan Obat " . $_POST['nama_obat'] . " berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: penerimaan-obat");
    exit();
  }
}
if (isset($_POST["delete_penerimaan_obat"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (penerimaan_obat($conn, $validated_post, $action = 'delete') > 0) {
    $message = "Penerimaan Obat " . $_POST['nama_obat'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: penerimaan-obat");
    exit();
  }
}