<?php
        require_once ("../../conexion.php");
	$cnn=conectar();
	$nombre 	= $_POST['nombre'];
	$idusuario = $_POST['idusuario'];
	$query = "update usuario set estado='I' where idusuario=$idusuario ;" ;
	if(mysql_query($query,$cnn)){
		echo "Usuario dado de baja";
	}else{
		echo "Fallo";
	}

