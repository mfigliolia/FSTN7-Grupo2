<?php
require_once('json.php');

define('USUARIOS_KEY', 'usuarios');
define('EMAIL_FIELD', 'email');
define('USERNAME_FIELD', 'username');

function guardarUsuario($datos)
{
    $usuarios = obtenerContenido(USUARIOS_KEY);

    $datos['id'] = count($usuarios) + 1;

    $usuarios[] = $datos;

    guardarContenido(USUARIOS_KEY, $usuarios);
}

function buscarUsuario($campo, $valor)
{
    
    $usuarios = obtenerContenido(USUARIOS_KEY);

    foreach ($usuarios as $usuario)
    {

        if ($usuario[$campo] == $valor) {
            return $usuario;
        }
    }

    return false;
}
