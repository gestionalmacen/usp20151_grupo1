<form id="frm_man_empleados" name="frm_man_empleado">
<table>
<tr>
<td>
	<div class="input-prepend input-append">	
		<br/>
		<table>
			<tr height="45">		
				<td colspan="3" bgcolor="#ECEEF1" class="form-subtitle">&nbsp;&nbsp;Usuarios registrados</td>									
			</tr>
			<tr>		
				<td colspan="3">&nbsp;</td>									
			</tr>
			<tr height="30">			
				<td>Buscar Usuario:&nbsp;&nbsp;</td>
				<td width="300px">
					<input type="text" id="txtusuario" name="txtusuario" class="form-control input-sm"
						   onkeypress="return soloLetras(event);"
				           onblur="limpiaLetras('txtusuario');"
						   placeholder="Nombre Usuario"  maxlength="30">
				</td>
			</tr>
			<tr height="30">
				<td><label></label></td>
				<td>					
					<label class="btn"><input type="radio" name="rbSexo" id="sexo0" value="0" onclick="buscar_usuario();" checked>&nbsp;Todo</label>
			</td>

			</tr>
		</table>
		<br/>		
	</div>
	<div id="subcontenido">
		<table class="table">	
			<tr height="30">			
				<th>Nro</th>
				<th>Nombres</th>
				<th>Grupo</th>
				<th>Fecha Registro</th>
				<th>Ultimo Acceso</th>
				<th>IP Ultimo Acceso</th>				
			</tr>
			<tr height="30">			
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>						
				<td></td>				
			</tr>
		</table>
	</div>
</td>
</tr>
</table>
</form>

<script>

/* Buscar el empleado */
	buscar_usuario();
	$("#txtusuario").keyup( function(event){ 
	buscar_usuario(); } );
function buscar_usuario(){
	limpiaLetras('txtusuario');
	var sexo      = document.frm_man_empleado.querySelector('input[name="rbSexo"]:checked').value;
	var usuario  = document.frm_man_empleado.txtusuario.value;
	load_div("subcontenido","forms/usuario/listarusuario.php?n="+usuario+"&s="+sexo);
}
</script>