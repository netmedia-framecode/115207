<?php

require_once("../config/Base.php");
require_once("../config/Auth.php");
require_once("../config/Alert.php");

$kategori_obat = "SELECT * FROM kategori_obat";
$view_kategori_obat = mysqli_query($conn, $kategori_obat);
if (isset($_POST["add_kategori_obat"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (kategori_obat($conn, $validated_post, $action = 'insert') > 0) {
    $message = "Kategori Obat baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: kategori-obat");
    exit();
  }
}
if (isset($_POST["edit_kategori_obat"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (kategori_obat($conn, $validated_post, $action = 'update') > 0) {
    $message = "Kategori Obat " . $_POST['nama_kategoriOld'] . " berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: kategori-obat");
    exit();
  }
}
if (isset($_POST["delete_kategori_obat"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (kategori_obat($conn, $validated_post, $action = 'delete') > 0) {
    $message = "Kategori Obat " . $_POST['nama_kategori'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: kategori-obat");
    exit();
  }
}