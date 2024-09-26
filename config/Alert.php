<?php

$messageTypes = ["success", "info", "warning", "danger", "dark"];

if (!isset($_SESSION["project_deo_gratias_farma"]["users"])) {
  if (isset($_SESSION["project_deo_gratias_farma"]["time_message"]) && (time() - $_SESSION["project_deo_gratias_farma"]["time_message"]) > 2) {
    foreach ($messageTypes as $type) {
      if (isset($_SESSION["project_deo_gratias_farma"]["message_$type"])) {
        unset($_SESSION["project_deo_gratias_farma"]["message_$type"]);
      }
    }
    unset($_SESSION["project_deo_gratias_farma"]["time_message"]);
  }
} else if (isset($_SESSION["project_deo_gratias_farma"]["users"])) {
  if (isset($_SESSION["project_deo_gratias_farma"]["users"]["time_message"]) && (time() - $_SESSION["project_deo_gratias_farma"]["users"]["time_message"]) > 2) {
    foreach ($messageTypes as $type) {
      if (isset($_SESSION["project_deo_gratias_farma"]["users"]["message_$type"])) {
        unset($_SESSION["project_deo_gratias_farma"]["users"]["message_$type"]);
      }
    }
    unset($_SESSION["project_deo_gratias_farma"]["users"]["time_message"]);
  }
}
