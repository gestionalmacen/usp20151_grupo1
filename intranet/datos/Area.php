<?php
require_once("clases/MySql.php");
class Area{	

	function listar1(){
		$mysql = new MySql();
		return $mysql->ejecutar(
		"SELECT are.idarea,
				are.nombre
		FROM    area are;");				
	}
}
?>