<?php

if (isset($_POST['submit'])) {

  require_once '../../config/config.php'; // INCLUDE CONFIG

  $login = $connection->prepare("");
  $email = strtolower($_POST['email']);
  $password = $_POST['password'];
}
