<form id="frmbuscar_empleado" name="frmbuscar_empleado">
<table>
<tr>
<td>
	<div class="input-prepend input-append">				
		<table>
			<tr height="30">		
				<td colspan="2" bgcolor="#ECEEF1" class="form-subtitle">&nbsp;empleados</td>									
			</tr>
			<tr>		
				<td>&nbsp;</td>									
			</tr>
			<tr height="30">			
				<td>Buscar empleado:&nbsp;&nbsp;</td>
				<td width="300px">
					<input type="text" id="txtempleado" name="txtempleado" class="form-control input-sm" 
						   onkeypress="return soloLetras(event);"
				           onblur="limpiaLetras('txtempleado');"
						   placeholder="Ingrese nombre del empleado" maxlength="30">
				</td>			
			</tr>
			<tr height="30">
				<td><label>Sexo:</label></td>
				<td>					
					<label class="btn"><input type="radio" name="rbSexo" id="sexoM" value="M" onclick="buscar_empleado();">&nbsp;Masculino</label>			
					<label class="btn"><input type="radio" name="rbSexo" id="sexoF" value="F" onclick="buscar_empleado();">&nbsp;Femenino</label>
					<label class="btn"><input type="radio" name="rbSexo" id="sexo0" value="0" onclick="buscar_empleado();" checked>&nbsp;Todo</label>
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
	var sexo      = document.frmbuscar_empleado.querySelector('input[name="rbSexo"]:checked').value;
	var empleado  = document.frmbuscar_empleado.txtempleado.value;
	load_div("subcontenido","forms/empleado/buscar1_click.php?n="+empleado+"&s="+sexo);
}
</script>