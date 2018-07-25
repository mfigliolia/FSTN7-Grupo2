<!DOCTYPE html>
<html lang="en" dir="ltr">

  <?php
    include_once('componentes/head.php');

    include_once('componentes/header.php');

    include_once('componentes/navigation.php');
  ?>

  <body>
    <main class="container">

      <?php 

      $paginas = ['home', 'faq', 'login', 'celulares', 'accesorios', 'paquetes', 'contacto'];

      if (isset($_GET['pagina']) && in_array($_GET['pagina'], $paginas)) {
        include('paginas/'. $_GET['pagina'] . '.php');
      } else {
        include('paginas/home.php'); 
      }

      ?>
    
    </main>

    <?php include_once('componentes/footer.php'); ?>  
  </body>
</html>
