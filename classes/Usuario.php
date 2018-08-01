<?php

    Class Usuario {

      private $id;
      private $nombre;
      private $apellido;
      private $email;
      private $password;
      private $domicilio;

      public function __construct ($nombre, $apellido, $email, $password, $domicilio, $id = null)
      {
          if ($id == null) {
            $this->password = password_hash($password, PASSWORD_DEFAULT);
          } else {
            $this->password = $password;
          }
          $this->id = $id;
          $this->nombre = $nombre;
          $this->apellido = $apellido;
          $this->email = $email;
          $this->domicilio = $domicilio;
      }

      public function getId() {
          return $this->id;
      }

      public function setId($id) {
          $this->id = $id;
      }

      public function getNombre() {
          return $this->nombre;
      }

      public function setNombre($nombre) {
          $this->nombre = $nombre;
      }

      public function getApellido() {
          return $this->apellido;
      }

      public function setApellido($apellido) {
          $this->apellido = $apellido;
      }

      public function getEmail() {
          return $this->email;
      }

      public function setEmail($email) {
          $this->email = $email;
      }

      public function getPassword() {
          return $this->password;
      }

      public function setPassword($password) {
          $this->password = $password;
      }

      public function getDomicilio() {
          return $this->domicilio;
      }

      public function setDomicilio($domicilio) {
          $this->domicilio = $domicilio;
      }
      
      public function guardarImagen($email) {

        //$email = get

        if ($_FILES["avatar"]["error"] == UPLOAD_ERR_OK)
        {
            $nombre = $_FILES["avatar"]["name"];
    
            $archivo = $_FILES["avatar"]["tmp_name"];
        
            $ext = pathinfo($nombre, PATHINFO_EXTENSION);

            $path = pathinfo($_SERVER['SCRIPT_FILENAME'], PATHINFO_DIRNAME) . "/uploads/" . $this->getEmail() . "." . $ext;
        
            move_uploaded_file($archivo, $path);
        }
      }     

  }


