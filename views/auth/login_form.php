<?php

if (isset($_POST['submit'])) {
  include_once("../../config/config.php"); // INCLUDE CONFIG
  include_once("../../classes/is_logged.php"); // INCLUDE CLASS TO CHECK IF LOGGED
  if (is_logged()) {
    header("Location: /zmaturuj.me/");
    die();
  } else {
    $email = filter_var(strtolower($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    if (empty($email)) {
      $msg->error('Login error: email empty!', "$url", true);
      die();
    } elseif (empty($password)) {
      $msg->error('Login error: password empty!', "$url", true);
      die();
    } else {
      $login_check = $connection->prepare("
      SELECT id, email, password
      FROM users
      WHERE email = :email
      ");
      $login_check->bindParam(":email", $email);
      $login_check->execute();
      $login = $login_check->fetch(PDO::FETCH_ASSOC);
      if (!$login) {
        $msg->error('Login error: wrong username or password!', "$url", true);
      } else {
        if ($email == $login['email'] && password_verify($password, $login['password'])) {
          session_start();
          $_SESSION['id'] = $login['id'];
          $_SESSION['email'] = $login['email'];
          $msg->success('Login successful!', "$url", true);
        } else {
          $msg->error('Login error: wrong username or password!', "$url", true);
        }
      }
    }
  }
} else {
  header("Location: /zmaturuj.me/error");
  die();
}
