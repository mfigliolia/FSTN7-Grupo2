<<<<<<< HEAD
<?php

define('PRODUCTOS_KEY', 'productos');

function listProductos()
{
    $productosJson = file_get_contents('datos/' . PRODUCTOS_KEY . '.json');

    $productos = json_decode($productosJson, true);

    return $productos[PRODUCTOS_KEY];
}

=======
<?php

define('PRODUCTOS_KEY', 'productos');

function listProductos()
{
    $productosJson = file_get_contents('datos/' . PRODUCTOS_KEY . '.json');

    $productos = json_decode($productosJson, true);

    return $productos[PRODUCTOS_KEY];
}

>>>>>>> 59eb4479753f621c9a5d0761f5eba73818a05bf1
?>