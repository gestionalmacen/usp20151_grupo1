<?php
require_once("clases/MySql.php");
class Almacen{	
	// Usado en:
	// forms/seccion/listar1.php
	function listar1(){
		$mysql = new MySql();
		return $mysql->ejecutar(
		"SELECT alm.idalmacen,
				alm.nombre
		FROM    Almacen alm;");				
	}
}
?>