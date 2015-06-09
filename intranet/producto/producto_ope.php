<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
	$idsubcategoria	= $_POST['idsubcategoria'];
	$idunidad_medida = $_POST['idunidad_medida'];
	$query = "insert into producto (nombre,descripcion,precio_compra,idsubcategoria,idunidad_medida,fecha_registro,estado) values ('$nombre','$descripcion',$precio,$idsubcategoria,$idunidad_medida,CURRENT_TIMESTAMP,'A')" ;
	if( mysql_query($query,$cnn)){
		echo "OK";
	}else{
		echo "Fallo";
	}
	
?>