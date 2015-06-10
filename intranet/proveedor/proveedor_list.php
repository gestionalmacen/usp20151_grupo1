<form id="frm_proveedor_listar" name="frm_proveedor_listar">
	<div class="input-prepend input-append">
		<span class="add-on"> Buscar Proveedor</span>
		<input class="span3" id="txtbuscarproveedor" placeholder="Ingrese Proveedor" type="text">
		<!--<a  onclick="load_div('contenido', 'proveedor/proveedor_reg.php');" style="cursor:pointer">
						Registrar Proveedor</a>-->
	</div>
	<div id="subcontenido">
	</div>
</form>
<script>
	$("#txtbuscarproveedor").keyup(
	function(event ){
		//alert($("#txtbuscarproducto").val());
		load_div("subcontenido","proveedor/proveedor_list_normal.php?q="+$("#txtbuscarproveedor").val());
	}
	);
</script>

