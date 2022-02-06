<?php

// INCLUDE CONFIG
require_once '../config/config.php';

// FUNCTION TO CHECK IF EMAIL IS ALREADY IN DATABASE
// AND IF IT DOESNT EQUAL WITH THE EMAIL 
function email_exists(PDO $connection, $email)
{
  // PREPARE QUERY TO SELECT EMAIL BY INPUT
  $param_check = $connection->prepare("
      SELECT email
      FROM users
      WHERE email = :email
  ");
  $param_check->bindParam(":email", $email);
  $param_check->execute();
  $param_check_result = $param_check->fetch(PDO::FETCH_ASSOC);

  // PREPARE QUERY TO SELECT EMAIL BY ID
  $is_owned = $connection->prepare("
      SELECT email
      FROM users
      WHERE id = :id
  ");
  $is_owned->bindParam(":id", $_SESSION['id']);
  $is_owned->execute();
  $is_owned_result = $is_owned->fetch(PDO::FETCH_ASSOC);

  // IF RESULT IS NOT EMPTY AND ISNT EQUAL TO THE OWNERS MAIL, RESULT IS TRUE
  // IF ITS EMPTY (EMAIL IS NOT IN DB) OR IT ISNT OWNERS EMAIL, RESULT IS FALSE
  if (!empty($param_check_result) && ($is_owned_result['email'] != $param_check_result['email'])) {
    return true;
  } else {
    return false;
  }
}
