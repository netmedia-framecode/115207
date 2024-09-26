<?php

require_once("../config/Base.php");
require_once("../config/Auth.php");
require_once("../config/Alert.php");

$obat = "SELECT * FROM obat";
$view_obat = mysqli_query($conn, $obat);
$pengeluaran_obat = "SELECT pengeluaran_obat.*, obat.nama_obat FROM pengeluaran_obat JOIN obat ON pengeluaran_obat.id_obat = obat.id_obat";
$view_pengeluaran_obat = mysqli_query($conn, $pengeluaran_obat);
if (isset($_POST["add_pengeluaran_obat"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (pengeluaran_obat($conn, $validated_post, $action = 'insert') > 0) {
    $message = "Pengeluaran Obat baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: pengeluaran-obat");
    exit();
  }
}
if (isset($_POST["edit_pengeluaran_obat"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (pengeluaran_obat($conn, $validated_post, $action = 'update') > 0) {
    $message = "Pengeluaran Obat " . $_POST['nama_obat'] . " berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: pengeluaran-obat");
    exit();
  }
}
if (isset($_POST["delete_pengeluaran_obat"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (pengeluaran_obat($conn, $validated_post, $action = 'delete') > 0) {
    $message = "Pengeluaran Obat " . $_POST['nama_obat'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: pengeluaran-obat");
    exit();
  }
}
        