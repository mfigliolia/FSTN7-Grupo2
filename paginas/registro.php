<?php
<<<<<<< HEAD:paginas/registro.php
require_once("../funciones.php");
=======
require_once("../funciones/funciones.php");
>>>>>>> 156ee6a7073b20dc3dda83e89b843b7ea829da22:paginas/registro.php
$errorNombre = '';
$errorApellido = '';
$errorMail = '';
$errorContrasena = '';
$errorCiudad = '';

$nombreD =  '';
$apellidoD =  '';
$emailD = '';
$ciudadD = '';

$errores = [];

if ($_POST) {

    $errores = validarInformacion($_POST);
    if (count($errores) == 0) {
      $usuario = crearUsuario($_POST);

      $erroresDeImagen = guardarImagen($usuario);

      $errores = array_merge($errores, $erroresDeImagen);
      
      if (count($errores) == 0) {
        guardarUsuario($usuario);
        session_start();
        $_SESSION['nombre'] = $_POST['nombre'];
<<<<<<< HEAD:paginas/registro.php
        header("location: login.php");
=======
        header("location: ../bienvenido.php");
>>>>>>> 156ee6a7073b20dc3dda83e89b843b7ea829da22:paginas/registro.php
      }
    }

    $nombreD = $_POST['nombre'];
    $apellidoD = $_POST['apellido'];
    $emailD = $_POST['email'];
    $ciudadD= $_POST['ciudad'];

    if (isset($errores['nombre'])) {
      $errorNombre = 'error';
    }

    if (isset($errores['apellido'])) {
      $errorApellido = 'error';
    }
    if (isset($errores['email'])) {
      $errorMail = 'error';
    }

    if (isset($errores['contrasena'])) {
      $errorContrasena = 'error';
    }

    if (isset($error['ciudad'])) {
      $errorCiudad = 'error';
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
    <title>:: CELL.HOUSE - REGISTRO</title>
  </head>

  <body>
    
    <?php include_once('../componentes/header-2.php'); ?>
    
    <div class="box_fill_in">
          <div class="login-user-container">
              <h1>Bienvenido!<br>Por favor completá tus datos:</h1>
          <!--</div>-->
        <?php
        if($errores) { ?>
          <div class="error-alert" style="background-color: rgb(240,240,240);">
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

          <div class="register-user">
            <form action="registro.php" method="post" enctype="multipart/form-data">
                <label for="nombre">Nombre:</label>
                <input class="<?=$errorNombre?>" placeholder="Ingresá tu nombre" type="text" name="nombre" id="nombre" value="<?=$nombreD?>">
                <br>
                <label for="apellido">Apellido:</label>
                <input class="<?=$errorApellido?>" placeholder="Ingresá tu apellido" type="text" name="apellido" id="apellido" value="<?=$apellidoD?>">
                <br>
                <label for="email">E-mail:</label>
                <input class="<?=$errorMail?>" placeholder="Ingresá tu email" type="text" name="email" id="email" value="<?=$emailD?>">
                <br>
                <label for="clave">Contraseña:</label>
                <input class="<?=$errorContrasena?>" placeholder="Ingresá tu clave" type="password" name="contrasena" id="contrasena">
                <br>
                <label for="clave">Confirmá contraseña:</label>
                <input placeholder="Confirmá tu clave" type="password" name="contrasena_confirm" id="contrasena_confirm">
                <br>
                <label for="ciudad">Domicilio:</label>
                <input class="<?=$errorCiudad?>" placeholder="Ingresá tu domicilio" type="text" name="ciudad" id="ciudad" value="<?=$ciudadD?>">
                <br>
                <input type="file" name="avatar" id="avatar">
                <br>
                <input type="submit">
            </form>
            <a href="login.php">Si ya tenés cuenta, logueate acá </a>
          </div>

          </div>
      </div>

  </main>

  </body>
</html>
