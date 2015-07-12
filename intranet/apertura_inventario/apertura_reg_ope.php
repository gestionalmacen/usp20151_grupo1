<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$stock_inicial = $_POST['stock_inicial'];
	$idproducto = $_POST['idproducto'];
	$query = "update kardex set stock_inicial=$stock_inicial,stock_actual=$stock_inicial-stock_final where idproducto=$idproducto;" ;
	if( mysql_query($query,$cnn)){
		echo "Stock Inicial Modificado";
	}else{
		echo "Fallo";
	}
	
?>

