<?php
require_once('repositorios/usuarios.php');

function validarRegistro($datos)
{
    $errores = [];

    if (trim($datos['nombre']) == '') {
        $errores['nombre'] = "Debés ingresar un nombre";
      } elseif (strlen($datos['nombre']) < 3) {
        $errores['nombre'] = "El nombre debe tener más de 3 letras";
      }
  
      if (trim($datos['apellido']) == '') {
        $errores['apellido'] = "Debés ingresar un apellido";
      }
  
      if (strlen($datos['email']) == 0) {
        $errores['email'] = "Debés ingresar un email";
      } elseif (!filter_var($datos['email'], FILTER_VALIDATE_EMAIL) ) {
        $errores['email'] = "Ingresá un email válido";
      } elseif (buscarUsuario(EMAIL_FIELD, $datos['email'])) {
        $errores['email'] = "Este email ya existe";
      }
  
      if (strlen($datos['contrasena']) < 6 || strlen($datos['contrasena_confirm']) < 6) {
        $errores['contrasena'] = "Ingresá una contraseña de 6 caracteres" ;
      } else if ($datos['contrasena'] != $datos['contrasena_confirm']) {
        $errores['contrasena'] = "Las contraseñas no coinciden";
      }
  
      if (trim($datos['ciudad']) == '') {
        $errores['ciudad'] = "Debés ingresar un domicilio";
      }

    if ($_FILES['avatar']['error'] == UPLOAD_ERR_NO_FILE) {
        $errores['avatar'] = "Debés cargar una imagen de perfil";
    }

    return $errores;
}

function validarLogin($datos)
{
    $errores = [];

    if (strlen($datos['email']) == 0) {
      $errores[] = 'Debes ingresar un email';
    }
    elseif (!filter_var($datos['email'], FILTER_VALIDATE_EMAIL)) {
        $errores[] = 'El email ingresado no es válido';
    }

    
    if (empty($datos['contrasena'])) {
        $errores[] = 'Debes ingresar un password';
    }

    return $errores;
}

function validarEmail($datos)
{
    $email = "";

    if (!filter_var($datos['email'], FILTER_VALIDATE_EMAIL))
    {
        $email = "El formato del e-mail es inválido";
    }
    elseif ((buscarUsuario(EMAIL_FIELD, $datos['email']))==FALSE)
    {   
        $email = "El e-mail ingresado no existe en nuestra base de datos";
    }
    return $email;
}
