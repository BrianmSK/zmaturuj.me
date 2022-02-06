<?php

include_once '../config/config.php'; // INCLUDE CONFIG

if (isset($_POST['submit']) && is_admin($connection, $_SESSION['id'])) { // CHECKS IF WE GET SUBMITTED FROM POST

  require_once '../classes/authcode.php'; // PASSWORD GENERATOR

  //Recipients
  $email = filter_var(strtolower($_POST['email']), FILTER_SANITIZE_EMAIL); // LOWER AND SANITIZE MAIL INPUT
  $mail->addAddress($email);     //Add a recipient

  $password = authCode(); // GENERATE PASSWORD
  $hashed_password = password_hash($password, PASSWORD_DEFAULT); // HASH PASSWORD USING PHP IN-BUILT FUNCTION
  $reset_hash = authCode(64); // GENERATE HASH FOR PASSWORD
  $mail_check = $connection->prepare("
      SELECT email
      FROM users
      WHERE email = :email
  ");
  $mail_check->bindParam(":email", $email);
  $mail_check->execute();
  $exists = $mail_check->fetch(PDO::FETCH_ASSOC);
  if ($exists) {
    $msg->error('User already exists!', "$url", true);
  } else {
    $insert = $connection->prepare("
    INSERT INTO users (email, password, reset_hash) 
    VALUES (:email, :password, :reset_hash);
    "); // PREPARE SQL QUERY TO INSERT DATA

    $insert->bindParam(":email", $email);
    $insert->bindParam(":password", $hashed_password);
    $insert->bindParam(":reset_hash", $reset_hash);
    $insert->execute();
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Your account has been generated';
    $mail->Body    = 'Your account has been successfully generated your credentials are
                      <br><b>E-mail: ' . $email . '</b>
                      <br><b>Password: ' . $password . '</b>
                      <br>Please login and change your password: <a href="localhost/zmaturuj.me/?reset-password=' . $reset_hash . '">here</a>!';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    if ($mail->send()) {
      $msg->success('User added', "$url", true);
    } else {
      $msg->error('Message could not be sent. Mailer Error', "$url", true);
    }
  }
} else {
  header("Location: /zmaturuj.me/error");
}
