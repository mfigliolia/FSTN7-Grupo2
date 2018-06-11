<?php 
session_start();
$errores = [];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
    <title>Registrate en CELL.HOUSE</title>
  </head>
  <header>
    
    <a href="index.php">
      <img src="images/logos/logo.png" atl="logo">
    </a>

    <nav class="login-nav">
      <a href="index.php">Volver a pagina principal</a>
    </nav>
    </header>
  <body>
    <div class="box_fill_in">
          <div class="login-user-container">
              <h1>Error!</h1>
          <!--</div>-->
          <div class="register-user">
          <?php
          if ($_POST) {

          if (trim($_POST['nombre']) == '') {
            echo $errores[] = "• Debés ingresar un nombre" . '<br>';
          } elseif (strlen($_POST['nombre']) < 3) {
            echo $errores[] = "• El nombre debe tener más de 3 letras". '<br>';
          }

          if (trim($_POST['apellido']) == '') {
            echo $errores[] = "• Debés ingresar un apellido" . '<br>';
          }

          if (strlen($_POST['email']) == 0) {
            echo $errores[] = "• Debés ingresar un email" . '<br>';
          } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
            echo $errores[] = "• Ingresá un email válido" . '<br>';
          }

          if (strlen($_POST['contrasena']) < 8 || strlen($_POST['contrasena_confirm']) < 8) {
            echo $errores[] = "• Ingresá una contraseña de 8 caracteres" . '<br>';
          } else if ($_POST['contrasena'] != $_POST['contrasena_confirm']) {
            echo $errores[] = "• Las contraseñas no coinciden" . '<br>';
          }

          if (trim($_POST['ciudad']) == '') {
            echo $errores[] = "• Debés ingresar una ciudad" . '<br>';
          }

    }

    ?>

    <a href="registro.php"><input type="submit" value="Volver"></a>