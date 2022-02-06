<?php

// INCLUDE CONFIG
require_once '../config/config.php';

// FUNCTION TO CHECK IF EMAIL IS ALREADY IN DATABASE
// AND IF IT DOESNT EQUAL WITH THE EMAIL 
function email_exists(PDO $connection, $email)
{
  // PREPARE QUERY TO SELECT EMAIL BY INPUT
  $param_check = $connection->prepare("
      SELECT email, id
      FROM users
      WHERE email = :email OR id = :id
  ");
  $param_check->bindParam(":email", $email);
  $param_check->bindParam(":id", $_SESSION['id']);
  $param_check->execute();
  // FETCH RESULT FROM QUERY
  $param_check_result = $param_check->fetch(PDO::FETCH_ASSOC);

  // GET THE ROW COUNT TO VERIFY HOW MANY OUTPUTS WE HAVE 
  $rows = $param_check->rowCount();

  // IF OUR SESSION ID MATCHES WITH ONE IN DB AND WE ONLY HAVE ONE ROW, WE CAN CHANGE EMAIL
  # WE NEED TO CHECK ROW COUNT, BECAUSE IF USER INPUTS VALID EMAIL OF ANOTHER USER, WE GET MORE ROWS THAN 1
  # WE CHECK FOR ID DUE TO PREVENTION AND IF USER IS REALLY THE OWNER OF THE EMAIL
  if (($param_check_result['id'] == $_SESSION['id']) && $rows == 1) {

    # RETURNS TRUE SO WE KNOW THAT USER CAN USE THIS EMAIL 
    return true;
  } else {

    #OTHERWISE WE RETURN FALSE AND USER CANNOT USE THIS EMAIL
    return false;
  }
}
