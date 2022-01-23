<?php

require_once("../config/config.php");
require_once("../classes/is_logged.php");

if ($path == "/" && is_logged()) {
  include_once("../views/frontend/welcome.php");
  die();
} elseif ($path == "/" && !is_logged()) {
  include_once("../views/frontend/login.php");
  die();
} elseif (strpos($_SERVER['REQUEST_URI'], "?") && is_logged() && isset($_GET['logout'])) {
  if ($_GET['logout'] == true) {
    session_destroy();
    header("Location: /zmaturuj.me/");
    die();
  }
  die();
}

if ($path == "/generate") {
  include_once("../views/frontend/generate.php");
  die();
} elseif ($path == "/error") {
  include_once("../views/error/404.php");
  die();
} else {
  include_once("../views/error/404.php");
  die();
}
