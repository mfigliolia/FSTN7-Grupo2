<?php
require_once('repositorios/usuarios.php');

function validarRegistro($datos) {
  $errores = [];

  if(trim($datos['nombre']) == '') {
      $errores['nombre'] = 'Debe ingresar su nombre'
  }

  if (trim($datos['apellido']) == '') {
      $errores['apellido'] = 'Debe ingresar su apellido';
  }

  if (trim($datos['username']) == '') {
      $errores['username'] = 'Debe ingresar un usuario';
  } elseif (buscarUsuario(USERNAME_FIELD, $datos['username'])) {
      $errores['username'] = 'El usuario ingresado ya existe';
  }

  if (!filter_var($datos['email'], FILTER_VALIDATE_EMAIL)) {
      $errores['email'] = 'Debe ingresar un e-mail válido';
  } elseif ($datos['email'] != $datos['email_confirm']) {
      $errores['email_confirm'] = 'El e-mail y su confirmación deben coincidir';
  } elseif (buscarUsuario(EMAIL_FIELD, $datos['email'])) {
      $errores['email'] = 'El e-mail ingresado ya existe';
  }

  if (strlen($datos['contrasena']) < 6) {
      $errores['contrasena'] = 'La contraseña debe tener al menos 6 caracteres';
  } elseif ($datos['contrasena'] != $datos['contrasena_confirm']) {
      $errores['contrasena_confirm'] = 'La contraseña y su confirmación deben coincidir';
  }

  if ($_FILES['avatar']['error'] == UPLOAD_ERR_NO_FILE) {
      $errores['avatar'] = 'Debe cargar una imagen de perfil';
  }
}

//PARA DESPUÉS//


/* function validarLogin($datos)
{
    $arrayDeErrores = [];

    if (!filter_var($datos['email'], FILTER_VALIDATE_EMAIL)) {
        $arrayDeErrores[] = 'El email es invalido';
    }

    if (empty($datos['contrasena'])) {
        $arrayDeErrores[] = 'Ingrese un password';
    }

    return $arrayDeErrores;
}
*/
