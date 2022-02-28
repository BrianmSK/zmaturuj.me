<?php

// INCLUDE CONFIG
include_once '../config/config.php';

// CHECKS IF WE GET SUBMITTED FROM POST AND IF IS ADMIN OR TEACHER
if (isset($_POST['submit']) && (is_admin($connection, $_SESSION['id']) || is_teacher($connection, $_SESSION['id']))) {

  # If name or content are empty redirect back
  if (empty($_POST['examName']) || empty($_POST['examContent'])) {
    $msg->error("Empty name or content of exam", "$url/topics", true);
    # otherwise save variables and prevent injection
  } else {
    $examName = htmlspecialchars($_POST['examName']);
    $examContent = htmlspecialchars($_POST['examContent']);
    $degreeType =  strtolower(htmlspecialchars($_POST['degree']));
    # check if there is no manipulating with form values
    if ($degreeType != "bachelor" && $degreeType != "masters") {
      $msg->error("Incorrect or missing degree type", "$url/topics", true);
      die();
    }
    #prepare connection to db and insert values
    $addExam = $connection->prepare("
    INSERT INTO exam_topics (teacher_id, exam_name, exam_content, degree_type)
    VALUES (:teacher_id, :exam_name, :exam_content, :degree_type)
    ");
    # bind php variables to db variables
    $addExam->bindParam(":teacher_id", $_SESSION['id']);
    $addExam->bindParam(":exam_name", $examName);
    $addExam->bindParam(":exam_content", $examContent);
    $addExam->bindParam(":degree_type", $degreeType);
    $addExam->execute();
    #redirect back
    $msg->success("Successfully added", "$url/topics", true);
  }

  // IF USER DOES NOT COME FROM FORM OR DOES NOT PASS CONDITIOn, WE REDIRECT TO ERROR PAGE
} else {
  header("Location: $url/error");
}
