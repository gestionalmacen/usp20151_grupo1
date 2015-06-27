<form id="frm_usuario_ws" name="frm_usuario_ws" class="form-vertical">
<table width="373">
	<tr>
		<td colspan="2">
			<center><p class="form-title">Obtener estado de Usuario</p><br/></center>
		</td>
	</tr>
	<tr height="45">
		<td width="100px"><label>Usuario:</label></td>
                <td><input type="text" id="txtusuario" onkeypress="txLetras()" class="form-control input-sm" placeholder="Ingrese Primer Nombre"></td>
	</tr>
        <tr height="45">
		<td width="100px"><label>Clave:</label></td>
                <td><input type="text" id="txtclave"  class="form-control input-sm" placeholder="Ingrese Segundo Nombre"></td>
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
        var usuario = document.frm_usuario_ws.txtusuario;
        var clave = document.frm_usuario_ws.txtclave;
        
        if (usuario.value =="")
	{
		alert('Ingrese Usuario');
		usuario.focus();
		return;
	}
        if (clave.value =="")
	{
		alert('Ingrese Clave');
		clave.focus();
		return;
	}
        
        $.post('web_service/obtener_estado_usuario_ope.php', 
		{	usuario : usuario.value,
                        clave   : clave.value
                        
		},
		function (data){
                    alert(data);
		}
	);
    }
</script>

