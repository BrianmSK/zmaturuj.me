<?php
include_once "../config/config.php";
include_once "../classes/is_reset.php";

$title = "Zmaturuj.me | Reset Password";

include_once "parts/header.php";

if (isset($_SESSION['id'])) {
  if (isReset($connection, $_SESSION['id'])) {
    $reset_hash_check = $connection->prepare("
    SELECT reset_hash
    FROM users
    WHERE id = :id ");
    $reset_hash_check->bindParam(":id", $_SESSION['id']);
    $reset_hash_check->execute();
    $reset_hash_result = $reset_hash_check->fetch(PDO::FETCH_ASSOC);
  }
} elseif (isset($_GET['reset-password'])) {
  $reset_hash_check = $connection->prepare("
  SELECT reset_hash
  FROM users
  WHERE reset_hash = :reset_hash_user ");
  $reset_hash_check->bindParam(":reset_hash_user", $_GET['reset-password']);
  $reset_hash_check->execute();
  $reset_hash_result = $reset_hash_check->fetch(PDO::FETCH_ASSOC);
  if ($_GET['reset-password'] != $reset_hash_result['reset_hash']) {
    $msg->error('Error resetting password, hashes do not match!', 'http://localhost/zmaturuj.me/', true);
  } else {
    /*NOTHING HAPPENS*/
  }
} else {
  $msg->error('Error resetting password, ID and hash do not match!', 'http://localhost/zmaturuj.me/', true);
}
?>
<main class="website-content">
  <?= $msg->display(); ?>
  <h1>Please enter new password!</h1>
  <form action="../zmaturuj.me/views/auth/reset_password.php" method="post">

    <input type="password" name="password" placeholder="Zadajte heslo" required class="passwordInput">

    <input type="password" name="password-verify" placeholder="Zopakujte heslo" required class="passwordInput">
    <input type="hidden" name="hash" value="<?php print($reset_hash_result['reset_hash']); ?>">
    <button type="submit" name="submit" class="buttonInput">Change</button>

  </form>
</main>

<?php
include_once "parts/footer.php";
?>