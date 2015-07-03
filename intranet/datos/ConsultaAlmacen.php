<?php
require_once("clases/MySql.php");
class ConsultaAlmacen{	


	// forms/examen/listar1.php
	function buscar1($nombre, $seccion){
		$mysql = new MySql();		
		if ($seccion == "0") {
			return $mysql->ejecutar(
			"SELECT 
					inv.fecha_registro,
					alm.nombre,
					inv.tipo_inventario,
					case inv.estado 
						when 'A' then 'Activo' 
						when 'I' then 'Inactivo' 
					end as estado
			FROM  almacen alm
					INNER JOIN  inventario inv 
					ON alm.idalmacen = inv.idalmacen
			WHERE alm.nombre LIKE '%$nombre%'				
			LIMIT 0,15;");
		}
		else {
			return $mysql->ejecutar(
			"SELECT  
					inv.fecha_registro,
					alm.nombre,
					inv.tipo_inventario,
					case inv.estado 
						when 'A' then 'Activo' 
						when 'I' then 'Inactivo' 
					end as estado
			FROM  almacen alm
					INNER JOIN  inventario inv 
					ON alm.idalmacen = inv.idalmacen
			WHERE alm.nombre LIKE '%$nombre%'
					AND alm.idalmacen = $seccion
			LIMIT 0,15;");
		}		
	}
}
?>