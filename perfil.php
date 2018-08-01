<?php include("loader.php");
  if (!$auth->loginControl()) 
  {
     header("Location: registro.php");
     exit;
  }
  
  $usuarioLogueado = $auth->usuarioLogueado($db);
  $username = $usuarioLogueado->getEmail();
  $photopath = "img/" . $usuarioLogueado->getEmail() . ".jpeg";
?>  

<?php require_once('componentes/head.php'); ?>

<h1>Perfil de <?php $_SESSION['user']['name']; ?> </h1>

<?php require_once('componentes/footer.php'); ?>