<form id="frm_man_empleados" name="frm_man_empleado">
<table>
<tr>
<td>
	<div class="input-prepend input-append">	
		<br/>
		<table>
			<tr height="45">		
				<td colspan="3" bgcolor="#ECEEF1" class="form-subtitle">&nbsp;&nbsp;Empleados registrados</td>									
			</tr>
			<tr>		
				<td colspan="3">&nbsp;</td>									
			</tr>
			<tr height="30">			
				<td>Buscar empleado:&nbsp;&nbsp;</td>
				<td width="300px">
					<input type="text" id="txtempleado" name="txtempleado" class="form-control input-sm"
						   onkeypress="return soloLetras(event);"
				           onblur="limpiaLetras('txtempleado');"
						   placeholder="Nombre o apellido del empleado"  maxlength="30">
				</td>
				<td><a class="btn btn-primary" data-toggle="modal" data-target="#myModal" 
					   onclick="load_div('modal_body', 'forms/reg_empleado.php');" 
				       style="cursor:pointer">
						Nuevo empleado
					</a>
				</td>
			</tr>
			<tr height="30">
				<td><label>Sexo:</label></td>
				<td>					
					<label class="btn"><input type="radio" name="rbSexo" id="sexoM" value="M" onclick="buscar_empleado();">&nbsp;Masculino</label>			
					<label class="btn"><input type="radio" name="rbSexo" id="sexoF" value="F" onclick="buscar_empleado();">&nbsp;Femenino</label>
					<label class="btn"><input type="radio" name="rbSexo" id="sexo0" value="0" onclick="buscar_empleado();" checked>&nbsp;Todo</label>
				</td>
				<td><a class="btn btn-default" onclick="buscar_empleado();" style="cursor:pointer">
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
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>Edad</th>
				<th>Sexo</th>
				<th>DNI</th>				
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
buscar_empleado();
$("#txtempleado").keyup( function(event){ buscar_empleado(); } );
function buscar_empleado(){
	limpiaLetras('txtempleado');
	var sexo      = document.frm_man_empleado.querySelector('input[name="rbSexo"]:checked').value;
	var empleado  = document.frm_man_empleado.txtempleado.value;
	load_div("subcontenido","forms/empleado/listar.php?n="+empleado+"&s="+sexo);
}
</script>