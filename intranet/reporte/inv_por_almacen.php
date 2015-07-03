<?php	
	require_once("../datos/Almacen.php");
	$seccion = new Almacen();
	$rs = $seccion->listar1();
?>
<form id="frm_man_examenes" name="frm_man_examenes">
<br/>
<table>
<tr>
<td>
	<div class="input-prepend input-append">			
		<table>	
			<tr height="45">		
				<td colspan="3" bgcolor="#ECEEF1" class="form-subtitle">&nbsp;&nbsp;Inventario por Almacen</td>									
			</tr>
			<tr>		
				<td colspan="3" >&nbsp;</td>									
			</tr>			
			<tr height="30">
				<td>Almac&eacute;n:</td>
				<td>					
					<select id="cboSeccion" name="cboSeccion" onchange="buscar_examen();" class="form-control input-sm">
						<option value="0">(Todo)</option>
						<?php $nro = 0;						
						while($row = mysqli_fetch_array($rs)){ $nro++;?>
							<option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
						<?php } ?>
					</select>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr height="30">		
				<td>Buscar Almacen:&nbsp;&nbsp;</td>
				<td width="300px">
					<input type="text" id="txtexamen" class="form-control input-sm"
						   onkeypress="return soloLetras(event);"
				           onblur="limpiaLetras('txtexamen');"
						   placeholder="Ingrese nombre" maxlength="30">
				</td>
				<td><a class="btn btn-default" onclick="buscar_examen();" style="cursor:pointer">
						Actualizar
					</a>
				</td>
				<td>&nbsp;</td>				
			</tr>
		</table>
		<br/>		
	</div>
	<div id="subcontenido">
		<table class="table">	
			<tr height="30">			
				<th>Nro</th>
				<th>Examen</th>
				<th>Precio</th>
				<th>Muestra</th>	
				<th>Controles</th>													
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
/* Buscar el examen */
buscar_examen();
$("#txtexamen").keyup( function(event){ buscar_examen(); } );
function buscar_examen(){
	limpiaLetras('txtexamen');
	var seccion = document.frm_man_examenes.cboSeccion.value;
	var examen  = document.frm_man_examenes.txtexamen.value;
	load_div("subcontenido","reporte/inv_por_almacen/buscar2_click.php?n="+examen+"&s="+seccion);
}
</script>