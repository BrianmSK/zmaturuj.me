<?php

$title = "Zmaturuj.me | Login page";

include_once "parts/header.php"; ?>

<main class="website-content">
  <?php $msg->display(); ?>
  <h1>Prihlásenie</h1>
  <form action="/zmaturuj.me/login" method="post">
    <input type="text" name="email" placeholder="Zadajte vaše prihlasovacie meno" required class="input">

    <input type="password" name="password" placeholder="Zadajte heslo" required class="input">

    <button type="submit" name="submit" class="buttonInput">Prihlásenie</button>

  </form>
</main>

<?php include_once "parts/footer.php"; ?>