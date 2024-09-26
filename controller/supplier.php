<?php

require_once("../config/Base.php");
require_once("../config/Auth.php");
require_once("../config/Alert.php");

$supplier = "SELECT * FROM supplier";
$view_supplier = mysqli_query($conn, $supplier);
if (isset($_POST["add_supplier"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (supplier($conn, $validated_post, $action = 'insert') > 0) {
    $message = "Supplier baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: supplier");
    exit();
  }
}
if (isset($_POST["edit_supplier"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (supplier($conn, $validated_post, $action = 'update') > 0) {
    $message = "Supplier " . $_POST['nama_supplierOld'] . " berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: supplier");
    exit();
  }
}
if (isset($_POST["delete_supplier"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (supplier($conn, $validated_post, $action = 'delete') > 0) {
    $message = "Supplier " . $_POST['nama_supplier'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: supplier");
    exit();
  }
}