<?php 
	require_once("../capadatos/EmpleadoDAL.php");
	$empleadoID = 0;
	if (isset($_GET['empleadoID'])) {
		$empleadoID = $_GET['empleadoID'];	
		$empleadoDAL = new EmpleadoDAL();
		$rs = $empleadoDAL->get2($empleadoID);
		$row_pac = mysqli_fetch_row($rs);		
	}
?>
<script src="forms/js_empleado.js"></script>
<form id="frmreg_empleado" name="frmreg_empleado" class="form-vertical">
<table width="373">
	<tr>
		<td colspan="2">
			<center><p class="form-title"><?php if($empleadoID > 0) { echo "Actualizar Empleado"; } else { echo "Registrar Empleado"; } ?></p><br/></center>
		</td>
	</tr>
	<tr height="45">
		<td width="100px"><label>Nombres:</label></td>
		<td><input type="text" id="txtNombres" name="txtNombres" class="form-control input-sm" placeholder="nombre (obligatorio)" 
				   onkeypress="return soloPalabras(event);"
				   onblur="limpiaPalabras('txtNombres');"
				   value="<?php if($empleadoID > 0) echo $row_pac[2]; ?>" maxlength = "30">
		</td>
	</tr>
	<tr height="45">
		<td><label>Apellidos:</label></td>
		<td><input type="text" id="txtApellidos" name="txtApellidos" class="form-control input-sm" placeholder="apellidos (obligatorio)"
				   onkeypress="return soloPalabras(event);"
				   onblur="limpiaPalabras('txtApellidos');"
				   value="<?php if($empleadoID > 0) echo $row_pac[1]; ?>" maxlength = "30">
		</td>
	</tr>	
	<tr height="45">
		<td><label>Sexo:</label></td>
		<td>
			<label class="btn"><input type="radio" name="rbSexo" id="sexoM" value="M" <?php if($empleadoID > 0) { if ($row_pac[4]=='M') echo "checked"; } ?>>&nbsp;Masculino</label>			
			<label class="btn"><input type="radio" name="rbSexo" id="sexoF" value="F" <?php if($empleadoID > 0) { if ($row_pac[4]=='F') echo "checked"; } ?>>&nbsp;Femenino</label>
		</td>
	</tr>
	<tr height="45">
		<td><label>Nacimiento:</label></td>
		<td>
			<input type="text" id="txtFechaNac" name="txtFechaNac" class="form-control input-sm" placeholder="fecha de nacimiento (obligatorio)"
			onkeypress="return soloDigitoGuion(event);"
		    onblur="limpiaDigitoGuion('txtFechaNac');"
			value="<?php if($empleadoID > 0) echo $row_pac[3]; ?>">
		</td>
	</tr>
	<tr height="45">
		<td><label>DNI:</label></td>
		<td>
			<input type="text" id="txtDNI" name="txtDNI" class="form-control input-sm" placeholder="numero de DNI (obligatorio)"
			onkeypress="return soloDigitos(event);"
			onblur="limpiaDigitos('txtDNI');"
			value="<?php if($empleadoID > 0) echo $row_pac[5]; ?>" maxlength="8">
		</td>
	</tr>
	<tr height="45">
		<td><label>Correo:</label></td>
		<td>
			<input type="text" id="txtCorreo" name="txtCorreo" class="form-control input-sm" placeholder="direcci&oacute;n de correo"
			onkeypress="return soloCorreo(event);"
		    onblur="limpiaCorreo('txtCorreo');"
			value="<?php if($empleadoID > 0) echo $row_pac[6]; ?>" maxlength="30">
		</td>		
	</tr>
	<tr height="45">
		<td><label>Telefono:</label></td>
		<td>
			<input type="text" id="txtTelefono" name="txtTelefono" class="form-control input-sm" placeholder="telefono"
			onkeypress="return soloDigitoGuion(event);"
		    onblur="limpiaDigitoGuion('txtTelefono');"
			value="<?php if($empleadoID > 0) echo $row_pac[7]; ?>" maxlength="15">
		</td>		
	</tr>
	<tr height="45">
		<td colspan="2" style="text-align:right">			
			<button type="button" onclick="<?php if($empleadoID > 0) echo "actualizar($empleadoID);"; else echo "registrar();"; ?>" class="btn btn-primary">
					<?php if($empleadoID > 0) echo "Guardar"; else echo "Registrar"; ?></button>			
		</td>
	</tr>
</table>
</form>