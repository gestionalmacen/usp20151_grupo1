<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$nombre    = $_POST['nombre'];
	$ruc       = $_POST['ruc'];
        $telefono  = $_POST['telefono'];
	$direccion = $_POST['direccion'];
	$query = "INSERT INTO proveedor(nombre, ruc, telefono, direccion, fecha_registro, estado) VALUES ('$nombre','$ruc','$telefono','$direccion',CURRENT_TIMESTAMP,'A')" ;
	if( mysql_query($query,$cnn)){
		echo "Proveedor Registrado ";	
	}else{
		echo "Fallo";
	}
	
?>

