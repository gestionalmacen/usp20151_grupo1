<form id="frm_man_medico" name="frm_man_medico">
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
					<input type="text" id="txtusuario" class="form-control input-sm" 
						   onkeypress="return soloLetras(event);"
				           onblur="limpiaLetras('txtusuario');"
						   placeholder="Ingrese nombre del usuario" maxlength="30">
				</td>
				<td><a class="btn btn-primary" data-toggle="modal" data-target="#myModal" 
					   onclick="load_div('modal_body', 'usuario2/reg_usuario.php');" 
				       style="cursor:pointer">
						Nuevo Usuario
					</a>
				</td>	
			</tr>
			<tr height="30">
				<td>Estado:</td>
				<td>					
					<label class="btn"><input type="radio" name="rbEstado" id="estadoA" value="A" onclick="buscar_usuario();">&nbsp;Activo</label>			
					<label class="btn"><input type="radio" name="rbEstado" id="estadoI" value="I" onclick="buscar_usuario();">&nbsp;Inactivo</label>
					<label class="btn"><input type="radio" name="rbEstado" id="estado0" value="0" onclick="buscar_usuario();" checked>&nbsp;Todo</label>
				</td>
				<td><a class="btn btn-default" onclick="buscar_usuario();" style="cursor:pointer">
						Actualizar
					</a></td>
			</tr>
		</table>
		<br/>		
	</div>
	<div id="subcontenido">
		<table class="table">	
			<tr height="30">			
				<th>Nro</th>
				<th>Usuario</th>
				<th>Estado</th>		
				<th>Pregunta</th>	
				<th>Respuesta</th>													
			</tr>
			<tr height="30">			
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
/* Buscar */
buscar_usuario();
$("#txtusuario").keyup( function(event){ buscar_usuario(); } );
function buscar_usuario(){
	limpiaLetras('txtusuario');
	var estado   = document.frm_man_medico.querySelector('input[name="rbEstado"]:checked').value;
	var usuario = document.frm_man_medico.txtusuario.value;
	load_div("subcontenido","usuario2/buscar/buscar.php?n="+usuario+"&s="+estado);
}
</script>