<?php
require_once("clases/MySql.php");
class ConsultaArea{	

	function buscar1($nombre, $seccion){
		$mysql = new MySql();		
		if ($seccion == "0") {
			return $mysql->ejecutar(
			"SELECT 
				sol.fecha,
				are.nombre,
				pro.nombre,
				dso.cantidad_solicitada,
				dso.cantidad_entregada,
				dso.saldo as 'saldo',
				case sol.estado when 'P' then 'Pendiente' when 'E' then 'Entregado' end as estado
			FROM area are
				INNER JOIN solicitud sol
				ON are.idarea = sol.idarea
				INNER JOIN detalle_solicitud dso
				ON sol.idsolicitud = dso.idsolicitud
				INNER JOIN producto pro
				ON dso.idproducto = pro.idproducto
			WHERE pro.nombre LIKE '%$nombre%'
					AND sol.estado LIKE 'P'
				ORDER BY sol.fecha DESC			
			LIMIT 0,15;");
		}
		else {
			return $mysql->ejecutar(
			"SELECT 
				sol.fecha,
				are.nombre,
				pro.nombre,
				dso.cantidad_solicitada,
				dso.cantidad_entregada,
				dso.saldo as 'saldo',
				case sol.estado when 'P' then 'Pendiente' when 'E' then 'Entregado' end as estado
			FROM area are
				INNER JOIN solicitud sol
				ON are.idarea = sol.idarea
				INNER JOIN detalle_solicitud dso
				ON sol.idsolicitud = dso.idsolicitud
				INNER JOIN producto pro
				ON dso.idproducto = pro.idproducto
			WHERE pro.nombre LIKE '%$nombre%'
					AND sol.estado LIKE 'P'
					AND are.idarea = $seccion
			ORDER BY sol.fecha DESC		
			LIMIT 0,15;");
		}		
	}
}
?>