<?php
        require_once ("../../conexion.php");
	$cnn=conectar();
	$nombre  = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
        $precio  = $_POST['precio'];
        $idproducto  = $_POST['idproducto'];
	$query = "update producto set nombre='$nombre', descripcion='$descripcion',precio_compra=$precio where idproducto=$idproducto;" ;
	if(mysql_query($query,$cnn)){
		echo "Datos Modificados";
	}else{
		echo "Fallo";
	}

