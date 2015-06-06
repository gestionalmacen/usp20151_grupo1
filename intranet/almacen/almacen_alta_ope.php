<?php
        require_once ("../../conexion.php");
	$cnn=conectar();
	$almacen = $_POST['almacen'];
	$idalmacen = $_POST['idalmacen'];
	$query = "update almacen set estado='A' where idalmacen=$idalmacen;" ;
	if(mysql_query($query,$cnn)){
		echo "Grupo dado de alta";
	}else{
		echo "Fallo";
	}

