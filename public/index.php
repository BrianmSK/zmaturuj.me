<?php

require_once("../config/config.php");

if ($path == "/") {
  include_once("../views/frontend/login.php");
  die();
}

if ($path == "/generate") {
  include_once("../views/frontend/generate.php");
  die();
}
if ($path == "/error") {
  include_once("../views/error/404.php");
  die();
}
