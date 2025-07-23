<?php if (!isset($_SESSION[""])) {
  session_start();
}
error_reporting(~E_NOTICE & ~E_DEPRECATED);
require_once("Database.php");
require_once("Mail.php");
require_once(__DIR__ . "/../models/sql.php");
require_once(__DIR__ . "/../assets/vendor/autoload.php");
require_once(__DIR__ . "/../controller/Functions.php");

$baseURL = "http://$_SERVER[HTTP_HOST]/apps/website/tugas/deo_gratias_farma/";
$hostname = $_SERVER['HTTP_HOST'];
$port = $_SERVER['SERVER_PORT'];
if (strpos($hostname, 'apps.test') !== false && $port == 8080) {
  $baseURL = str_replace('/apps/', '/', $baseURL);
}
$name_website = "Deo Gratias Farma";

$select_auth = "SELECT * FROM auth";
$views_auth = mysqli_query($conn, $select_auth);
$data_auth = mysqli_fetch_assoc($views_auth);

if (isset($_SESSION["project_deo_gratias_farma"]["users"])) {
  // notification obat
  $jangka_waktu_hari = 30;
  $query_kadaluarsa = "SELECT nama_obat, tanggal_kadaluarsa
                     FROM obat
                     WHERE tanggal_kadaluarsa BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL $jangka_waktu_hari DAY)
                     ORDER BY tanggal_kadaluarsa ASC";
  $result_kadaluarsa = mysqli_query($conn, $query_kadaluarsa);
  $jumlah_notifikasi = mysqli_num_rows($result_kadaluarsa);
}
