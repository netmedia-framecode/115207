<?php if (!isset($_SESSION)) {
  session_start();
}
require_once("../controller/auth.php");
if (isset($_SESSION["project_deo_gratias_farma"])) {
  unset($_SESSION["project_deo_gratias_farma"]);
  header("Location: ./");
  exit();
}
