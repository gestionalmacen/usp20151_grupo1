<form id="frm_grupo" name="frm_grupo" class="form-vertical">
<table width="373">
	<tr>
		<td colspan="2">
			<center><p class="form-title">Registro Grupo Usuario</p><br/></center>
		</td>
	</tr>
	<tr height="45">
		<td width="100px"><label>Nombre del grupo:</label></td>
                <td><input type="text" id="txtgrupo" onkeypress="txNombres()" class="form-control input-sm" placeholder="Ingrese nombre de grupo"></td>
	</tr>
	<tr height="45">
		<td>
		</td>
		<td>
		<!--<button type="button" class="btn btn-default">Limpiar</button>-->
			<button type="button" onclick="registrar()" class="btn btn-primary">Registrar</button>
                        
		</td>
	</tr>
</table>
</form>

<script>
    function txNombres() {
        if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122))
        event.returnValue = false;
    }
    function registrar(){
        var grupo = document.frm_grupo.txtgrupo;
        if (grupo.value =="")
	{
		alert('Ingrese Grupo');
		grupo.focus();
		return;
	}
        $.post('grupo_usuario/grupo_reg_ope.php', 
		{	grupo : grupo.value
		},
		function (data){
                    alert(data);
		}
	);
    }
</script>


