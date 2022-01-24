<?php

require_once '../config/config.php'; // INCLUDE CONFIG

function isReset(PDO $connection, int $id)
{
  if (isset($id)) {
    $password_reset = $connection->prepare("
      SELECT reset
      FROM users
      WHERE id = :id
    ");
    $password_reset->bindParam(":id", $id);
    $password_reset->execute();
    $password_reset_result = $password_reset->fetch(PDO::FETCH_ASSOC);
    if ($password_reset_result['reset'] == true) {
      return true;
    } else {
      return false;
    }
  } else {
    return false;
  }
}
