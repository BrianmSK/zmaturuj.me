<?php

require_once("../config/config.php");

if ($path == "/") {
  include_once("../views/components/site.php");
  die();
}

if ($path == "/generate") {
  include_once("../views/frontend/generate.html");
  die();
}
if ($path == "/error") {
  header("HTTP/1.1 404 Not Found");
  include_once("../views/error/404.html");
  die();
}
