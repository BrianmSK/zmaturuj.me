<?php
require_once '../config/config.php'; // INCLUDE CONFIG
function is_admin(PDO $connection, $id)
{
  if (isset($id)) {
    $isAdminCheck = $connection->prepare("
      SELECT is_admin
      FROM users
      WHERE id = :id
    ");
    $isAdminCheck->bindParam(":id", $id);
    $isAdminCheck->execute();
    $isAdmin = $isAdminCheck->fetch(PDO::FETCH_ASSOC);
    if ($isAdmin['is_admin']) {
      return true;
    } else {
      return false;
    }
  }
}
