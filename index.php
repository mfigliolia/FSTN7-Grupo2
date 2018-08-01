<?php
      // require_once('global.php');
      //require_once('funciones/auth.php');
      require_once('loader.php');
      require_once('classes/Usuario.php');
    
      $pageTitle = ':: CELL.HOUSE';

      include_once('componentes/head.php');

      if ($auth->loginControl()) {
        include_once('componentes/header_logout.php');
      } else {
        include_once('componentes/header_login.php');
      };
        
        include_once('componentes/navigation.php');
?>

  <body>
    <main class="container">

      <?php 

      $paginas = ['home', 'faq', 'login', 'celulares', 'accesorios', 'paquetes', 'contacto', 'faq'];

      if (isset($_GET['pagina']) && in_array($_GET['pagina'], $paginas)) {
        include($_GET['pagina'] . '.php');
      } else {
        include('home.php'); 
      }

      ?>
    
    </main>

    <?php include_once('componentes/footer.php'); ?>  
  </body>
</html>
