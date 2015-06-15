<?php
	session_start();
	require_once("../capadatos/UsuarioDAL.php");
	$usuario = new UsuarioDAL();
	$rs = $usuario->login($_POST['usuario'], $_POST['contrasena']);	
	$n = mysqli_num_rows($rs);
	
	if ($n>0) {
		$row = mysqli_fetch_array($rs);
		$_SESSION['usuarioID'] 	= $row[0];
		$_SESSION['contratoID'] = $row[1];
		$_SESSION['empleadoID'] = $row[2];
		$_SESSION['apellidos'] 	= $row[3];
		$_SESSION['nombres'] 	= $row[4];
		$_SESSION['rolID'] 		= $row[5];
		$_SESSION['estado'] 	= $row[6];		
		if ($_SESSION['estado'] == 1) 
			echo 1; 
		else // estado == 0
			echo 2;
	}
	else { // usuario no valido
		echo 0;
	}
?>