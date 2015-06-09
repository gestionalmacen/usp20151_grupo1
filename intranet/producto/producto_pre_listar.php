<form id="frm_producto" name="frm_producto">
	<div class="input-prepend input-append">
		<span class="add-on"> Buscar Producto</span>
		<input class="span3" id="txtbuscarproducto" placeholder="Ingrese producto" type="text">
		<a  onclick="load_div('contenido', 'producto/producto_reg.php');" style="cursor:pointer">
						Registrar producto</a>
	</div>
	<div id="subcontenido">
	</div>
</form>
<script>
	$("#txtbuscarproducto").keyup(
	function(event ){
		//alert($("#txtbuscarproducto").val());
		load_div("subcontenido","producto/producto_listar.php?q="+$("#txtbuscarproducto").val());
	}
	);
</script>