<?php
require_once("../funciones/funciones.php");
$errores = [];

if ($_POST) {

    $errores = validarLogin($_POST);

    if (!$errores) {
      $errores = loguear($_POST);

      if (!$errores) {
        header('location: indexlogin.php');exit;
      }
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
    <title>:: CELL.HOUSE - LOGIN</title>
  </head>

  <body>
    <main class="container">
        
    <?php include_once('../componentes/header-2.php'); ?>    

    <div class="container-login">
        <div class="login-user-container">
          <h1>Hola! Por favor, logueate <br> con tu email!</h1>
      <!--</div>-->
      <?php
      if($errores) { ?>
        <div class="error-alert" style="background-color: rgb(240,240,240); height: 120px;">
          <div><strong>Ups...</strong></div>
          <ul style="color: rgb(203,31,7);">
              <?php
              foreach($errores as $error) {
              ?>
                  <li><?php echo $error ?></li>
              <?php } ?>
          </ul>
        </div>
      <?php } ?>

        <div class="login-user">
          <form action="" method="post">
            <input type="text" placeholder="Ingresá tu email..." name="email" style="border-color: rgb(203,31,7); height: 30px;" value="<?php echo ($_POST['email'] ?? '') ?>">
            <br>
            <input type="password" placeholder="Ingresá tu contraseña... " name="contrasena" style="border-color: rgb(203,31,7); height: 30px;">
            <br>
            <input type="checkbox" class="checkbox" name="recordarme">
            <label for="recordarme">Recordarme en este sitio</label>
            <br>
          <input type="submit" name="LOGIN" value="LOGIN">
        </form>

        <a href="registro.php"> Si no tenés cuenta, registrate acá </a>

        </div>
      </div>

    </div>

  </main>
  </body>
</html>
