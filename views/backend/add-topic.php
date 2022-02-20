<?php

// INCLUDE CONFIG
include_once '../config/config.php';

// CHECKS IF WE GET SUBMITTED FROM POST AND IF IS ADMIN OR TEACHER
if (isset($_POST['submit']) && (is_admin($connection, $_SESSION['id']) || is_teacher($connection, $_SESSION['id']))) {

  if (empty($_POST['examName']) || empty($_POST['examContent'])) {
    $msg->error("Empty name or content of exam", "$url/topics", true);
  } else {
    $examName = htmlspecialchars($_POST['examName']);
    $examContent = htmlspecialchars($_POST['examContent']);
    print_r($_POST);
    $addExam = $connection->prepare("
    INSERT INTO exam_topics (teacher_id, exam_name, exam_content)
    VALUES (:teacher_id, :exam_name, :exam_content)
    ");
    $addExam->bindParam(":teacher_id", $_SESSION['id']);
    $addExam->bindParam(":exam_name", $examName);
    $addExam->bindParam(":exam_content", $examContent);
    $addExam->execute();
  }

  // IF USER DOES NOT COME FROM FORM OR DOES NOT PASS CONDITIOn, WE REDIRECT TO ERROR PAGE
} else {
  header("Location: $url/error");
}
