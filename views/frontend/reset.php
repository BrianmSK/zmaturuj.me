<?php

// IF WE HAVE SESSION ID SET, WE KNOW USER LOGGED AND WE NEED TO FORCE HIM TO RESET PASSWORD
if (isset($_SESSION['id'])) {

  // THEN WE NEED TO CHECK IF HE NEEDS TO REST HIS PASSWORD BY DB VALUE
  if (isReset($connection, $_SESSION['id'])) {

    // WITH QEURY BASED ON ID
    $reset_hash_check = $connection->prepare("
    SELECT reset_hash
    FROM users
    WHERE id = :id ");

    // THEN WE BIND PARAMETERS AND EXECUTE IT AND FETCH RESULT
    $reset_hash_check->bindParam(":id", $_SESSION['id']);
    $reset_hash_check->execute();
    $reset_hash_result = $reset_hash_check->fetch(PDO::FETCH_ASSOC);
  }

  // IF WE HAVE GET TAG SET FROM URL WE ARE GOING TO USE QUERY BASED ON HASH TO VERIFY
} elseif (isset($_GET['reset-password'])) {

  // HERE WE PREPARE QUERY BASED ON HASH FROM DB AND FROM URL
  $reset_hash_check = $connection->prepare("
  SELECT reset_hash
  FROM users
  WHERE reset_hash = :reset_hash_user ");

  // HERE WE BIND THE PARAMETER FROM URL TO OUR QUERY AND EXECUTE IT, FETCH IT DUE TO CHECKS
  $reset_hash_check->bindParam(":reset_hash_user", $_GET['reset-password']);
  $reset_hash_check->execute();
  $reset_hash_result = $reset_hash_check->fetch(PDO::FETCH_ASSOC);

  // IF HASH FROM URL DOESNT EQUAL TO ONE IN DB, REDIRECT BACK TO HOMEPAGE
  if ($_GET['reset-password'] != $reset_hash_result['reset_hash']) {
    $msg->error('Error resetting password!', "$url", true);
  } // OTHERWISE NOTHING HAPPENS

  // IF HASH NOR ID EQUAL WE REDIRECT BACK TO HOMEPAGE 
} else {
  $msg->error('Error resetting password!', "$url", true);
}

// IF WE HAVE RESET IN DB OR IN URL HASH WE ARE GOING TO SHOW CONTENT
// OTHERWISE NOT
if (isReset($connection, $_SESSION['id']) || isset($_GET['reset-password'])) {

  // THEN WE SET TITLE AND INCLUDE CONFIG, SHOW CONTENT
  $title = "Zmaturuj.me | Reset Password";
  include_once "parts/header.php";

?>

  <main class="website-content">
    <?= $msg->display(); ?>
    <h1>Please enter new password!</h1>
    <form action="/zmaturuj.me/reset-password" method="post">

      <input type="password" name="password" placeholder="Zadajte heslo" required class="passwordInput">

      <input type="password" name="password-verify" placeholder="Zopakujte heslo" required class="passwordInput">
      <input type="hidden" name="hash" value="<?php print($reset_hash_result['reset_hash']); ?>">
      <button type="submit" name="submit" class="buttonInput">Change</button>

    </form>
  </main>

<?php
  // HERE WE INCLUDE FOOTER
  include_once "parts/footer.php";

  // OTHERWISE WE REDIRECT BACK TO HOMEPAGE
} else {
  header("Location: $url");
}
?>