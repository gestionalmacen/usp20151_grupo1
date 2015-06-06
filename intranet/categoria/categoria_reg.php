<form id="frm_categoria" name="frm_categoria" class="form-vertical">
<table width="373">
	<tr>
		<td colspan="2">
			<center><p class="form-title">Registro de Categoria </p><br/></center>
		</td>
	</tr>
	<tr height="45">
		<td width="100px"><label>Nombre de Categoria:</label></td>
                <td><input type="text" id="txtcategoria" onkeypress="txLetras()" class="form-control input-sm" placeholder="Ingrese categoria"></td>
	</tr>
	<tr height="45">
		<td>
		</td>
		<td>
		<!--<button type="button" class="btn btn-default">Limpiar</button>-->
			<button type="button" onclick="registrar();" class="btn btn-primary">Registrar</button>
                        
		</td>
	</tr>
</table>
</form>

<script>
    function txLetras() {
     if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122))
      event.returnValue = false;
    }
    function registrar(){
        var categoria = document.frm_categoria.txtcategoria;
        
        if (categoria.value =="")
	{
		alert('Ingrese Categoria');
		categoria.focus();
		return;
	}
        $.post('categoria/categoria_reg_ope.php', 
		{	categoria : categoria.value
		},
		function (data){
                    alert(data);
		}
	);
    }
</script>

