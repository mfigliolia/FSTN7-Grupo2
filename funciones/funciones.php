<?php
function validarInformacion($datos) {

  foreach ($datos as $key => $value) {
    $datos[$key] = trim($value);
  }

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
  } elseif (dameMail($datos['email']) != NULL) {
    $errores['email'] = "Este email ya existe";
  }

  if (strlen($datos['contrasena']) < 8 || strlen($datos['contrasena_confirm']) < 8) {
    $errores['contrasena'] = "Ingresá una contraseña de 8 caracteres" ;
  } else if ($datos['contrasena'] != $datos['contrasena_confirm']) {
    $errores['contrasena'] = "Las contraseñas no coinciden";
  }

  if (trim($datos['ciudad']) == '') {
    $errores['ciudad'] = "Debés ingresar una ciudad";
  }

  if ($_FILES['avatar']['error'] == UPLOAD_ERR_NO_FILE) {
    $errores['avatar'] = 'Debés cargar una imagen de perfil';
  }

  return $errores;
}

function crearUsuario($datos) {
  $usuario = [
    "nombre" => $datos['nombre'],
    "apellido" => $datos['apellido'],
    "email" => $datos['email'],
    "contrasena" => password_hash($datos['contrasena'], PASSWORD_DEFAULT),
    "ciudad" => $datos['ciudad'],
    "id" => traerNuevoID()
  ];

  return $usuario;
}

function guardarUsuario($usuario) {

  $json = json_encode($usuario);
  file_put_contents("JSON/usuarios.json", $json . PHP_EOL, FILE_APPEND);
}

function dameTodos() {
  $contenido = file_get_contents("JSON/usuarios.json");

  $usuariosJSON = explode(PHP_EOL, $contenido);

  array_pop($usuariosJSON);

  $usuariosFinal = [];

  foreach ($usuariosJSON as $usuario) {
    $usuariosFinal[] = json_decode($usuario, true);
  }

  return $usuariosFinal;
}

function dameMail($mail) {
  $todos = dameTodos();

  foreach ($todos as $usuario) {
    if ($usuario['email'] == $mail) {
      return $usuario;
    }
  }

  return NULL;
}

function dameId($id) {
  $todos = dameTodos();

  foreach ($todos as $usuario) {
    if ($usuario['id'] == $id) {
      return $usuario;
    }
  }

  return NULL;
}

function traerNuevoID() {
  $todos = dameTodos();

  if (count($todos) == 0) {
    return 1;
  }

  $elUltimo = array_pop($todos);

  return $elUltimo['id'] + 1;
}

function guardarImagen($usuario) {

  $errores = [];
  $id = $usuario['id'];

	if ($_FILES['avatar']["error"] == UPLOAD_ERR_OK)
	{
		$nombre=$_FILES['avatar']["name"];
		$archivo=$_FILES['avatar']["tmp_name"];

		$ext = pathinfo($nombre, PATHINFO_EXTENSION);

    if ($ext != "jpg" && $ext != "png" && $ext != "jpeg") {
      $errores['avatar'] = "Solo acepto formatos jpg y png";
      return $errores;
    }

		$miArchivo = dirname(__FILE__);

		$miArchivo = $miArchivo . "/JSON/avatars/";

    $miArchivo = $miArchivo. "perfil" . $id . "." . $ext;

		move_uploaded_file($archivo, $miArchivo);
	} else {
    $errores['avatar'] = "Hubo un error al procesar el archivo";
  }

  return $errores;
}

//----------------------------------//

function validarLogin($datos)
{
    $errores = [];

    if (strlen($datos['email']) == 0) {
      $errores['email'] = "Debés ingresar un email";
    } elseif (!filter_var($datos['email'], FILTER_VALIDATE_EMAIL)) {
        $errores[] = 'El email es invalido';
    }

    if (empty($datos['contrasena'])) {
        $errores[] = 'Ingrese un password';
    }

    return $errores;
}

function loguear($datos)
{
    $usuario = dameMail($datos['email']);
    if (!$usuario) {
        return ['Este email no existe en nuestra base de datos'];
    }

    if (!password_verify($datos['contrasena'], $usuario['contrasena'])) {
        return ['La contraseña es incorrecta'];
    }

    unset($usuario['contrasena']);
    $_SESSION['nombre'] = $usuario;

    if (isset($datos['recordarme'])) {
        setcookie('name', $usuario['id'], time() + 60 * 60 * 24 * 365 * 5);
    }
}
