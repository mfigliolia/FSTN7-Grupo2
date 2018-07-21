<?php
require_once 'Producto.php';
Class Usuario(){
private $nombre;
private $apellido;
private $id_usuario;
private $pass;

public function__construct(string$nombre, string$apellido, int $id_usuario);
  $this ->nombre = $nombre;
  $this ->apellido = $apellido;
  $this ->id_usuario = $id_usuario;

  public function get_nombre(){
    return $this ->nombre = $nombre;
  }
  public function set_nombre(){
    $this ->nombre = $nombre;
  }
  public function get_apellido(){
    return $this ->apellido = $apellido;
  }
  public function set_apellido(){
    $this ->apellido = $apellido;
  }
  public function set_pass($value){
    $this ->pass = password_hush($value , PASSWORD_DFAULT);
  }
  public function agregar_productoCarrito(){
    $this ->agregar_productoCarrito = $agregar_productoCarrito
  }

  public function comprarproduct(){
    $this ->comprarproduct = $comprarproduct
    if(!$producto ==nul || !$agregar_productoCarrito ==nul)
    return $comprarproduct;
  }
   else {
     return .''.<p>"su producto no esta disponible<p>";
   }
}

 ?>
