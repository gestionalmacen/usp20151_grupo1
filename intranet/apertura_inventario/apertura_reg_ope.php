<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$stock_inicial = $_POST['stock_inicial'];
	$idkardex = $_POST['idkardex'];
	$query = "update kardex set stock_inicial=$stock_inicial,stock_actual=$stock_inicial-stock_final where idkardex=$idkardex;" ;
	if( mysql_query($query,$cnn)){
		echo "Stock Inicial Modificado";
	}else{
		echo "Fallo";
	}
	
?>

