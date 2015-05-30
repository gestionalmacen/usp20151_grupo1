<form id="frm_usuario_listar" name="frm_usuario_listar">
	<div class="input-prepend input-append">
		<span class="add-on"> Buscar Usuario</span>
		<input class="span3" id="txtbuscarusuario" placeholder="Ingrese usuario" type="text">
		<a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'usuario/reg_usuario.php');" style="cursor:pointer">
						Registrar Usuario</a>
	</div>
	<div id="subcontenido" >
	</div>
</form>
<script>
	$("#txtbuscarusuario").keyup(
	function(event ){
		//alert($("#txtbuscarcliente").val());
		load_div("subcontenido","usuario/usuario_listar.php?q="+$("#txtbuscarusuario").val());
	}
	);
</script>

