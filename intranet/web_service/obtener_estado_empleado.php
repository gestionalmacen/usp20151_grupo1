<form id="frm_empleado_ws" name="frm_empleado_ws" class="form-vertical">
<table width="373">
	<tr>
		<td colspan="2">
			<center><p class="form-title">Obtener estado de Empleado</p><br/></center>
		</td>
	</tr>
	<tr height="45">
		<td width="100px"><label>Primer Nombre:</label></td>
                <td><input type="text" id="txtp_nombre" onkeypress="txLetras()" class="form-control input-sm" placeholder="Ingrese Primer Nombre"></td>
	</tr>
        <tr height="45">
		<td width="100px"><label>Segundo Nombre:</label></td>
                <td><input type="text" id="txts_nombre" onkeypress="txLetras()" class="form-control input-sm" placeholder="Ingrese Segundo Nombre"></td>
	</tr>
        <tr height="45">
		<td width="100px"><label>Primer Apellido:</label></td>
                <td><input type="text" id="txtape_paterno" onkeypress="txLetras()" class="form-control input-sm" placeholder="Ingrese Primer Apellido"></td>
	</tr>
        <tr height="45">
		<td width="100px"><label>Segundo Apellido:</label></td>
                <td><input type="text" id="txtape_materno" onkeypress="txLetras()" class="form-control input-sm" placeholder="Ingrese Segundo Apelldio"></td>
	</tr>
	<tr height="45">
		<td>
		</td>
		<td>
		<!--<button type="button" class="btn btn-default">Limpiar</button>-->
			<button type="button" onclick="consultar();" class="btn btn-primary">Consultar</button>
                        
		</td>
	</tr>
</table>
</form>
<script>
 function txLetras() {
 if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122))
  event.returnValue = false;
}
        function consultar(){
        var pnombre = document.frm_empleado_ws.txtp_nombre;
        var snombre = document.frm_empleado_ws.txts_nombre;
        var ape_pa  = document.frm_empleado_ws.txtape_paterno;
        var ape_ma  = document.frm_empleado_ws.txtape_materno;
        if (pnombre.value =="")
	{
		alert('Ingrese Primer Nombre');
		pnombre.focus();
		return;
	}
        if (snombre.value =="")
	{
		alert('Ingrese Segundo Nombre');
		anombre.focus();
		return;
	}
        if (ape_pa.value =="")
	{
		alert('Ingrese Primer Apellido');
		ape_pa.focus();
		return;
	}
        if (ape_ma.value =="")
	{
		alert('Ingrese Segundo Apellido');
		ape_ma.focus();
		return;
	}
        $.post('web_service/obtener_estado_empleado_ope.php', 
		{	pnombre : pnombre.value,
                        snombre : snombre.value,
                        ape_pa  : ape_pa.value,
                        ape_ma  : ape_ma.value
		},
		function (data){
                    alert(data);
		}
	);
    }
</script>
