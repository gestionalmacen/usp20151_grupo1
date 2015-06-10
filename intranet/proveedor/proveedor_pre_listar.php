<form id="frm_proveedor" name="frm_proveedor">
	<div class="input-prepend input-append">
		<span class="add-on"> Buscar Proveedor</span>
		<input class="span3" id="txtbuscarproveedor" placeholder="Ingrese proveedor" type="text">
		<a  onclick="load_div('contenido', 'proveedor/proveedor_reg.php');" style="cursor:pointer">
						Registrar Proveedor</a>
	</div>
	<div id="subcontenido">
	</div>
</form>
<script>
	$("#txtbuscarproveedor").keyup(
	function(event ){
		//alert($("#txtbuscarproducto").val());
		load_div("subcontenido","proveedor/proveedor_listar.php?q="+$("#txtbuscarproveedor").val());
	}
	);
</script>