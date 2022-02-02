<?php

// SETS HEADER TO 404
header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");

// SETS TITLE TO USE IT IN HEADER
$title = "Zmaturuj.me | 404 Ooopsie";

// INCLUDE HEADER
include_once "../views/frontend/parts/header.php"; ?>

<main class="website-content">
  <h1>Oopsie, you are on the wrong site :(</h1>
  <h2>Redirecting in 5 seconds...</h2>
</main>

<?php
// INCLUDE FOOTER
include_once "../views/frontend/parts/footer.php";
?>