<?php

// CHECK IF USER IS ADMIN
if (is_admin($connection, $_SESSION['id'])) {

  // SETS TITLE FOR HEADER
  $title = "Zmaturuj.me | Generate account";

  // INCLUDES HEADER
  include_once "parts/header.php"; ?>

  <header>
    <a href="<?= $url ?>">Go back</a>
  </header>
  <main class="website-content">
    <h1>Welcome admin</h1>
    <h2>Here you can generate accounts!</h2>
    <form action="/zmaturuj.me/generate-account" method="post">

      <input type="email" required name="email" placeholder="Enter valid e-mail" class="input">

      <button type="submit" name="submit" class="buttonInput">Generate</button>

    </form>
  </main>

<?php

  //INCLUDE FOOTER
  include_once "parts/footer.php";

  // OTHERWISE REDIRECT HIM BACK
} else {
  header("Location: $url");
}
?>