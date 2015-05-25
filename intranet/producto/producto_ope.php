<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$nombre = $_POST['nombre'];
	$precio = $_POST['precio'];
	$idtipoproducto	= $_POST['idtipoproducto'];
	$marca	= $_POST['marca'];
	$descripcion	= $_POST['descripcion'];
	$query = "insert into producto (nombre, precio,idtipoproducto,marca, descripcion) values ('$nombre',$precio,$idtipoproducto,'$marca','$descripcion')" ;
	if( mysql_query($query,$cnn)){
		echo "OK";
	}else{
		echo "Fallo";
	}
	
?>