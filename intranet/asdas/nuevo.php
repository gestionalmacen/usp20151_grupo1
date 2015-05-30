<html>
	<head>
		<title>Usuarios</title>
	</head>
	<body>
		
		<center><h1>Nuevo Usuario</h1></center>
		
		<form name="nuevo_usuario" method="POST" action="guarda_usuario.php">
			<table width="50%">
				<tr>
					<td width="20"><b>Usuario</b></td>
					<td width="30"><input type="text" name="nombre" size="25" /></td>
				</tr>
				<tr>
					<td><b>clave</b></td>
					<td><input type="clave" name="clave" size="25" /></td>
				</tr>
				<tr>
					<td><b>Estado</b></td>
					<td><input type="text" name="estado" size="25" /></td>
				</tr>
				<tr>
					<td colspan="2"><center><input type="submit" name="eviar" value="Registrar" /></center></td>
				</tr>
			</table>
		</form>
	</body>
</html>						