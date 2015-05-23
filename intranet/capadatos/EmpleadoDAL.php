<?php
require_once("clases/MySql.php");
class EmpleadoDAL{

	// forms/gen_resultado.php
	// forms/reg_orden.php
	function get($id){		
		$mysql = new MySql();
		return $mysql->ejecutar(
		"SELECT emp.EmpleadoID,
				emp.Apellidos,
				emp.Nombres,				
				TIMESTAMPDIFF(YEAR, emp.FechaNac, CURDATE()) AS Edad,
				emp.Sexo,
				emp.DNI
		FROM    Empleado emp
		WHERE   emp.EmpleadoID=$id");
	}	
	
	function get2($id){		
		$mysql = new MySql();
		return $mysql->ejecutar(
		"SELECT emp.EmpleadoID,
				emp.Apellidos,
				emp.Nombres,				
				emp.FechaNac,
				emp.Sexo,
				emp.DNI,
				emp.Email,
				emp.Telefono
		FROM    Empleado emp
		WHERE   emp.EmpleadoID=$id");
	}	
	
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
	
	function modificar($empleadoID, $apellidos,$nombres,$fechaNac,
					   $sexo,$dni,$email,$telefono){		
		$mysql = new MySql();
		return $mysql->ejecutar(
		"UPDATE Empleado
		SET 	Apellidos = '$apellidos',
				Nombres = '$nombres',
				FechaNac = '$fechaNac',
				Sexo = '$sexo',
				DNI = '$dni',
				Email = '$email',
				Telefono = '$telefono'
		WHERE 	EmpleadoID = $empleadoID");
	}
	
	// Usado en:
	// forms/Empleado/buscar2_click.php
	function buscar2($nombre, $sexo){
		$mysql = new MySql();
		
		if ($sexo=='0')	{		
			return $mysql->ejecutar(
			"SELECT * FROM (SELECT emp.EmpleadoID,
				emp.Apellidos,
				emp.Nombres,
				emp.Sexo,							
				count(ord.OrdenAnalisisID) AS Ordenes,
				max(ord.FechaReg) AS Fecha
			FROM    OrdenAnalisis ord
				INNER JOIN Empleado emp
				ON emp.EmpleadoID = ord.EmpleadoID
			WHERE   emp.Apellidos LIKE '$nombre%'
				 OR emp.Nombres LIKE '$nombre%'			
			GROUP BY emp.EmpleadoID) AS Empleados
			ORDER BY Empleados.Fecha DESC
			LIMIT 0,15;");
		}
		else {
			return $mysql->ejecutar(
			"SELECT * FROM (SELECT emp.EmpleadoID,
				emp.Apellidos,
				emp.Nombres,
				emp.Sexo,							
				count(ord.OrdenAnalisisID) AS Ordenes,
				max(ord.FechaReg) AS Fecha
			FROM    OrdenAnalisis ord
				INNER JOIN Empleado emp
				ON emp.EmpleadoID = ord.EmpleadoID
			WHERE  (emp.Apellidos LIKE '$nombre%'
				OR emp.Nombres LIKE '$nombre%')
				AND emp.Sexo = '$sexo'			
			GROUP BY emp.EmpleadoID) AS Empleados
			ORDER BY Empleados.Fecha DESC
			LIMIT 0,15;");
		}
	}
	
	// Usado en:
	// forms/Empleado/buscar1_click.php
	function buscar1($nombre, $sexo){
		$mysql = new MySql();
		
		if ($sexo=='0')	{		
			return $mysql->ejecutar(
			"SELECT  emp.EmpleadoID,
				emp.Apellidos,
				emp.Nombres,				
				TIMESTAMPDIFF(YEAR, emp.FechaNac, CURDATE()) AS Edad,
				emp.Sexo,
				emp.DNI,
				emp.FechaReg
			FROM    Empleado emp
			WHERE   emp.Apellidos LIKE '$nombre%'
					OR emp.Nombres LIKE '$nombre%'
			ORDER BY emp.FechaReg DESC, emp.Nombres
			LIMIT 0,15;");
		}
		else {
			return $mysql->ejecutar(
			"SELECT  emp.EmpleadoID,				
				emp.Apellidos,
				emp.Nombres,
				TIMESTAMPDIFF(YEAR, emp.FechaNac, CURDATE()) AS Edad,
				emp.Sexo,
				emp.DNI,
				emp.FechaReg
			FROM    Empleado emp
			WHERE   (emp.Apellidos LIKE '$nombre%'
					OR emp.Nombres LIKE '$nombre%')
					AND emp.Sexo = '$sexo' 
			ORDER BY emp.FechaReg DESC, emp.Nombres
			LIMIT 0,15;");
		}		
	}
}
?>