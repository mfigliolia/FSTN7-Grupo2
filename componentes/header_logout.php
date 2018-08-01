<?php 
    $usuarioLogueado = $auth->usuarioLogueado($db);
    $username = $usuarioLogueado->getNombre();
    $photopath = "uploads/" . $usuarioLogueado->getEmail() . ".JPG";
?>


<header>
<a href="index.php">
  <img src="images/logos/logo.png" atl="logo">
</a>

<div class="div-search">
    <form class="form-inline">
      <input class="form-control mr-sm-2" style="border-color: rgb(203,31,7); height: 35px; width: 100%;" type="search" placeholder="Buscar producto...">
     <!--<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>-->
    </form>
  </div>


<nav class="login-nav">
  <div class="dropdown">
      <button type="button" class="button-user">
        <img src="<?=$photopath;?>" style="width: 45px; border-radius: 50%;">
        <p style="color: white;"> <?php echo $username; ?> </p>
      </button>

      <div class="dropdown-content">
        <a href="perfil.php">Perfil</a>
        <a href="#">Historial de compras</a>
        <a href="logout.php">Cerrar Sesión</a>
      </div>
  </div>
  <a href="carrito.php"><img style="width: 25px;" src="images/logos/cart-empty.png" alt="carrito"></a>
</nav>
</header>