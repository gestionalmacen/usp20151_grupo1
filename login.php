<form id="frm_login" name="frm_login" class="form-vertical">
<table width="373">
	<tr>
		<td colspan="2">
			<center><p class="form-title">Acceso al Sistema</p><br/></center>
		</td>
	</tr>
	<tr height="45">
		<td width="100px"><label>Usuario:</label></td>
		<td><input type="text" id="txtusuario" class="form-control input-sm" placeholder="Ingrese su usuario"></td>
	</tr>
	<tr height="45">
		<td><label>Clave:</label></td>
		<td>
			<input type="password" id="txtclave" class="form-control input-sm" placeholder="Ingrese su clave">
		</td>		
	</tr>	
	<tr height="45">
		<td>
		</td>
		<td>
		<!--<button type="button" class="btn btn-default">Limpiar</button>-->
			<button type="button" onclick="login();" class="btn btn-primary">Acceder</button>
                        
		</td>
	</tr>
</table>
</form>