<?php
	session_start();
	require_once ("../../conexion.php");
	if(isset($_SESSION['usuario'])){
		$usuario=$_SESSION['usuario'];
		$cnn=conectar();     
                $idproducto =$_GET['idproducto'];
                
		$query = "select * from area order by nombre" ;
		$rsp = mysql_query($query,$cnn);
                
                $query = "select * from producto where idproducto =$idproducto " ;
		$rbe = mysql_query($query,$cnn);
                $rowe = mysql_fetch_array($rbe);
	
?>
<form id="frm_solicitud_reg" name="frm_solicitud_reg" class="form-vertical">
<table width="400">
	<tr>
		<td colspan="2">
			<center><p class="form-title">Registro de Solicitud</p><br/></center>
		</td>
	</tr>
        <tr height="45">
		<td><label>Area:</label></td>
		<td>
		<select name="idarea" id="idarea" size="1">
		<option value="0" > Seleccione Area </option>
		<?php while($row = mysql_fetch_array($rsp)){ ?>
		<option value="<?php echo $row[0]; ?>"> <?php echo $row[1]; ?> </option>
		<?php } ?>
		</select>
		</td>
                <td>
                    <button type="button" onclick="registrar_solicitud();" class="btn btn-primary">Registrar Solicitud</button>
                </td>
                
	</tr>
        <tr height="45">
		<td><label>Producto:</label></td>
		<td>
                    
                    <input type="text" value="<?php echo $rowe[0]; ?>" id="txtempleado" disabled="true" class="form-control input-sm">
                   
		</td>
                <td><a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'solicitud/buscar_producto.php');" style="cursor:pointer">
						Buscar Producto</a></td>
	</tr>    
        <tr height="45">
		<td><label>Cantidad Solicitada:</label></td>
		<td>
			<input type="text" id="txtcantidad" class="form-control input-sm" placeholder="Ingrese Cantidad Solicitada">
		</td>		
	</tr>
        	
                <td>
		<!--<button type="button" class="btn btn-default">Limpiar</button>-->
			<button type="button" onclick="agregar_producto('<?php echo $rowe[0];?>');" class="btn btn-primary">Agregar Producto</button>
		</td>
	</tr>
</table>
</form>

<?php 

	}else{	
		echo "<script language=javascript>
            location.href='../index.html';
	   </script>";	
	}
?>