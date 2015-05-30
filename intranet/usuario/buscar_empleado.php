<form id="frm_buscar_empleado" name="frm_buscar_empleado">
	<div class="input-prepend input-append">
		<span class="add-on"> Buscar empleado</span>
		<input class="span3" id="txtbuscarempleado" placeholder="Ingrese Empleado" type="text">
		<!--<a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'grupo_usuario/grupo_u_reg.php');" style="cursor:pointer">
						Registrar Grupo</a> -->
	</div>
	<div id="subcontenido">
	</div>
</form>
<script>
	$("#txtbuscarempleado").keyup(
	function(event ){
		//alert($("#txtbuscarcliente").val());
		load_div("subcontenido","usuario/empleado_listar.php?q="+$("#txtbuscarempleado").val());
	}
	);
</script>

