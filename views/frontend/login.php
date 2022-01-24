<?php

$title = "Zmaturuj.me | Login page";

include_once "parts/header.php"; ?>

<main class="website-content">
  <?php $msg->display(); ?>
  <h1>Prihlásenie</h1>
  <form action="../zmaturuj.me/views/auth/login_form.php" method="post">
    <input type="text" name="email" placeholder="Zadajte vaše prihlasovacie meno" required class="nameInput">

    <input type="password" name="password" placeholder="Zadajte heslo" required class="passwordInput">

    <button type="submit" name="submit" class="buttonInput">Prihlásenie</button>

  </form>
</main>

<?php include_once "parts/footer.php"; ?>