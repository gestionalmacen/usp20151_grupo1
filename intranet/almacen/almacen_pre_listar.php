<form id="frm_almacen_listar" name="frm_almacen_listar">
	<div class="input-prepend input-append">
		<span class="add-on"> Buscar almacen</span>
		<input class="span3" id="txtbuscaralmacen" placeholder="Ingrese almacen" type="text">
		<a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'almacen/reg_almacen.php');" style="cursor:pointer">
						Registrar Almacen</a>
	</div>
	<div id="subcontenido" >
	</div>
</form>
<script>
	$("#txtbuscaralmacen").keyup(
	function(event ){
		//alert($("#txtbuscarcliente").val());
		load_div("subcontenido","almacen/almacen_listar.php?q="+$("#txtbuscaralmacen").val());
	}
	);
</script>