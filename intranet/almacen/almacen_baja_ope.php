<?php
        require_once ("../../conexion.php");
	$cnn=conectar();
	$almacen = $_POST['almacen'];
	$idalmacen = $_POST['idalmacen'];
	$query = "update almacen set estado='I' where idalmacen=$idalmacen;" ;
	if(mysql_query($query,$cnn)){
		echo "Almacen dado de baja";
	}else{
		echo "Fallo";
	}

