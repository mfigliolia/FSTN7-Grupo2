<<<<<<< HEAD
<?php
session_start();

require_once ('funciones/auth.php');
require_once ('repositorios/usuarios.php');

if (!isLoggedIn())
{
	if (isset($_COOKIE['user']))
	{
		$usuario = buscarUsuario('id', $_COOKIE['user']);
		unset($usuario['contrasena']);
		$_SESSION['user'] = $usuario;
	}
}
?>
=======
<?php
session_start();

require_once ('funciones/auth.php');
require_once ('repositorios/usuarios.php');

if (!isLoggedIn())
{
	if (isset($_COOKIE['user']))
	{
		$usuario = buscarUsuario('id', $_COOKIE['user']);
		unset($usuario['contrasena']);
		$_SESSION['user'] = $usuario;
	}
}
?>
>>>>>>> 59eb4479753f621c9a5d0761f5eba73818a05bf1
