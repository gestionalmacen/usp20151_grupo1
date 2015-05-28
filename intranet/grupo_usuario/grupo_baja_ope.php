<?php
        require_once ("../../conexion.php");
	$cnn=conectar();
	$grupo 	= $_POST['grupo'];
	$idgrupo_usuario = $_POST['idgrupo_usuario'];
	$query = "update grupo_usuario set estado='I' where idgrupo_usuario=$idgrupo_usuario ;" ;
	if(mysql_query($query,$cnn)){
		echo "Grupo dado de baja";
	}else{
		echo "Fallo";
	}

