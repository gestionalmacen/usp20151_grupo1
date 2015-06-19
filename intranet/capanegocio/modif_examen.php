<?php
	session_start();
	require_once("../capadatos/ExamenDAL.php");
	$examenDAL = new ExamenDAL();
	$rs = $examenDAL->modificar(
		$_POST['examenID'],		
		$_POST['precio']);
		
	// Revisar
	if ($rs) 
		echo 1;	
	else 
		echo mysqli_error;	
?>