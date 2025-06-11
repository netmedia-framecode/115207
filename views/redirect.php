<?php
if (!isset($_SESSION["project_deo_gratias_farma"]["users"])) {
  header("Location: ../auth/");
  exit;
}
