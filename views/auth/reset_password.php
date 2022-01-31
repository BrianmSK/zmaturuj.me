<?php
include_once("../../config/config.php"); // INCLUDE CONFIG

if (isset($_POST['submit']) && (isset($_GET['reset-password']) || isReset($connection, $_SESSION['id']))) {
  if ($_POST['password'] != $_POST['password-verify']) {
    $msg->error('Password does not match! Enter again', "$url?reset-password=$reset_hash", true);
  } else {
    $password = $_POST['password'];
    $reset_hash = $_POST['hash'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    if (isset($_SESSION['id'])) {
      $password_change = $connection->prepare("
      UPDATE users
      SET password = :password, reset = 0, reset_hash = NULL
      WHERE id = :id
    ");
      $password_change->bindParam(':password', $hashed_password);
      $password_change->bindParam(':id', $_SESSION['id']);
      $password_change->execute();
      session_destroy();
      $msg->success('Password resetted via id!', "$url", true);
    } else {
      $password_change = $connection->prepare("
      UPDATE users
      SET password = :password, reset = 0, reset_hash = NULL
      WHERE reset_hash = :reset
    ");
      $password_change->bindParam(':password', $hashed_password);
      $password_change->bindParam(':reset', $reset_hash);
      $password_change->execute();
      session_destroy();
      $msg->success('Password resetted via hash ver!', "$url", true);
    }
  }
}
