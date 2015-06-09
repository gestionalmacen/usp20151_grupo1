<form id="frm_buscar_subcategoria" name="frm_buscar_subcategoria">
	<div class="input-prepend input-append">
		<span class="add-on"> Buscar subcategoria</span>
		<input class="span3" id="txtbuscarsubcategoria" placeholder="Ingrese subcategoria" type="text">
		<!--<a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'grupo_usuario/grupo_u_reg.php');" style="cursor:pointer">
						Registrar Grupo</a> -->
	</div>
	<div id="subcontenido">
	</div>
</form>
<script>
	$("#txtbuscarsubcategoria").keyup(
	function(event ){
		//alert($("#txtbuscarcliente").val());
		load_div("subcontenido","producto/subcategoria_listar.php?q="+$("#txtbuscarsubcategoria").val());
	}
	);
</script>

