<?php
        require_once ("../../conexion.php");
	$cnn=conectar();
	$almacen = $_POST['almacen'];
	$idalmacen = $_POST['idalmacen'];
	$query = "update almacen set nombre='$almacen' where idalmacen=$idalmacen;" ;
	if(mysql_query($query,$cnn)){
		echo "Nombre de Almacen Modificado";
	}else{
		echo "Fallo";
	}
