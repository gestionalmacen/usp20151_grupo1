<form id="frm_kardex" name="frm_kardex">
	<div class="input-prepend input-append">
		<span class="add-on"> Buscar Producto</span>
		<input class="span3" id="txtbuscarproducto" placeholder="Ingrese producto" type="text">
		
	</div>
	<div id="subcontenido">
	</div>
</form>
<script>
	$("#txtbuscarproducto").keyup(
	function(event ){
		//alert($("#txtbuscarproducto").val());
		load_div("subcontenido","kardex/kardex_listar.php?q="+$("#txtbuscarproducto").val());
	}
	);
</script>