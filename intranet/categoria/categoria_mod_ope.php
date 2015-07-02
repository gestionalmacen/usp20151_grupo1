<?php
        require_once ("../../conexion.php");
	$cnn=conectar();
	$categoria = $_POST['categoria'];
	$idcategoria = $_POST['idcategoria'];
	$query = "update categoria set nombre='$categoria' where idcategoria=$idcategoria;" ;
	if(mysql_query($query,$cnn)){
		echo "Nombre de Categoria Modificado";
	}else{
		echo "Fallo";
	}
