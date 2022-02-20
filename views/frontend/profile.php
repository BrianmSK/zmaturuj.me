<?php

if (is_logged()) {

  $title = "Zmaturuj.me | User profile";

  include_once "parts/header.php";

  // QUERY TO GET VALUES FOR FORM
  $profile_values = $connection->prepare("
  SELECT firstname, lastname, email
  FROM users
  WHERE id = :id
  ");
  $profile_values->bindParam(":id", $_SESSION['id']);
  $profile_values->execute();
  $profile_values_result = $profile_values->fetch(PDO::FETCH_ASSOC);
?>
  <main class="website-content">
    <?= $msg->display(); ?>
    <form action="<?= $url ?>/edit-profile" method="post">
      <input type="text" required name="firstname" placeholder="Meno" class="input" value="<?= $profile_values_result['firstname'] ?>">
      <input type="text" required name="lastname" placeholder="Priezvisko" class="input" value="<?= $profile_values_result['lastname'] ?>">
      <input type="email" required name="email" placeholder="E-mail" class="input" value="<?= $profile_values_result['email'] ?>">
      <input type="password" name="passwd" placeholder="Heslo" class="input">
      <input type="password" name="confirm_passwd" placeholder="Potvrdte heslo" class="input">
      <button type="submit" name="submit" class="buttonInput">Odoslať</button>
    </form>
  </main>

<?php
  include_once "parts/footer.php";
} else {
  header("Location: $url/error");
}
?>