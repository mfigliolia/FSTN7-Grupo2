<?php require_once('global.php'); ?>

<?php require_once('funciones/auth.php');

logout();

header('location: index.php');
exit;