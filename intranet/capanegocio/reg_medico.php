<?php
	session_start();
	require_once("../capadatos/MedicoDAL.php");
	$medico = new MedicoDAL();
	$rs = $medico->registrar(
		$_POST['apellidos'],
		$_POST['nombres'],
		$_POST['sexo'],
		$_POST['codMed'],
		$_POST['tipoCodMed'],
		$_POST['email']				
	);
	
	// Revisar
	if ($rs) 
		echo 1;	
	else 
		echo mysqli_error;	
?>