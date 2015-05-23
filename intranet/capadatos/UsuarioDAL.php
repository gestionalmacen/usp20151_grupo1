<?php
require_once("clases/MySql.php");	
class UsuarioDAL{
	
	function login($usuario, $contrasena){		
		$mysql = new MySql();
		return $mysql->ejecutar(
		"SELECT  usu.UsuarioID,
				con.ContratoID,
				emp.EmpleadoID,
				emp.Apellidos,
				emp.Nombres,
				rol.RolID,
				usu.Estado 
		FROM    Usuario usu
				INNER JOIN Contrato con
				ON usu.TipoUsuario = 1
				   AND usu.TitularID = con.ContratoID
				INNER JOIN Empleado emp
				ON con.EmpleadoID = emp.EmpleadoID
				INNER JOIN RolUsuario rol
				ON usu.UsuarioID = rol.UsuarioID
		WHERE   usu.Nombre = '$usuario'
				AND usu.Contrasena = '$contrasena'");
	}
}
?>