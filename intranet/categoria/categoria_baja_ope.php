<?php
        require_once ("../../conexion.php");
	$cnn=conectar();
	$categoria = $_POST['categoria'];
	$idcategoria = $_POST['idcategoria'];
	$query = "update categoria set estado='I' where idcategoria=$idcategoria;" ;
	if(mysql_query($query,$cnn)){
		echo "Categoria dada de baja";
	}else{
		echo "Fallo";
	}

