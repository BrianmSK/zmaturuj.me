<!DOCTYPE html>
<html lang="sk-SK">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="_partials/css/normalize.css?ver=<?php echo filemtime("_partials/css/normalize.css") ?>">
  <link rel="stylesheet" href="_partials/css/main.css?ver=<?php echo filemtime("_partials/css/main.css") ?>">
  <title>Domov</title>
</head>

<body>
  <main class="website-content">
    <h1>Prihlásenie</h1>
    <form action="login_form.php" method="POST">
      <div class="container">
        <input type="text" placeholder="Zadajte vase prihlasovacie meno" required class="nameInput">

        <input type="password" placeholder="Zadajte heslo" required class="passwordInput">

        <button type="submit">Prihlásenie</button>

        <label>
          <input type="checkbox" checked="checked" name="remember"> Zapamätajte si ma
        </label>
      </div>
    </form>
  </main>

  <footer class="footer">
    <h2>Made with <3 by Denis and Samuel</h2>
  </footer>

</body>

</html>