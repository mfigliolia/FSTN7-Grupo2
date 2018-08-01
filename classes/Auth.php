<?php
	
	require_once('Db.php');

	class Auth
	{
		public function __construct()
		{
			session_start();

			if (!isset($_SESSION["estoyLogueado"]) && isset($_COOKIE['estoyLogueado'])) {
				$_SESSION['estoyLogueado'] = $_COOKIE['estoyLogueado'];
			}
		}

		public function login($email)
		{
			$_SESSION['estoyLogueado'] = $email;
		}

		public function loginControl()
		{
			return isset($_SESSION['estoyLogueado']);
		}

		public function usuarioLogueado(DB $db)
		{
			if($this->loginControl()) {
				$email = $_SESSION['estoyLogueado'];
				return $db->buscamePorEmail($email);
			} else {
				return NULL;
			}
		}

		public function logout()
		{
			session_destroy();
			setcookie("estoyLogueado", "", -1);
		}
	}