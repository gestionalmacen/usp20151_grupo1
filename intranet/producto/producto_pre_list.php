<form id="frmproducto" name="frmproducto">
	<div class="input-prepend input-append">
		<span class="add-on"> Buscar Producto</span>
		<input class="span3" id="txtbuscarproducto" placeholder="Ingrese producto" type="text">
		<a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'producto/producto_reg.php');" style="cursor:pointer">
						Registrar producto</a>
	</div>
	<div id="subcontenido">
	</div>
</form>
<script>
	$("#txtbuscarproducto").keyup(
	function(event ){
		//alert($("#txtbuscarproducto").val());
		load_div("subcontenido","producto/producto_list.php?q="+$("#txtbuscarproducto").val());
	}
	);
</script>