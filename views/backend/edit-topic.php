<?php

// INCLUDE CONFIG
include_once '../config/config.php';

print_r($_POST);
// CHECKS IF WE GET SUBMITTED FROM POST AND IF IS ADMIN OR TEACHER
if (isset($_POST['submit']) && (is_admin($connection, $_SESSION['id']) || is_teacher($connection, $_SESSION['id']))) {

  // IF USER DOES NOT COME FROM FORM OR DOES NOT PASS CONDITIOn, WE REDIRECT TO ERROR PAGE
} else {
  header("Location: $url/error");
}
