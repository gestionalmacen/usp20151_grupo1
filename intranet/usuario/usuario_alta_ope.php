<?php
        require_once ("../../conexion.php");
	$cnn=conectar();
	$nombre 	= $_POST['nombre'];
	$idusuario = $_POST['idusuario'];
	$query = "update usuario set estado='A',fecha_alta=CURRENT_TIMESTAMP where idusuario=$idusuario ;" ;
	if(mysql_query($query,$cnn)){
		echo "Usuario dado de Alta";
	}else{
		echo "Fallo";
	}
