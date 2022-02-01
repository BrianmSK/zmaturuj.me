<?php

/* WE INCLUDE CONFIG FILE DUE TO NEEDYNESS OF PDO CONNECTION */
require_once '../config/config.php';

/*
THIS FUNCTION SERVES THE PURPOSE OF CHECKING WHETHER WE FORCE USER TO SET HIS PASSWORD
WE NEED PDO TO CHECK IF ITS ALWAYS LIKE THAT, STORING IT INTO SESSION WOULD WORK BUT COMPLICATE THINGS
WE CHECK IT BY USER ID WITH SIMPLE SQL QUERY
*/
function isReset(PDO $connection, int $id)
{
  if (isset($id)) {

    /* SQL QUERY TO SELECT RESET WHERE OUR ID MATCHES */
    $password_reset = $connection->prepare("
      SELECT reset
      FROM users
      WHERE id = :id
    ");

    /*
    HERE WE BIND THE PARAMTER AND EXECUTE IT, THEN FETCH THE RESULT
    WITH ASSCIATIVE ARRAY (BECAUSE IT WORKS :D)
    */
    $password_reset->bindParam(":id", $id);
    $password_reset->execute();
    $password_reset_result = $password_reset->fetch(PDO::FETCH_ASSOC);

    /* WE ARE LOOKING FOR BOOL RESULT OF RESET, IF ITS TRUE THEN WE KNOW USER MUST RESET HIS PASSWORD */
    if ($password_reset_result['reset'] == true) {
      return true;
    } else {
      return false;
    }

    /* IF THERE IS NO ID SET, WE CANNOT CHECK IT */
  } else {
    return false;
  }
}
