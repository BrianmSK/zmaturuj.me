<?php

require_once("../config/config.php");
require_once("../classes/is_logged.php");
require_once("../classes/is_admin.php");
require_once("../classes/is_reset.php");
require_once("../classes/exists.php");

/*
CHECK IF USER IS LOGGED
*/
if ($path == "/" && is_logged() && isReset($connection, $_SESSION['id'])) {
  include_once("../views/frontend/reset.php");
  die();

  /*
CHECK IF USER IS GOING TO RESET PASSWORD VIA LINK
*/
} elseif (strpos($_SERVER['REQUEST_URI'], "?") && !is_logged() && isset($_GET['reset-password'])) {
  include_once("../views/frontend/reset.php");
  die();

  /*
CHECK IF LOGGED AND RESET?
*/
} elseif ($path == "/" && is_logged()) {
  include_once("../views/frontend/welcome.php");
  die();

  /*
CHECK IF USER WANTS TO VISIT HIS PROFILE  
*/
} elseif ($path == "/profile" && is_logged()) {
  include_once("../views/frontend/profile.php");
  die();

  /*
CHECK IF LOGGED
*/
} elseif ($path == "/" && !is_logged()) {
  include_once("../views/frontend/login.php");
  die();

  /*
CHECK IF USER WANTS TO LOGOUT
*/
} elseif (strpos($_SERVER['REQUEST_URI'], "?") && is_logged() && isset($_GET['logout'])) {
  if ($_GET['logout'] == true) {
    session_destroy();
    header("Location: /zmaturuj.me/");
    die();
  }
  die();
}

/*
CHECK IF USER WANTS TO GENERATE ACCOUNT AND IS LOGGED AND IS ADMIN
*/
if ($path == "/generate") {
  include_once("../views/frontend/generate.php");
  die();
}

/* ROUTING OF FILES HERE */
if ($path == "/login") {
  include_once("../views/auth/login_form.php");
  die();
}
if ($path == "/generate-account") {
  include_once("../views/backend/generate-account.php");
  die();
}
if ($path == "/reset-password") {
  include_once("../views/auth/reset_password.php");
  die();
}
if ($path == "/edit-profile") {
  include_once("../views/backend/edit-profile.php");
  die();
}


/* CHECK IF PATH EQUALS ERROR OR IS NOT KNOWN */
if ($path == "/error") {
  include_once("../views/error/404.php");
  die();
} else {
  header("Location: /zmaturuj.me/error");
  include_once("../views/error/404.php");
  die();
}
