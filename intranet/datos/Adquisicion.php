<?php
require_once("clases/MySql.php");
class Area{	

	function listar1(){
		$mysql = new MySql();
		return $mysql->ejecutar(
		"SELECT nt.idnota_ingreso,
			nt.fecha_emision
		FROM nota_ingreso nt;");				
	}
}
?>