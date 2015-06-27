<form id="frm_proveedor_ws" name="frm_proveedor_ws" class="form-vertical">
<table width="373">
	<tr>
		<td colspan="2">
			<center><p class="form-title">Obtener estado de Proveedor </p><br/></center>
		</td>
	</tr>
	<tr height="45">
		<td width="100px"><label>RUC de Proveedor:</label></td>
                <td><input type="text" id="txtruc" onkeypress="ValidaSoloNumeros()" class="form-control input-sm" placeholder="Ingrese Almacen"></td>
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
        function ValidaSoloNumeros() {
        if ((event.keyCode < 48) || (event.keyCode > 57)) 
        event.returnValue = false;
    }
        function consultar(){
        var ruc = document.frm_proveedor_ws.txtruc;
        if (ruc.value =="")
	{
		alert('Ingrese RUC');
		ruc.focus();
		return;
	}
        $.post('web_service/obtener_estado_proveedor_ope.php', 
		{	ruc : ruc.value
		},
		function (data){
                    alert(data);
		}
	);
    }
</script>

