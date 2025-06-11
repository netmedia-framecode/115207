<?php

require_once("config/Base.php");
require_once("config/Alert.php");

$obat = "SELECT obat.*, kategori_obat.nama_kategori FROM obat JOIN kategori_obat ON obat.id_kategori = kategori_obat.id_kategori";
$view_obat = mysqli_query($conn, $obat);