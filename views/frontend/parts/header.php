<!DOCTYPE html>
<html lang="sk-SK">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php if (str_contains($title, "404")) {
    echo '<meta http-equiv="refresh" content="5;url=/zmaturuj.me/" />';
  } ?>
  <meta http-equiv="Content-Security-Policy" content="default-src 'none'; script-src 'self' cdn.jsdelivr.net; connect-src 'self'; img-src 'self'; style-src 'self' cdn.jsdelivr.net fonts.googleapis.com;base-uri 'self';form-action 'self'; font-src 'self' fonts.gstatic.com">
  <link rel="shortcut icon" href="/zmaturuj.me/public/media/favicon.png" type="image/png">
  <link rel="stylesheet" type="text/css" href="/zmaturuj.me/public/css/normalize.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="/zmaturuj.me/public/css/main.css">
  <title><?= $title; ?></title>

</head>

<body>