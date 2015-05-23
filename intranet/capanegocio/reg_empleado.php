<?php
	session_start();
	require_once("../capadatos/EmpleadoDAL.php");
	$empleado = new EmpleadoDAL();
	$rs = $empleado->registrar(
		$_POST['apellidos'],
		$_POST['nombres'],
		$_POST['fechaNac'],
		$_POST['sexo'],
		$_POST['dni'],
		$_POST['email'],
		$_POST['telefono']);
		
	// Revisar
	if ($rs) 
		echo 1;	
	else 
		echo mysqli_error;	
?>