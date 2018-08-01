<?php //require_once('global.php'); require_once('funciones/auth.php');

require("loader.php");

$auth->logout();

//logout();

header('location: index.php');
exit;