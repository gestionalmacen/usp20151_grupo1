<form id="frm_grupo" name="frm_grupo">
	<div class="input-prepend input-append">
		<span class="add-on"> Buscar grupo</span>
		<input class="span3" id="txtbuscargrupo" placeholder="Ingrese grupo" type="text">

	</div>
	<div id="subcontenido">
	</div>
</form>
<script>
	$("#txtbuscargrupo").keyup(
	function(event ){
		//alert($("#txtbuscarcliente").val());
		load_div("subcontenido","grupo_usuario/grupo_listar.php?q="+$("#txtbuscargrupo").val());
	}
	);
</script>
