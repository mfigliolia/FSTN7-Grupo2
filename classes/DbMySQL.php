<?php

	require_once('Db.php');
	require_once('Usuario.php');

	class DbMySQL extends DB {

		protected $conexion;

		public function __construct()
		{
			//$dsn = 'mysql:host=localhost;dbname=cell;charset=utf8mb4;port=8889';
			$dsn = 'mysql:host=localhost;dbname=cell;charset=utf8mb4;port=3306';
			$username = "root";
			//$password = "root";
			$password = "";

			try {
				$this->conexion = new PDO($dsn, $username, $password);
			}

			catch(Exception $e) {
				echo "La conexión a base de datos falló: " . $e->getMessage();
			}
		}
		
		function guardarUsuario(Usuario $usuario)
		{
			$query = $this->conexion->prepare("insert into usuarios values(default, :nombre, :apellido, :email, :password, :domicilio)");

			$query->bindValue(":nombre", $usuario->getNombre());
			$query->bindValue(":apellido", $usuario->getApellido());
			$query->bindValue(":email", $usuario->getEmail());
			$query->bindValue(":password", $usuario->getPassword());
			$query->bindValue(":domicilio", $usuario->getDomicilio());

			$query->execute();

			$id = $this->conexion->lastInsertId();

			$usuario->setId($id);

			return $usuario;
		}

	    function buscamePorEmail($email)
	    {
	    	$query = $this->conexion->prepare("SELECT * FROM usuarios WHERE email = :email");
	    	$query->bindValue(":email", $email);
	    	$query->execute();

	    	$usuarioFormatoArray = $query->fetch(PDO::FETCH_ASSOC);

	    	if ($usuarioFormatoArray) {
	    		
	    		$usuario = new Usuario($usuarioFormatoArray["nombre"], $usuarioFormatoArray["apellido"], $usuarioFormatoArray["email"], $usuarioFormatoArray["password"], $usuarioFormatoArray["domicilio"], $usuarioFormatoArray["id"]);

	    		return $usuario;
	    	} else {
	    		return null;
	    	}
	    }

	    function traeTodaLaBase()
	    {
	    	$query = $this->conexion->prepare("SELECT * FROM usuarios");
	    	$query->execute();

	    	$usuariosFormatoArray = $query->fetchAll(PDO::FETCH_ASSOC);
	    	$usuariosFormatoClase = [];

	    	foreach ($usuariosFormatoArray as $usuario):
	    		$usuariosFormatoClase[]= new Usuario($usuario["nombre"], $usuario["apellido"], $usuario["email"], $usuario["password"], $usuario["domicilio"], $usuario["id"]);
	    	endforeach;
	    	
	    	return $usuariosFormatoClase;
	    }
	}
