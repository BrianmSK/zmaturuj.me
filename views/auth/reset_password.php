<?php

// INCLUDE CONFIG
include_once("../../config/config.php");

// WE CHECK IF USER IS COMING FROM FORM AND IF THERE IS RESET PASSWORD IN URL OR ISRESET IN DATABASE
if (isset($_POST['submit']) && (isset($_GET['reset-password']) || isReset($connection, $_SESSION['id']))) {

  // DEFINES POST VARIABLES INTO CUSTOM VARIABLES
  $password = $_POST['password'];
  $password_verify = $_POST['password-verify'];
  $reset_hash = $_POST['hash'];

  // IF PASSWORD DOESNT MATCH REDIRECT BACK
  if ($password != $password_verify) {

    // IF HASH IS NOT EMPTY REDIRECT TO URL WITH HASH
    if (!empty($reset_hash)) {
      $msg->error('Password does not match! Enter again', "$url?reset-password=$reset_hash", true);

      // OTHERWISE REDIRECT TO ROOT
    } else {
      $msg->error('Password does not match! Enter again', "$url", true);
    }
  } else {

    // OTHERWISE HASH THE ENTERED PASSWORD WITH DEFAULT METHOD
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // IF WE HAVE SESSION ID USED SQL QUERY BASED ON ID 
    // THIS CAN OCCUR IF USER COMES AS LOGIN USER AND NOT 
    if (isset($_SESSION['id'])) {

      // SQL QUERY TO UPDATE PASSWORD AND SET RESET VALUE TO 0 AND HASH TO NULL
      $password_change = $connection->prepare("
      UPDATE users
      SET password = :password, reset = 0, reset_hash = NULL
      WHERE id = :id
    ");

      // BIND PARAMETERS FROM PHP VARIABLES TO SQL QUERY AND EXECUTE IT, NO FETCH NEEDED
      $password_change->bindParam(':password', $hashed_password);
      $password_change->bindParam(':id', $_SESSION['id']);
      $password_change->execute();

      // AFTERWARDS WE DESTROY SESSION SO USER GETS LOGGED OUT
      session_destroy();

      // THEN WE REDIRECT USER WITH SUCCESS TO ROUTING
      $msg->success('Password resetted!', "$url", true);
    } else {

      // IF USER COMES FROM LINK, WE VERIFY BY RESET HASH
      $password_change = $connection->prepare("
      UPDATE users
      SET password = :password, reset = 0, reset_hash = NULL
      WHERE reset_hash = :reset
    ");

      // WE BIND PARAMETERS FROM PHP TO SQL WE AGAIN EXECUTE IT WITHOUT FETCHING RESULT
      $password_change->bindParam(':password', $hashed_password);
      $password_change->bindParam(':reset', $reset_hash);
      $password_change->execute();

      //WE DESTROY SESSION SO USER IS LOGGED OUT
      session_destroy();

      // AND WE REDIRECT HIM TO HOMEPAGE
      $msg->success('Password resetted!', "$url", true);
    }
  }
}
