<?php 
    
    include_once('loader.php');
    require_once('classes/Usuario.php');
    // require_once('global.php'); 
    // require_once('funciones/validaciones.php');
    // require_once('funciones/auth.php');

    $nombreD =  '';
    $apellidoD =  '';
    $emailD = '';
    $domicilioD = '';

    $errores = [];

    if ($_POST) {

        $errores = $validator->validarInformacion($_POST, $db);
        // $errores = validarRegistro($_POST);


        if (!isset($errores['nombre'])) {
          $nombreD = $_POST['nombre'];
        }

        if (!isset($errores['apellido'])) {
          $apellidoD = $_POST['apellido'];
        }
        if (!isset($errores['email'])) {
          $emailD = $_POST['email'];
        }

        if (!isset($error['domicilio'])) {
          $domicilioD= $_POST['domicilio'];
        }

        if (count($errores) == 0) {
          
          $usuario = new Usuario($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['contrasena'], $_POST['domicilio']);

          //var_dump($usuario); exit;
          $usuario->guardarImagen($usuario->getEmail());
          $usuario = $db->guardarUsuario($usuario);

          //var_dump($usuario); exit;

          $auth->login($_POST['email']);
          header("location: login.php");
          exit;
        }
    }
  
    //if($auth->loginControl()) {
    //    header("location: index.php");
    //}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php $pageTitle = ':: Registro - CELL.HOUSE';
  include_once('componentes/head.php'); ?>

  <body>
    
    <?php include_once('componentes/header_login.php'); ?>
    
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
                <label for="domicilio">Domicilio:</label>
                <input class="<?=$errorDomicilio?>" placeholder="Ingresá tu domicilio" type="text" name="domicilio" id="domicilio" value="<?=$domicilioD?>">
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
