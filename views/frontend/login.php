<!DOCTYPE html>
<html lang="sk-SK">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="/zmaturuj.me/public/media/favicon.png" type="image/png">
  <link rel="stylesheet" type="text/css" href="/zmaturuj.me/public/css/normalize.css?ver=<?php echo filemtime("../public/css/normalize.css") ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="/zmaturuj.me/public/css/main.css?ver=<?php echo filemtime("../public/css/main.css") ?>">
  <title>Zmaturuj.me | Login page</title>

</head>

<body>

  <main class="website-content">
    <?php $msg->display(); ?>
    <h1>Prihlásenie</h1>
    <form action="/zmaturuj.me/login" method="post">
      <input type="text" name="email" placeholder="Zadajte vaše prihlasovacie meno" required class="input">

      <input type="password" name="password" placeholder="Zadajte heslo" required class="input">

      <button type="submit" name="submit" class="buttonInput">Prihlásenie</button>

    </form>
  </main>

  <?php
  // INCLUDE FOOTER
  include_once "parts/footer.php";
  ?>