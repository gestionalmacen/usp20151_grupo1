<form id="frm_almacen_ws" name="frm_almacen_ws" class="form-vertical">
<table width="373">
	<tr>
		<td colspan="2">
			<center><p class="form-title">Obtener Estado de Almacen </p><br/></center>
		</td>
	</tr>
	<tr height="45">
		<td width="100px"><label>Nombre de Almacen:</label></td>
                <td><input type="text" id="txtalmacen" onkeypress="txLetras()" class="form-control input-sm" placeholder="Ingrese Almacen"></td>
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
        var almacen = document.frm_almacen_ws.txtalmacen;
        if (almacen.value =="")
	{
		alert('Ingrese Almacen');
		almacen.focus();
		return;
	}
        $.post('web_service/obtener_estado_almacen_ope.php', 
		{	almacen : almacen.value
		},
		function (data){
                    alert(data);
		}
	);
    }
</script>