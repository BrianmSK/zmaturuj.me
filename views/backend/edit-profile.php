<?php

// INCLUDE CONFIG
include_once '../config/config.php';
if (isset($_POST['submit'])) {

  // LOWER AND SANITIZE MAIL INPUT
  $email = strtolower(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
  $firstname = htmlspecialchars($_POST['firstname']);
  $lastname = htmlspecialchars($_POST['lastname']);
  $password = $_POST['passwd'];
  $confirm_password = $_POST['confirm_passwd'];

  $password_hash = password_hash($password, PASSWORD_DEFAULT);

  // CHECK IF EMAIL EITHER EXISTS OR IS NOT OWNED BY USER
  if (email_exists($connection, $email)) {

    // CHECK IS PASSWORD IS EMPTY, IF ITS NOT, UPDATE WITH PASSWORD
    if (!empty($password)) {

      // IS PASSWORDS DOESNT EQUAL, RETURN WITH ERROR
      if ($password != $confirm_password) {
        $msg->error('Password does not match! Enter again', "$url/profile", true);
        die();
      }
      // PREPARE QUERY TO UPDATE WITH NEW PASSWORD
      $send_variables = $connection->prepare("
        UPDATE users
        SET firstname = :firstname, lastname = :lastname, email = :email, password = :password
        WHERE id = :id
      ");
      $send_variables->bindParam(":firstname", $firstname);
      $send_variables->bindParam(":lastname", $lastname);
      $send_variables->bindParam(":email", $email);
      $send_variables->bindParam(":password", $password_hash);
      $send_variables->bindParam(":id", $_SESSION['id']);
      $send_variables->execute();

      // REDIRECT TO HOMEPAGE WITH SUCCESS
      $msg->success('Profile updated!', $url, true);
      die();

      // IF WE DONT HAVE PASSWORD SET WE USE QUERY WITHOUT MODIFYING PASSWORD IN DB
    } else {

      // PREPARE QUERY TO UPDATE WITHOUT PASSWORD
      $send_variables = $connection->prepare("
        UPDATE users
        SET firstname = :firstname, lastname = :lastname, email = :email
        WHERE id = :id
      ");
      $send_variables->bindParam(":firstname", $firstname);
      $send_variables->bindParam(":lastname", $lastname);
      $send_variables->bindParam(":email", $email);
      $send_variables->bindParam(":id", $_SESSION['id']);
      $send_variables->execute();

      // REDIRECT TO HOMEPAGE WITH SUCCESS
      $msg->success('Profile updated!', $url, true);
      die();
    }
  }

  // IF EMAIL EXISTS RETURN BACK
  else {
    $msg->error('Email already exists!', "$url/profile", true);
    die();
  }
}
