<?php
require_once("clases/MySql.php");
class ConsultaArea{	

	function buscar1($nombre, $seccion){
		$mysql = new MySql();		
		if ($seccion == "0") {
			return $mysql->ejecutar(
			"SELECT 
				prov.nombre,
				nt.fecha_emision,
				prod.nombre
				From proveedor prov
			INNER JOIN nota_ingreso nt
				ON prov.idproveedor = nt.idproveedor
				INNER JOIN detalle_notaingreso dnt
				ON nt.idnota_ingreso = dnt.idnota_ingreso
				INNER JOIN producto prod
				ON prod.idproducto = dnt.idproducto
			WHERE prov.nombre LIKE '%$nombre%'
				ORDER BY prov.nombre ASC	
			LIMIT 0,40;");
		}
		else {
			return $mysql->ejecutar(
			"
			SELECT 
				prov.nombre,
				nt.fecha_emision,
				prod.nombre
				From proveedor prov
			INNER JOIN nota_ingreso nt
				ON prov.idproveedor = nt.idproveedor
				INNER JOIN detalle_notaingreso dnt
				ON nt.idnota_ingreso = dnt.idnota_ingreso
				INNER JOIN producto prod
				ON prod.idproducto = dnt.idproducto
			WHERE prov.nombre LIKE '%$nombre%'	
					AND nt.idnota_ingreso = $seccion
				ORDER BY prov.nombre ASC	
			LIMIT 0,15;");
		}		
	}
}
?>