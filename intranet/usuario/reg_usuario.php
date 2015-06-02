<?php
	session_start();
	require_once ("../../conexion.php");
	if(isset($_SESSION['usuario'])){
		$usuario=$_SESSION['usuario'];
                $idempleado= $_GET['idempleado'];
		$cnn=conectar();        
		$query = "select * from grupo_usuario order by nombre_grupo" ;
		$rsp = mysql_query($query,$cnn);
                
                $query = "select * from empleado where idempleado =$idempleado " ;
		$rbe = mysql_query($query,$cnn);
                $rowe = mysql_fetch_array($rbe);
	
?>
<form id="frm_usuario_reg" name="frm_usuario_reg" class="form-vertical">
<table width="400">
	<tr>
		<td colspan="2">
			<center><p class="form-title">Registro de Usuario</p><br/></center>
		</td>
	</tr>
        <tr height="45">
		<td><label>Empleado:</label></td>
		<td>
                    
                    <input type="text" value="<?php echo $rowe[0]; ?>" id="txtempleado" disabled="true" class="form-control input-sm">
                   
		</td>
                <td><a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'usuario/buscar_empleado.php');" style="cursor:pointer">
						Buscar empleado</a></td>
	</tr>
	<tr height="45">
		<td width="100px"><label>Usuario:</label></td>
		<td><input type="text" id="txtusuario" class="form-control input-sm" placeholder="Ingrese nombre de usuario"></td>
	</tr>
	<tr height="45">
		<td><label>Clave:</label></td>
		<td>
			<input type="password" id="txtclave" class="form-control input-sm" placeholder="clave del usuario">
		</td>		
	</tr>
        
        <tr height="45">
		<td><label>Pregunta:</label></td>
		<td>
			<input type="text" id="txtpregunta" class="form-control input-sm" placeholder="Ingrese Pregunta Secreta">
		</td>		
	</tr>
        <tr height="45">
		<td><label>Respuesta:</label></td>
		<td>
			<input type="text" id="txtrespuesta" class="form-control input-sm" placeholder="Ingrese su respuesta">
		</td>		
	</tr>
        <tr height="45">
		<td><label>Grupo Usuario:</label></td>
		<td>
		<select name="idgrupo_usuario" id="idgrupo_usuario" size="1">
		<option value="0" > Seleccione grupo enserio </option>
		<?php while($row = mysql_fetch_array($rsp)){ ?>
		<option value="<?php echo $row[0]; ?>"> <?php echo $row[1]; ?> </option>
		<?php } ?>
		</select>
		</td>		
	</tr>
        	
                <td>
		<!--<button type="button" class="btn btn-default">Limpiar</button>-->
			<button type="button" onclick="usuario_ope('<?php echo $rowe[0]; ?>');" class="btn btn-primary">Guardar</button>
		</td>
	</tr>
</table>
</form>

<script>
    function usuario_ope(idempleado){
	var usuario		= document.frm_usuario_reg.txtusuario;	
	var clave 		= document.frm_usuario_reg.txtclave;
	var pregunta		= document.frm_usuario_reg.txtpregunta;
	var respuesta           = document.frm_usuario_reg.txtrespuesta;
        $.post('usuario/reg_usuario_ope.php', 
		{	usuario		: usuario.value,		
			clave 		: clave.value,
                        idempleado      : idempleado,
			idgrupo_usuario : idgrupo_usuario.value, 
			pregunta	: pregunta.value,
			respuesta	: respuesta.value
		},
		function (data){
			alert('Usuario Registrado correctamente');
		}
	);
}
</script>


<?php 
	}else{	
		echo "<script language=javascript>
            location.href='../index.html';
	   </script>";	
	}
?>