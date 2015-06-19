<?php 
	require_once("../usuario2/UsuarioDAL.php");
	$idusuario = 0;
	if (isset($_GET['idusuario'])) {
		$idusuario = $_GET['idusuario'];	
		$usuarioDAL = new UsuarioDAL();
		$rs = $usuarioDAL->get2($idusuario);
		$row_usu = mysqli_fetch_row($rs);		
	}
?>
<script src="usuario2/js_usuario.js"></script>
<form id="frmreg_usuario" name="frmreg_usuario" class="form-vertical">
<table width="373">
	<tr>
		<td colspan="2">
			<center><p></p></center>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<center><p class="form-title"><?php if($idusuario > 0) { echo "Actualizar Usuario"; } else { echo "Registrar Usuario"; } ?></p><br/></center>
		</td>
	</tr>
	<tr height="45">
		<td width="100px"><label>Nombres:</label></td>
		<td><input type="text" id="txtNombres" name="txtNombres" class="form-control input-sm" placeholder="nombre (obligatorio)"
			onkeypress="return soloPalabras(event);"
			onblur="limpiaPalabras('txtNombres');" 
			value="<?php if($idusuario > 0) echo $row_usu[1]; ?>" maxlength = "30">
		</td>
	</tr>
	
	<tr height="45">
		<td><label>Sexo:</label></td>
		<td>
			<label class="btn"><input type="radio" name="rbEstado" id="estadoA" value="A" <?php if($idusuario > 0) { if ($row_usu[2]=='A') echo "checked"; } ?>>&nbsp;Activo</label>			
			<label class="btn"><input type="radio" name="rbEstado" id="estadoI" value="I" <?php if($idusuario > 0) { if ($row_usu[2]=='I') echo "checked"; } ?>>&nbsp;Inactivo</label>
		</td>
	</tr>
	
	<tr height="45">
		<td><label>Apellidos:</label></td>
		<td><input type="text" id="txtApellidos" name="txtApellidos" class="form-control input-sm" placeholder="apellidos (obligatorio)"
			onkeypress="return soloPalabras(event);"
			onblur="limpiaPalabras('txtApellidos');" 
			value="<?php if($idusuario > 0) echo $row_usu[3]; ?>" maxlength = "30">
		</td>
	</tr>
	<tr height="45">
		<td><label>Apellidos:</label></td>
		<td><input type="text" id="txtApellidos" name="txtApellidos" class="form-control input-sm" placeholder="apellidos (obligatorio)"
			onkeypress="return soloPalabras(event);"
			onblur="limpiaPalabras('txtApellidos');" 
			value="<?php if($idusuario > 0) echo $row_usu[4]; ?>" maxlength = "30">
		</td>
	</tr>
	
	<tr height="45">		
		<td colspan="2" style="text-align:right">		
			<button type="button" onclick="<?php if($idusuario > 0) echo "actualizar($idusuario);"; else echo "registrar();"; ?>" class="btn btn-primary">
					<?php if($idusuario > 0) echo "Guardar"; else echo "Registrar"; ?></button>			
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<center><p></p></center>
		</td>
	</tr>
</table>
</form>