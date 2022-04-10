<!DOCTYPE html>
<html lang="sk-SK">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php if (str_contains($title, "404")) {
    echo '<meta http-equiv="refresh" content="5;url=' . $url . '/" />';
  } ?>
  <link rel="shortcut icon" href="<?= $url ?>/public/media/favicon.png" type="image/png">
  <link rel="stylesheet" type="text/css" href="<?= $url ?>/public/css/normalize.css?ver=<?php echo filemtime("../public/css/normalize.css") ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?= $url ?>/public/css/main.css?ver=<?php echo filemtime("../public/css/main.css") ?>">
  <title><?= $title; ?></title>

</head>

<body>
  <header>

    <a href="<?= $url ?>/">Homepage</a>
    <a href="<?= $url ?>/profile">Profile</a>
    <?php if (is_admin($connection, $_SESSION['id'])) { ?>
      <a href="<?= $url ?>/generate">Generate account</a>
      <a href="<?= $url ?>/manage-users">Manage users</a>
    <?php }
    if (is_teacher($connection, $_SESSION['id']) || is_admin($connection, $_SESSION['id'])) { ?>
      <a href="<?= $url ?>/topics">Manage topics</a>
    <?php } ?>
    <a href="<?= $url ?>/?logout=true">Log out</a>
  </header>