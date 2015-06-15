<?php
	session_start();
	require_once("../usuario2/UsuarioDAL.php");
	$medico = new usuario();
	$rs = $medico->modificar(
		$_POST['idusuario'],
		$_POST['nombre'],
		$_POST['estado'],
		$_POST['pregunta'],
		$_POST['respuesta']				
	);
	
	// Revisar
	if ($rs) 
		echo 1;	
	else 
		echo mysqli_error;	
?>