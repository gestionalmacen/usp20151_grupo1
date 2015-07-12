<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$tipo_inventario = $_POST['tipo_inventario'];
	$idalmacen = $_POST['idalmacen'];
	$query = "INSERT INTO inventario(idalmacen, fecha_registro, tipo_inventario, estado) VALUES ($idalmacen,CURRENT_TIMESTAMP,'$tipo_inventario','A')" ;
	if( mysql_query($query,$cnn)){
		echo "Inventario Registrado";
	}else{
		echo "Fallo";
	}
	
?>

