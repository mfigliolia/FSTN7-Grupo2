<?php
	require_once('Db.php');

	Class Validator
	{

		public function validarLogin($datos, DB $db)
		{
			$errores = [];

			foreach ($datos as $clave => $valor){
				$datos[$clave] = trim($valor);
			}

		    if ($datos['email'] == "") {
		      $errores['email'] = 'Debes ingresar un email';
		    }
		    else if (!filter_var($datos['email'], FILTER_VALIDATE_EMAIL)) {
		        $errores['email'] = 'El email ingresado no es válido';
		    } else if ($db->buscamePorEmail($datos['email']) == null) {
		    	$errores['email'] = 'El email no está regitrado en nuestra base';
		    }

		    $usuario = $db->buscamePorEmail($datos['email']);

		    if (empty($datos['contrasena'])) {
		        $errores['contrasena'] = 'Debes ingresar un password';
		    } else if ($usuario != null) {
		    	if (password_verify($datos['contrasena'], $usuario->getPassword()) == false) {
		    		$errores['contrasena'] = "La contraseña ingresada no es válida";
		    	}
		    }

		    return $errores;
		}

		public function validarInformacion($informacion, DB $db)
		{
			$errores = [];

			foreach ($informacion as $clave => $valor) {
				$informacion[$clave] = trim($valor);
			}

		    if ($informacion['nombre'] == '') {
		        $errores['nombre'] = "Debés ingresar un nombre";
		    } elseif (strlen($informacion['nombre']) < 3) {
		        $errores['nombre'] = "El nombre debe tener más de 3 letras";
		    }
		  
		    if ($informacion['apellido'] == '') {
		        $errores['apellido'] = "Debés ingresar un apellido";
		    }
		  
		    if ($informacion['email'] == '') {
		        $errores['email'] = "Debés ingresar un email";
		    } else if (filter_var($informacion['email'], FILTER_VALIDATE_EMAIL) == false) {
		        $errores['email'] = "Ingresá un email válido";
		    } else if ($db->buscamePorEmail($informacion['email']) != NULL) {
		        $errores['email'] = "Este email ya existe";
		    }
		  
		    if (strlen($informacion['contrasena']) < 6 || strlen($informacion['contrasena_confirm']) < 6) {
		   		$errores['contrasena'] = "Ingresá una contraseña de 6 caracteres" ;
	        } else if ($informacion['contrasena'] != $informacion['contrasena_confirm']) {
		        $errores['contrasena'] = "Las contraseñas no coinciden";
		    }
		  
		    if (trim($informacion['domicilio']) == '') {
		        $errores['domicilio'] = "Debés ingresar un domicilio";
		    }

		    if ($_FILES['avatar']['error'] == UPLOAD_ERR_NO_FILE) {
		        $errores['avatar'] = "Debés cargar una imagen de perfil";
	 	    }
	 	    	return $errores;
		}
	}
?>