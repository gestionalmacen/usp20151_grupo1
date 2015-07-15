<?php
        require_once ("../../conexion.php");
	$cnn=conectar();
	$idproducto = $_POST['idproducto'];
	$query = "update producto set estado='A' where idproducto=$idproducto;" ;
	if(mysql_query($query,$cnn)){
		echo "Producto dado de alta";
	}else{
		echo "Fallo";
	}


