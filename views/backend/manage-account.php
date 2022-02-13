<?php

// INCLUDE CONFIG
include_once '../config/config.php';


// CHECKS IF WE GET SUBMITTED FROM POST AND IF IS ADMIN
if (isset($_POST['submit']) && is_admin($connection, $_SESSION['id'])) {

  if (isset($_POST['isAdmin']) && isset($_POST['isTeacher'])) {
    $permissions = $connection->prepare("
      UPDATE users
      SET is_admin = 1, is_teacher = 1
      WHERE id = :id
    ");
    $permissions->bindParam(":id", $_POST['users']);
    $permissions->execute();
    $msg->success('User edited', "$url/manage", true);
  } elseif (isset($_POST['isAdmin']) && !isset($_POST['isTeacher'])) {
    $permissions = $connection->prepare("
      UPDATE users
      SET is_admin = 1, is_teacher = 0
      WHERE id = :id
    ");
    $permissions->bindParam(":id", $_POST['users']);
    $permissions->execute();
    $msg->success('User edited', "$url/manage", true);
  } elseif (!isset($_POST['isAdmin']) && isset($_POST['isTeacher'])) {
    $permissions = $connection->prepare("
      UPDATE users
      SET is_admin = 0, is_teacher = 1
      WHERE id = :id
    ");
    $permissions->bindParam(":id", $_POST['users']);
    $permissions->execute();
    $msg->success('User edited', "$url/manage", true);
  } else {
    $permissions = $connection->prepare("
      UPDATE users
      SET is_admin = 0, is_teacher = 0
      WHERE id = :id
    ");
    $permissions->bindParam(":id", $_POST['users']);
    $permissions->execute();
    $msg->success('User edited', "$url/manage", true);
  }
} else {
  header("Location $url/error");
}
