<?php
        require_once ("../../conexion.php");
	$cnn=conectar();
	$idsubcategoria	= $_POST['idsubcategoria'];
	$idunidad_medida = $_POST['idunidad_medida'];
        $idproducto  = $_POST['idproducto'];
	$query = "update producto set idsubcategoria=$idsubcategoria,idunidad_medida=$idunidad_medida where idproducto=$idproducto;" ;
	if(mysql_query($query,$cnn)){
		echo "Datos Modificados de Producto";
	}else{
		echo "Fallo";
	}

