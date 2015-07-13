<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$idinventario = $_POST['idinventario'];
	$idkardex = $_POST['idkardex'];
	$query = "update kardex set idinventario=$idinventario where idkardex=$idkardex" ;
	if( mysql_query($query,$cnn)){
		echo "Kardex de Producto Modificado";
	}else{
		echo "Fallo";
	}
	
?>
