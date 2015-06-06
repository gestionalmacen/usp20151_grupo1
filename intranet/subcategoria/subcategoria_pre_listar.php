<form id="frm_subcategoria_listar" name="frm_subcategoria_listar">
	<div class="input-prepend input-append">
		<span class="add-on"> Buscar Subcategoria</span>
		<input class="span3" id="txtbuscarsubcategoria" placeholder="Ingrese Subcategoria" type="text">
		<a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'subcategoria/subcategoria_reg.php');" style="cursor:pointer">
						Registrar Subcategoria</a>
	</div>
	<div id="subcontenido" >
	</div>
</form>
<script>
	$("#txtbuscarsubcategoria").keyup(
	function(event ){
		//alert($("#txtbuscarcliente").val());
		load_div("subcontenido","subcategoria/subcategoria_listar.php?q="+$("#txtbuscarsubcategoria").val());
	}
	);
</script>
