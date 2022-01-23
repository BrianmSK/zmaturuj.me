<?php
require_once '../config/config.php'; // INCLUDE CONFIG
include_once("../classes/is_admin.php"); // INCLUDE IS ADMIN FUNCTION

if (is_admin($connection, $_SESSION['id'])) {
} else {
  header("Location: /zmaturuj.me/error");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Security-Policy" content="default-src 'none'; script-src 'self' cdn.jsdelivr.net; connect-src 'self'; img-src 'self'; style-src 'self' cdn.jsdelivr.net fonts.googleapis.com;base-uri 'self';form-action 'self'; font-src 'self' fonts.gstatic.com">
  <link rel="shortcut icon" href="/zmaturuj.me/public/media/favicon.png" type="image/png">
  <title>Zmaturuj.me Account Generator</title>
</head>

<body>
  <h1>Welcome admin</h1>
  <h2>Here you can generate accounts!</h2>
  <form action="../zmaturuj.me/views/backend/generate-account.php" method="post">
    <input type="email" name="email" placeholder="Write e-mail">
    <input type="submit" name="submit" value="Generate"></input>
  </form>
</body>

</html>