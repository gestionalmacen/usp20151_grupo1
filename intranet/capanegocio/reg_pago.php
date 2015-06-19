<?php
	session_start();
	require_once("../capadatos/PagoDAL.php");
	$pagoDAL = new PagoDAL();
	
	$ordenID = $_POST['ordenID'];
	$pago = $_POST['pago'];    
	
	if ($pago > 0) {	
		$total = 0;
		$rs_total  = $pagoDAL->info_total($ordenID);
		if ($rs_total) { $total = mysqli_fetch_array($rs_total)[0]; }
		
		$pagado = 0;
		$rs_pagado = $pagoDAL->info_pagado($ordenID);
		if ($rs_pagado) { $pagado = mysqli_fetch_array($rs_pagado)[0]; }	
		
		$deuda = round($total - $pagado,2);
		
		if ($pago <= $deuda) {	
			$rs = $pagoDAL->registrar($ordenID, $pago);		
			if ($rs) { echo 1;}
			else     { echo mysqli_error; }	// Revisar
		}
		else {echo 'Monto excede al importe de la deuda.';}
	}
	else { echo 'Ingrese un monto válido'; } // En blanco
?>