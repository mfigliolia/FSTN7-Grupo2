<?php
class Producto
{
private $idproduct
private $precio
private $cantproduct
private $nombre
private $ubicacion

public function__construct(string $nombre, int $idproduct, int $precio, string $ubicacion){
  $this ->nombre = $nombre;
  $this ->idproduct = $idproduct;
  $this ->precio = $precio;
  $this ->cantproduct = $cantproduct[];
  $this ->ubicacion = $ubicacion;
}
public function get_nombre(){
  return $this ->nombre;
}
public function set_nombre(){
  $this ->nombre = $nombre;
}
public function get_idproduct(){
  return $this ->idproduct;
}
public function set_idproduct(){
  $this ->idproduct = $idproduct;
}
public function get_precio(){
  return  $this ->precio = $precio;

public function set_precio(){
  $this ->precio = $precio;
}
public function ubicacion(){
  $this ->ubicacion = $ubicacion;
}
public function get_ubicacion(){
  return $this ->ubicacion = $ubicacion;
}
public function set_ubicacion(){
  $this ->ubicacion = $ubicacion;
}
public function agregar_producto(){
  $this ->producto[] = $producto;
}
public function sacar_producto(){
  $this ->producto[] = $producto;
}
public function producto_disponibles(){
  if ($this->producto) {
      return true;
    }
    return false;

}
}

 ?>
