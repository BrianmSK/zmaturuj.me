<?php
include_once "../config/config.php";
include_once "../classes/reset.php";

$title = "Zmaturuj.me | Welcome";

include_once "parts/header.php";

if (isReset($connection, $_SESSION['id'])) {

?>
  <main class="website-content">
    <?= $msg->display(); ?>
    <h1>Please enter new password!</h1>
    <form action="../zmaturuj.me/views/auth/reset_password.php" method="post">

      <input type="password" name="password" placeholder="Zadajte heslo" required class="passwordInput">

      <input type="password" name="password-verify" placeholder="Zopakujte heslo" required class="passwordInput">

      <button type="submit" name="submit" class="buttonInput">Change</button>

    </form>
  </main>

<?php

} else {
?>
  <main class="website-content">
    <?= $msg->display(); ?>
    <h1>Welcome</h1>
    <h2>
      <a href="/zmaturuj.me/?logout=true">Log out</a>
    </h2>
  </main>
<?php
}
include_once "parts/footer.php";
?>