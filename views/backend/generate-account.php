<?php

// INCLUDE CONFIG
include_once '../config/config.php';


// CHECKS IF WE GET SUBMITTED FROM POST AND IF IS ADMIN
if (isset($_POST['submit']) && is_admin($connection, $_SESSION['id'])) {

  // WE INCLUDE PASSWORD GENERATOR AFTERWARDS
  require_once '../classes/authcode.php';

  // WE FILTER AND SANITIZITE EMAIL AND SAVE IT TO VARIABLE
  $email = filter_var(strtolower($_POST['email']), FILTER_SANITIZE_EMAIL);

  // WE SET A RECIPIENT
  $mail->addAddress($email);

  // WE GENERATE PASSWORD VIA FUNCTION , WE HASH IT AND GENERATE RESET HASH
  $password = authCode();
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  $reset_hash = authCode(64);

  // SQL QUERY TOCHECK IF MAIL IS EXISTING
  $mail_check = $connection->prepare("
      SELECT email
      FROM users
      WHERE email = :email
  ");

  // WE BIND EMAIL PARAM, EXECUTE AND FETCH
  $mail_check->bindParam(":email", $email);
  $mail_check->execute();
  $exists = $mail_check->fetch(PDO::FETCH_ASSOC);

  // IF EMAIL EXISTS, WE REDIRECT HIM BACK WITH ERROR MESSAGE
  if ($exists) {
    $msg->error('User already exists!', "$url", true);

    // OTHERWISE WE PREPARE QUERY TO INSERT NEW DATA INTO DATABASE 
  } else {
    $insert = $connection->prepare("
    INSERT INTO users (email, password, reset_hash) 
    VALUES (:email, :password, :reset_hash);
    ");

    // WE PREPARE PARAMS AS EMAIL, PASSWORD AND RESET HASH, AFTEWARDS WE EXECUTE WITHOUT FECHINNG
    $insert->bindParam(":email", $email);
    $insert->bindParam(":password", $hashed_password);
    $insert->bindParam(":reset_hash", $reset_hash);
    $insert->execute();

    // CONTENT OF THE EMAIL
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Your account has been generated';
    $mail->Body    = 'Your account has been successfully generated your credentials are
                      <br><b>E-mail: ' . $email . '</b>
                      <br><b>Password: ' . $password . '</b>
                      <br>Please login and change your password: <a href="localhost/zmaturuj.me/?reset-password=' . $reset_hash . '">here</a>!';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    // IF WE SEND THE EMAIL SUCCESSFULLY WE REDIRECT HIM BACK
    if ($mail->send()) {
      $msg->success('User added', "$url", true);

      // OTHERWISE WE REPORT AN ERROR WITH THE MAILER
    } else {
      $msg->error('Message could not be sent. Mailer Error', "$url", true);
    }
  }
  // IF USER DOES NOT COME FROM FORM, WE REDIRECT TO ERROR PAGE
} else {
  header("Location: /zmaturuj.me/error");
}
