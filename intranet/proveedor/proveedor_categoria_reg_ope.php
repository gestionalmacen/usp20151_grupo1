<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$idcategoria    = $_POST['idcategoria'];
        $idproveedor    = $_POST['idproveedor'];
	$query = "insert into detalle_categoria_proveedor(idcategoria, idproveedor) VALUES ($idcategoria,$idproveedor)" ;
	if(mysql_query($query,$cnn)){
		echo "Categoria Agregada ";	
	}else{
		echo "Categoria ya existente";
	}
	
?>

