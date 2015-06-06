<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$subcategoria = $_POST['subcategoria'];
	$idcategoria = $_POST['idcategoria'];
	$query = "insert into subcategoria (nombre,idcategoria) values ('$subcategoria',$idcategoria)" ;
	if( mysql_query($query,$cnn)){
		echo "Subcategoria Registrada";
	}else{
		echo "Subcategoria ya Existe";
	}
	
?>

