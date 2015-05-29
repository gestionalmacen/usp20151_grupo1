<?php 
	require_once("../capadatos/UsuarioDAL.php");
	$idempleado = 0;
	if (isset($_GET['idempleado'])) {
		$idempleado = $_GET['idempleado'];	
		$empleadoDAL = new EmpleadoDAL();
		$rs = $empleadoDAL->get2($idempleado);
		$row_pac = mysqli_fetch_row($rs);		
	}
?>
<script src="forms/js_empleado.js"></script>
<form id="frmreg_empleado" name="frmreg_empleado" class="form-vertical">
<table width="373">
	<tr>
		<td colspan="2">
			<center><p class="form-title"><?php if($idempleado > 0) { echo "Actualizar Empleado"; } else { echo "Actualizar Usuario"; } ?></p><br/></center>
		</td>
	</tr>
	<tr height="45">
		<td width="100px"><label>Nombres:</label></td>
		<td><input type="text" id="txtNombres" name="txtNombres" class="form-control input-sm" placeholder="nombre (obligatorio)" 
				   onkeypress="return soloPalabras(event);"
				   onblur="limpiaPalabras('txtNombres');"
				   value="<?php if($idempleado > 0) echo $row_pac[2]; ?>" maxlength = "30">
		</td>
	</tr>

	<tr height="45">
		<td><label>Clave:</label></td>
		<td>
			<input type="text" id="txtTelefono" name="txtTelefono" class="form-control input-sm" placeholder="telefono"
			onkeypress="return soloDigitoGuion(event);"
		    onblur="limpiaDigitoGuion('txtTelefono');"
			value="<?php if($idempleado > 0) echo $row_pac[7]; ?>" maxlength="15">
		</td>		
	</tr>
	
	<tr height="45">
		<td><label>Estado:</label></td>
		<td>
			<label class="btn"><input type="radio" name="rbSexo" id="sexoM" value="M" <?php if($idempleado > 0) { if ($row_pac[4]=='M') echo "checked"; } ?>>&nbsp;Activo</label>			
			<label class="btn"><input type="radio" name="rbSexo" id="sexoF" value="F" <?php if($idempleado > 0) { if ($row_pac[4]=='F') echo "checked"; } ?>>&nbsp;Inativo</label>
		</td>
	</tr>

	


	<tr height="45">
		<td colspan="2" style="text-align:right">			
			<button type="button" onclick="<?php if($idempleado > 0) echo "actualizar($idempleado);"; else echo "registrar();"; ?>" class="btn btn-primary">
					<?php if($idempleado > 0) echo "Guardar"; else echo "Registrar"; ?></button>			
		</td>
	</tr>
</table>
</form>