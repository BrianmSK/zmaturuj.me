<?php

if (is_logged()) {

  $title = "Zmaturuj.me | Welcome";

  include_once "parts/header.php";

?>
  <header>
    <a href="<?= $url ?>/profile">Profile</a>
    <?php if (is_admin($connection, $_SESSION['id'])) { ?>
      <a href="<?= $url ?>/generate">Generate account</a>
    <?php } ?>
  </header>
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