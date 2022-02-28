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
          <label for="bachelor" id="bachelorLabel">Bachelor</label>
          <input type="radio" name="degree" id="masters" value="Masters">
          <label for="masters" id="mastersLabel">Masters</label>
        </div>
        <button type="submit" name="submit" class="buttonInput">Odoslať</button>
      </form>
      <form action="<?= $url ?>/edit-topic" method="post">
        <h2>Edit degree topic</h2>
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