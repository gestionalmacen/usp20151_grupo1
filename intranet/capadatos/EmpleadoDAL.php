<?php
require_once("clases/MySql.php");
class EmpleadoDAL{

	// Usado en:
	// forms/Empleado/listar.php
	function buscar1($nombre, $sexo){
		$mysql = new MySql();
		
		if ($sexo=='0')	{		
			return $mysql->ejecutar(
			"
			SELECT emp.idempleado, 
				emp.primer_nombre, 
				emp.segundo_nombre, 
				emp.apellido_paterno, 
				emp.apellido_materno, 
				TIMESTAMPDIFF(YEAR, emp.fecha_nacimiento, CURDATE()) AS Edad, 
				emp.sexo,
				emp.idcargo, 
				emp.fecha_registro 				
			FROM Empleado emp 
			WHERE emp.apellido_paterno LIKE '$nombre%' 
				OR emp.primer_nombre LIKE '$nombre%' 
			ORDER BY emp.fecha_registro DESC, emp.primer_nombre
			LIMIT 0,15;");
		}
		else {
			return $mysql->ejecutar(
			"SELECT  emp.idempleado,				
				emp.primer_nombre, 
				emp.segundo_nombre, 
				emp.apellido_paterno, 
				emp.apellido_materno, 
				TIMESTAMPDIFF(YEAR, emp.fecha_nacimiento, CURDATE()) AS Edad, 
				emp.sexo,
				emp.idcargo, 
				emp.fecha_registro 
			FROM    Empleado emp
			WHERE   (emp.apellido_paterno LIKE '$nombre%'
					OR emp.primer_nombre LIKE '$nombre%')
					AND emp.Sexo = '$sexo' 
			ORDER BY emp.fecha_registro DESC, emp.primer_nombre
			LIMIT 0,15;");
		}		
	}

	// Usado en:
	function registrar($apellidos,$nombres,$fechaNac,
					   $sexo,$dni,$email,$telefono){		
		$mysql = new MySql();
		return $mysql->ejecutar(
		"INSERT INTO Empleado (	
			Apellidos, Nombres,	FechaNac,
			Sexo, DNI, Email, Telefono,	FechaReg
		)
		VALUES (		
			'$apellidos', '$nombres', '$fechaNac',
			'$sexo', '$dni', '$email', '$telefono',	NOW())");
	}
	
	function modificar($idempleado, $nombresP, $nombresM, $apellidosP, $nombresM,$fecha_nacimiento,
					   $sexo,$cargo){		
		$mysql = new MySql();
		return $mysql->ejecutar(
		"UPDATE Empleado
		SET 	primer_nombre = '$nombresP',
				segundo_nombre = '$nombresM',
				apellido_paterno = '$apellidosP',
				apellido_materno = '$apellidosM',
				fecha_nacimiento = '$fecha_nacimiento',
				sexo = '$sexo',
				cargo = '$cargo'
		WHERE 	idempleado = $idempleado");
	}
	
	//
	function get($id){		
		$mysql = new MySql();
		return $mysql->ejecutar(
		"SELECT emp.idempleado,
				emp.Apellidos,
				emp.Nombres,				
				TIMESTAMPDIFF(YEAR, emp.FechaNac, CURDATE()) AS Edad,
				emp.Sexo,
				emp.DNI
		FROM    Empleado emp
		WHERE   emp.idempleado=$id");
	}	
	// falta-->
	function get2($id){		
		$mysql = new MySql();
		return $mysql->ejecutar(

		"SELECT emp.idempleado, 
				emp.primer_nombre, 
				emp.segundo_nombre, 
				emp.apellido_paterno, 
				emp.apellido_materno, 
				emp.fecha_nacimiento, 
				emp.sexo
		FROM    Empleado emp
		WHERE   emp.idempleado=$id");
	}	

}
?>