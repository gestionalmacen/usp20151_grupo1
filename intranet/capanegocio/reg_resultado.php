<?php
	session_start();
	require_once("../capadatos/ResultadoDAL.php");
	$resultadoDAL = new ResultadoDAL();
	$ordenID = $_POST['ordenID'];
	$results = json_decode($_POST['resultados']);
	$rs=0;
	foreach($results as $r){
		$rs = $resultadoDAL->registrar($ordenID, $r->par, $r->val, $r->tip);
	}	
	// Revisar
	if ($rs) echo 1;
	else echo "Error al registrar";
?>