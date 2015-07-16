<?php
        require_once ("../../conexion.php");
	$cnn=conectar();
	$grupo 	= $_POST['grupo'];
	$idgrupo_usuario = $_POST['idgrupo_usuario'];
	$query = "update grupo_usuario set nombre_grupo='$grupo' where idgrupo_usuario=$idgrupo_usuario ;" ;
	if(mysql_query($query,$cnn)){
		echo "Nombre de Grupo Modificado";
	}else{
		echo "Fallo";
	}



