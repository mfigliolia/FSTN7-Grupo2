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
              <h1>REGISTRO EXITOSO!</h1>
          <!--</div>-->
          <p style="color: white;">Bienvenido, <?php echo $_SESSION['nombre']?>, a la comunidad de Cell House</p>
          </div>
       </div>
  <a href="paginas/login.php" style="padding-left: 520px;"><input type="submit" value="Empezá a navegar"></a>  
  </body>
