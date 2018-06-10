<?php

/*
$nombreD = $_POST["nombre"];
$apellidoD = $_POST["apellido"];
$emailD = $_POST["email"];
$ciudadD = $_POST["ciudad"];
*/
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

  <body>
    <header>
    
    <a href="index.php">
      <img src="images/logos/logo.png" atl="logo">
    </a>

    <nav class="login-nav">
      <a href="index.php">Volver a pagina principal</a>
    </nav>
    </header>

    <div class="box_fill_in">
          <div class="login-user-container">
              <h1>Bienvenido!<br>Por favor completá tus datos:</h1>
          <!--</div>-->
          <div class="register-user">
            <form action="validaciones.php" method="post" enctype="multipart/form-data">
                <label for="nombre">Nombre:</label>
                <input placeholder="Ingresá tu nombre"type="text" name="nombre">
                <br>
                <label for="apellido">Apellido:</label>
                <input placeholder="Ingresá tu apellido"type="text" name="apellido">
                <br>
                <label for="email">E-mail:</label>
                <input placeholder="Ingresá tu email"type="text" name="email">
                <br>
                <label for="clave">Contraseña:</label>
                <input placeholder="Ingresá tu clave" type="password" name="contrasena">
                <br>
                <label for="clave">Confirmá contraseña:</label>
                <input placeholder="Confirmá tu clave" type="password" name="contrasena_confirm">
                <br>
                <label for="ciudad">Ciudad:</label>
                <input placeholder="Ciudad" type="text" name="ciudad">
                <br>
                <input type="file" name="imgPerfil">
                <br>
                <input type="submit">
            </form>
          </div>
          </div>
      </div>

  </main>

  </body>
</html>
