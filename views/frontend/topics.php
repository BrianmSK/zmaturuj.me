<?php

// CHECK IF USER IS LOGGED
if (is_teacher($connection, $_SESSION['id']) || is_admin($connection, $_SESSION['id'])) {

  // SETS TITLE FOR HEADER
  $title = "Zmaturuj.me | Degree topics management";

  // INCLUDE HEADER
  include_once "parts/header.php";

?>


  <main class="website-content">
    <?= $msg->display(); ?>
    <div class="flexRow flexCenter">
      <form action="<?= $url ?>/add-topic" method="post">
        <h2>Add degree topic</h2>
        <input type="text" name="examName" placeholder="Name of exam" class="input" id="addNameOfTopic">
        <textarea name="examContent" class="input" placeholder="Enter content of exam" id="addContentOfTopic"></textarea>
        <div class="flexRow marginBottom1">
          <input type="radio" name="degree" id="bachelor" value="Bachelor">
          <label for="bachelor" class="marginRight2">Bachelor</label>
          <input type="radio" name="degree" id="masters" value="Masters">
          <label for="masters" class="marginRight2">Masters</label>
        </div>
        <button type="submit" name="submit" class="buttonInput">Odoslať</button>
      </form>
      <form action="<?= $url ?>/edit-topic" method="post">
        <h2>Edit degree topic</h2>
        <?php
        # IF USER IS TEACHER SHOW HIS CLASSES TO EDIT
        if (is_teacher($connection, $_SESSION['id'])) {

          # PREPARE DB CONNECTION BASED ON ID CONDITION
          $topics = $connection->prepare("
            SELECT *
            FROM exam_topics
            WHERE teacher_id = :id
          ");

          # BIND ID PARAM FROM SESSION
          $topics->bindParam(":id", $_SESSION['id']);

          #IF USER IS ADMIN SHOW EVERYTHING
        } elseif (is_admin($connection, $_SESSION['id'])) {

          #PREPARE DB CONNECTION TO CATCH EVERYTHING
          $topics = $connection->prepare("
            SELECT *
            FROM exam_topics
          ");
        }

        #EXECUTE THE QUERY
        $topics->execute();

        #FETCH THE RESULT FROM QUERY
        $topics_result = $topics->fetchAll(PDO::FETCH_ASSOC);

        # LOOP TO OUTPUT ALL EDITABLE DEGREE TOPICS
        $counter = 0;
        foreach ($topics_result as $result) {
          echo '<div class="flexRow degreeTopic">';
          echo '<div class="flexColumn">';
          echo '<label for="examName' . $counter . '">Nazov prace</label>';
          echo '<input id="examName' . $counter . '" value="' . $result['exam_name'] . '" class="input"></input>';
          echo '</div>';
          echo '<div class="flexColumn">';
          echo '<label for="examContent' . $counter . '">Obsah prace</label>';
          echo '<input id="examContent' . $counter . '" value="' . $result['exam_content'] . '" class="input"></input>';
          echo '</div>';
          echo '<p>Typ prace:' . $result['degree_type'] . '</p>';
          echo '<button type="submit" name="submit" class="buttonInput">Odoslať</button>';
          echo '</div>';
          $counter++;
        }
        ?>
      </form>
    </div>
  </main>

<?php

  // INCLUDE FOOTER
  include_once "parts/footer.php";

  // OTHERWISE REDIRECT TO HOMEPAGE
} else {
  header("Location: $url/error");
}
?>