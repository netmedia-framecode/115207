<?php

require_once("../config/Base.php");
require_once("../config/Auth.php");
require_once("../config/Alert.php");

$stok_log = "SELECT * FROM stok_log JOIN obat ON stok_log.id_obat = obat.id_obat";
$view_stok_log = mysqli_query($conn, $stok_log);