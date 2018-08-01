<?php
	
	require_once('classes/DbMySQL.php');
	require_once('classes/Auth.php');
	require_once('classes/Validator.php');

	$db = new DbMySQL();
	$auth = new Auth();
	$validator = new Validator();