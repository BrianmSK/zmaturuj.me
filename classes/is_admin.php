<?php

/* INCLUDES CONFIG INTO CLASS */
require_once '../config/config.php';

/*
FUNCTION TO CHECK IF USER IS ADMIN BY INSERTED ID
NEEDS A PDO CONNECTION
*/
function is_admin(PDO $connection, $id)
{

  if (isset($id)) {

    /* SQL QUERY TO CHECK IF USER IS ADMIN */
    $isAdminCheck = $connection->prepare("
      SELECT is_admin
      FROM users
      WHERE id = :id
    ");

    /* THIS BINDS PHP VARIABLE TO SQL QUERY AND EXECUTES IT + FETCHES RESULT*/
    $isAdminCheck->bindParam(":id", $id);
    $isAdminCheck->execute();
    $isAdmin = $isAdminCheck->fetch(PDO::FETCH_ASSOC);

    /* HERE WE CHECK FOR BOOL OUTPUT FROM DATABASE TO CHECK IF USER IS ADMIN */
    if ($isAdmin['is_admin'] == true) {
      return true;
    } else {
      return false;
    }
  }
}
