<?php
require_once('repositorios/usuarios.php');

function registrar($datos)
{
    $errores = [];

    $datos['contrasena'] = password_hash($datos['contrasena'], PASSWORD_DEFAULT);

    $avatar = guardarArchivo(uniqid());
    if ($avatar == false)
    {
        $errores[] = 'Ocurrió un error al subir la imagen de perfil';
        return $errores;
    }
    $datos['avatar'] = $avatar;

    
    unset($datos['contrasena_confirm']);

    guardarUsuario($datos);
}

function guardarArchivo($filename)
{
    
    if ($_FILES["avatar"]["error"] === UPLOAD_ERR_OK)
    {
        
        $nombre = $_FILES["avatar"]["name"];
    
        $archivo = $_FILES["avatar"]["tmp_name"];
        
        $ext = pathinfo($nombre, PATHINFO_EXTENSION);

        $path = pathinfo($_SERVER['SCRIPT_FILENAME'], PATHINFO_DIRNAME) . "/uploads/$filename.$ext";

        
        move_uploaded_file($archivo, $path);

       
        return "$filename.$ext";
    }

    return false;
}

function loguear($datos)
{

    $usuario = buscarUsuario(EMAIL_FIELD, $datos['email']);
    if (!$usuario)
    {
        return ['El email no existe en nuestra base de datos'];
    }

    if (!password_verify($datos['contrasena'], $usuario['contrasena']))
    {
        return ['La contraseña es incorrecta'];
    }

    unset($usuario['contrasena']);
    $_SESSION['user'] = $usuario;

    if (isset($datos['recordarme']))
    {
        setcookie('user', $usuario['id'], time() + 60 * 60 * 24 * 365);
    }
}

function isLoggedIn()
{
    return isset($_SESSION['user']);
}

function logout()
{
    unset($_SESSION['user']);
    session_destroy();
    setcookie('user', '', time() * -1);
}