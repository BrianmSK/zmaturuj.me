<?php

/* INCLUDES CONFIG INTO CLASS */
require_once '../config/config.php';

/*
FUNCTION TO CHECK IF USER IS TEACHER BY INSERTED ID
NEEDS A PDO CONNECTION
*/
function is_teacher(PDO $connection, $id)
{

  if (isset($id)) {

    /* SQL QUERY TO CHECK IF USER IS TEACHER */
    $isTeacherCheck = $connection->prepare("
      SELECT is_teacher
      FROM users
      WHERE id = :id
    ");

    /* THIS BINDS PHP VARIABLE TO SQL QUERY AND EXECUTES IT + FETCHES RESULT*/
    $isTeacherCheck->bindParam(":id", $id);
    $isTeacherCheck->execute();
    $isTeacher = $isTeacherCheck->fetch(PDO::FETCH_ASSOC);

    /* HERE WE CHECK FOR BOOL OUTPUT FROM DATABASE TO CHECK IF USER IS TEACHER */
    if ($isTeacher['is_teacher'] == true) {
      return true;
    } else {
      return false;
    }
  }
}
