<!DOCTYPE html>
<html lang="sk-SK">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Security-Policy" content="default-src 'none'; script-src 'self' cdn.jsdelivr.net; connect-src 'self'; img-src 'self'; style-src 'self' cdn.jsdelivr.net fonts.googleapis.com;base-uri 'self';form-action 'self'; font-src 'self' fonts.gstatic.com">
  <link rel="shortcut icon" href="/zmaturuj.me/public/media/favicon.png" type="image/png">
  <link rel="stylesheet" type="text/css" href="/zmaturuj.me/public/css/normalize.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="/zmaturuj.me/public/css/main.css">
  <title>Domov</title>

</head>

<body>
  <main class="website-content">
    <?php $msg->display(); ?>
    <h1>Welcome</h1>
    <h2>
      <a href="/zmaturuj.me/?logout=true">Log out</a>
    </h2>
  </main>
  <footer class="footer">
    <h2>Made with <3 by Denis and Samuel</h2>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>