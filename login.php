<?php session_start() ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
    <title>Ingresá en CELL.HOUSE</title>
  </head>
  <body>
    <main class="container">
        <header>

        <a href="index.php">
            <img src="images/logos/logo.png" atl="logo">
        </a>

        <nav class="login-nav">
          <a href="index.php">Volver a pagina principal</a>
        </nav>

        </header>

    <div class="container-login">
        <div class="login-user-container">
          <h1>Hola! Por favor, logueate <br> con tu email!</h1>
      <!--</div>-->
        <div class="login-user">
          <form action="" method="post">
            <input type="text" placeholder="Ingresá tu email..." name="email" style="border-color: rgb(203,31,7); height: 30px;">
            <br>
            <input type="password" placeholder="Ingresá tu contraseña... " name="contrasena" style="border-color: rgb(203,31,7); height: 30px;">
            <br>
            <input type="checkbox" class="checkbox" name="recordar">
            <label for="recordar">Recordarme en este sitio</label>
            <br>
          <input type="submit" name="LOGIN" value="LOGIN">
        </form>
        </div>
      </div>

    </div>

  </main>

  </body>
</html>
