<?php


if (is_admin($connection, $_SESSION['id'])) {

  $title = "Zmaturuj.me | Generate account";
  include_once "parts/header.php"; ?>

  <main class="website-content">
    <h1>Welcome admin</h1>
    <h2>Here you can generate accounts!</h2>
    <form action="/zmaturuj.me/generate-account" method="post">

      <input type="email" name="email" placeholder="Enter valid e-mail" required class="nameInput">

      <button type="submit" name="submit" class="buttonInput">Generate</button>

    </form>
  </main>

<?php

  include_once "parts/footer.php";
} else {
  header("Location: $url");
}
?>