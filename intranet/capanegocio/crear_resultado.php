<?php
	session_start();
	require_once("../capadatos/ResultadoDAL.php");
	$resultadoDAL = new ResultadoDAL();
	$ordenID = $_POST['ordenID'];	
	$rs = $resultadoDAL->crear_registros($ordenID);
	
	// Revisar
	if ($rs) echo 1;
	else echo "Error al registrar";
?>