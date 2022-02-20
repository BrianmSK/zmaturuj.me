<?php

// CHECK IF USER IS COMING FROM A FORM
if (isset($_POST['submit'])) {

  // INCLUDE CONFIG
  include_once("../../config/config.php");

  // INCLUDE CLASS TO CHECK IF LOGGED
  include_once("../../classes/is_logged.php");

  // WE CHECK IF USER IS LOGGED, IF SO WE REDIRECT HIM BACK
  // THIS IS JUST INCASE SOMETHING OCCURS ON ROUTING OR USERS WANTS TO LOGIN AGAIN
  if (is_logged()) {

    header("Location: $url/");
    die();
  } else {

    // HERE WE SANITIZE EMAIL AND LOWER IT
    $email = filter_var(strtolower($_POST['email']), FILTER_SANITIZE_EMAIL);

    // EASIER VARIABLE FOR PASSWORD INSTEAD OF ALWAYS CALLING FOR POST
    $password = $_POST['password'];

    // WE CHECK IF EMAIL IS EMPTY AND IF SO, WE REDIRECT WITH FLASH MESSAGE CLASS FROM CONFIG
    if (empty($email)) {

      $msg->error('Login error: email empty!', "$url", true);
      die();

      // WE CHECK IF PASSWORD IS EMPTY AND IF SO, WE REDIRECT WITH FLASH MESSAGE CLASS FROM CONFIG
    } elseif (empty($password)) {

      $msg->error('Login error: password empty!', "$url", true);
      die();

      // OTHERWISE WE LAUNCH THE CODE
    } else {

      // SQL QUERY WHICH GETS ID, EMAIL AND HASHED PASSWORD FROM DB BASED ON INSERTED EMAIL
      $login_check = $connection->prepare("
      SELECT id, email, password
      FROM users
      WHERE email = :email
      ");

      //WE BIND OUR EMAIL CONDITION TO OUR INSERTED EMAIL BY USER, THEN WE WXECUTE AND FETCH IN ARRAY
      $login_check->bindParam(":email", $email);
      $login_check->execute();
      $login = $login_check->fetch(PDO::FETCH_ASSOC);

      // IF ITS EMPTY THEN WE REDIRECT BACK
      if (!$login) {

        $msg->error('Login error: wrong username or password!', "$url", true);
      } else {

        // IF EMAIL IS MATCHING AND PASSWORD IS VERIFIED WE START THE SESSION AND SAVE DATA TO SESSION
        if ($email == $login['email'] && password_verify($password, $login['password'])) {

          // STARTING SESSION
          session_start();

          // SAVE SESSION VARIABLES THAT WE WORK WITH LATER
          $_SESSION['id'] = $login['id'];
          $_SESSION['email'] = $login['email'];

          // WE REDIRECT BACK WITH SUCCESSFUL MESSAGE
          $msg->success('Login successful!', "$url", true);

          // OTHERWISE WE REDIRECT BACK WITH ERROR
        } else {
          $msg->error('Login error: wrong username or password!', "$url", true);
        }
      }
    }
  }
  // IF USER DID NOT COME FROM FORM, GIVE HIM ERROR MESSAGE
} else {
  header("Location: $url/error");
  die();
}
