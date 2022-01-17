<!DOCTYPE html>
<html lang="sk-SK">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/zmaturuj.me/public/css/normalize.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="/zmaturuj.me/public/css/main.css">
  <title>Domov</title>

</head>

<body>
  <main class="website-content">
    <?php $msg->display(); ?>
    <h1>Prihlásenie</h1>
    <form action="/zmaturuj.me/views/backend/login_form.php" method="POST">
      <input type="text" placeholder="Zadajte vaše prihlasovacie meno" required class="nameInput">

      <input type="password" placeholder="Zadajte heslo" required class="passwordInput">

      <button type="submit" class="buttonInput">Prihlásenie</button>

      <label class="checkboxContainer">
        <input type="checkbox" checked="checked" name="remember" class="checkboxInput">
        Zapamätajte si ma
      </label>

    </form>
  </main>
  <footer class="footer">
    <h2>Made with <3 by Denis and Samuel</h2>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>