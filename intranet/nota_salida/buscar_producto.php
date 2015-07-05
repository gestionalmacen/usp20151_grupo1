<form id="frm_buscar_producto" name="frm_buscar_producto">
	<div class="input-prepend input-append">
		<span class="add-on"> Buscar Producto</span>
		<input class="span3" id="txtbuscarproducto" placeholder="Ingrese Producto" type="text">
		<!--<a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'grupo_usuario/grupo_u_reg.php');" style="cursor:pointer">
						Registrar Grupo</a> -->
	</div>
	<div id="subcontenido">
	</div>
</form>
<script>
	$("#txtbuscarproducto").keyup(
	function(event ){
		//alert($("#txtbuscarcliente").val());
		load_div("subcontenido","nota_salida/producto_listar.php?q="+$("#txtbuscarproducto").val());
	}
	);
</script>


