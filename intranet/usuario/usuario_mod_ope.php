<?php
        require_once ("../../conexion.php");
	$cnn=conectar();
	$nombre 	= $_POST['nombre'];
	$idusuario = $_POST['idusuario'];
	$query = "update usuario set nombre='$nombre' where idusuario=$idusuario ;" ;
	if(mysql_query($query,$cnn)){
		echo "Nombre de Usuario Modificado";
	}else{
		echo "Fallo";
	}

