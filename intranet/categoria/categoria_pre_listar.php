<form id="frm_categoria_listar" name="frm_categoria_listar">
	<div class="input-prepend input-append">
		<span class="add-on"> Buscar Categoria</span>
		<input class="span3" id="txtbuscarcategoria" placeholder="Ingrese categoria" type="text">
		<a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'categoria/categoria_reg.php');" style="cursor:pointer">
						Registrar Categoria</a>
	</div>
	<div id="subcontenido" >
	</div>
</form>
<script>
	$("#txtbuscarcategoria").keyup(
	function(event ){
		//alert($("#txtbuscarcliente").val());
		load_div("subcontenido","categoria/categoria_listar.php?q="+$("#txtbuscarcategoria").val());
	}
	);
</script>

