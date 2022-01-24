<?php
header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
$title = "Zmaturuj.me | 404 Ooopsie";
include_once "../views/frontend/parts/header.php"; ?>

<main class="website-content">
  <h1>Oopsie, you are on the wrong site :(</h1>
  <h2>Redirecting in 5 seconds...</h2>
</main>

<?php include_once "../views/frontend/parts/footer.php"; ?>