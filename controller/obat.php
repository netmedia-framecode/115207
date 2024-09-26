<?php

require_once("../config/Base.php");
require_once("../config/Auth.php");
require_once("../config/Alert.php");

$kategori_obat = "SELECT * FROM kategori_obat";
$view_kategori_obat = mysqli_query($conn, $kategori_obat);
$obat = "SELECT obat.*, kategori_obat.nama_kategori FROM obat JOIN kategori_obat ON obat.id_kategori = kategori_obat.id_kategori";
$view_obat = mysqli_query($conn, $obat);
if (isset($_POST["add_obat"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (obat($conn, $validated_post, $action = 'insert') > 0) {
    $message = "Obat baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: obat");
    exit();
  }
}
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