<script src="intranet/forms/js_usuario.js"></script>
<form id="frmusuario_login" name="frmusuario_login" class="form-vertical">
<table width="370">
	<tr>
		<td colspan="2">
			<center><p class="form-title">Acesso al Sistema</p></center>
		</td>
	</tr>
	<tr height="45">
		<td width="100px"><label>Usuario:</label></td>
		<td><input type="text" id="txtusuario" class="form-control input-sm"
				   onkeypress="return soloLetrasPermitidas(event);"
				   onblur="limpiaPermitidas('txtusuario');"
				   placeholder="Ingrese su Usuario" maxlength="30"></td> 
	</tr>
	<tr height="45">
		<td><label>Clave:</label></td>
		<td><input type="password" id="txtcontrasena" class="form-control input-sm"		
				   onkeypress="return soloLetrasPermitidas2(event);"
				   onblur="limpiaPermitidas2('txtcontrasena');"
				   placeholder="Ingrese su Clave" maxlength="30"></td>		
	</tr>	
	<tr height="45">
		<td>			
		</td>
		<td align="right">		
			<button type="button" onclick="login();" class="btn btn-primary">Acceder</button>
		</td>
	</tr>
</table>
</form>