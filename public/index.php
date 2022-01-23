<?php

require_once("../config/config.php");
require_once("../classes/is_logged.php");

if ($path == "/" && is_logged()) {
  include_once("../views/frontend/welcome.php");
  die();
} else {
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
