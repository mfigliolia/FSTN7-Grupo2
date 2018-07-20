<header>
<a href="index.php">
  <img src="images/logos/logo.png" atl="logo">
</a>

<nav class="login-nav">
 <div class="button-nav">
   
    <button type="button" class="button-user">
      <img src="uploads/<?php echo $_SESSION['user']['avatar']; ?>" alt="avatar" style="width: 30px; border-radius: 50%;">
      <p style="color: white;"> <?php echo $_SESSION['user']['nombre']; ?> </p>
    </button>
    
    <div>
      <a href="logout.php">Cerrar Sesión</a>      
    </div>  
</div>
 <a href="carrito.php"><img style="width: 25px;" src="images/logos/cart-empty.png" alt="carrito"></a>
</nav>
</header>