<?php
	session_start();
	require_once("conexion.php");
	$cnn = conectar();
	$usuario = $_POST['usuario'];
	$clave = $_POST['clave'];
	$query = "select * from usuario where nombre='".$usuario."' and clave=md5('".$clave."')";
	$rs = mysql_query ($query,$cnn);
	$n = is_resource($rs)?mysql_num_rows($rs):0;
	if($n>0){
		$row = mysql_fetch_array($rs);
		echo "Bienvenido";
		$_SESSION['tipo_usuario']=$row[3];
		$_SESSION['usuario']=$usuario;
	}else{
	echo "Error en usurio o clave";
	}
?>