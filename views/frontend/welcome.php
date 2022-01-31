<?php

if (is_logged()) {

  $title = "Zmaturuj.me | Welcome";

  include_once "parts/header.php";

?>
  <main class="website-content">
    <?= $msg->display(); ?>
    <h1>Welcome</h1>
    <h2>
      <a href="/zmaturuj.me/?logout=true">Log out</a>
    </h2>
  </main>

<?php
  include_once "parts/footer.php";
} else {
  header("Location: $url");
}
?>