<?php
require_once("MySql.php");
class UsuarioDAL{

	function get2($id){		
		$mysql = new MySql();
		return $mysql->ejecutar(
		"SELECT usu.idusuario, 
			usu.nombre,
			usu.estado,
			usu.pregunta_secreta, 
			usu.respuesta 
		FROM usuario usu
		WHERE   usu.idusuario =$id");
	}
	
	// Usado en:
	function buscar($nombre, $estado){
		$mysql = new MySql();
		
		if ($estado=='0')	{		
			return $mysql->ejecutar(
			"SELECT usu.idusuario, 
			usu.nombre,
			case usu.estado when 'A' then 'Activo' when 'I' then 'Inactivo' end as estado,
			usu.pregunta_secreta, 
			usu.respuesta 
			FROM usuario usu
			
			WHERE   usu.nombre LIKE '$nombre%'
			ORDER BY usu.fecha_registro DESC
			LIMIT 0,10;");
		}
		else {
			return $mysql->ejecutar(
			"SELECT usu.idusuario, 
			usu.nombre,
			case usu.estado when 'A' then 'Activo' when 'I' then 'Inactivo' end as estado,
			usu.pregunta_secreta, 
			usu.respuesta 
			FROM usuario usu
			WHERE   (usu.nombre LIKE '$nombre%')
					AND usu.estado = '$estado'
			ORDER BY usu.fecha_registro DESC
			LIMIT 0,10;");
		}		
	}	
	function modificar($medicoID, $apellidos, $nombres, $sexo, 
			$codMed, $tipoCodMed, $email){		
		$mysql = new MySql();
		return $mysql->ejecutar(
		"UPDATE MedicoExt
		SET 	Apellidos = '$apellidos',
				Nombres = '$nombres',
				Sexo = '$sexo',
				CodMed = '$codMed',
				TipoCodMed = '$tipoCodMed',
				Email = '$email'
		WHERE 	MedicoExtID = $medicoID");
	}
	
	function registrar($apellidos, $nombres, $sexo, 
			$codMed, $tipoCodMed, $email){		
		$mysql = new MySql();
		return $mysql->ejecutar(
		"INSERT INTO MedicoExt (
			Apellidos, Nombres, Sexo, 
			CodMed, TipoCodMed, Email, FechaReg)
		VALUES (		
			'$apellidos', '$nombres', '$sexo', 
			'$codMed', '$tipoCodMed', '$email', NOW())");
	}
	
}
?>