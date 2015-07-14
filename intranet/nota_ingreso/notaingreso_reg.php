<?php
	session_start();
	require_once ("../../conexion.php");
	if(isset($_SESSION['usuario'])){
		$usuario=$_SESSION['usuario'];
		$cnn=conectar();
                error_reporting(0);
                $idproducto =$_GET['idproducto'];
                
		$query = "select * from tipo_ingreso order by descripcion" ;
		$rsp = mysql_query($query,$cnn);
                
                $query = "select * from proveedor order by nombre" ;
		$rspro = mysql_query($query,$cnn);
                
                $uni_me = "select * from unidad_medida order by descripcion" ;
		$rup = mysql_query($uni_me,$cnn);
                
                $query = "select p.idproducto,p.idunidad_medida,um.descripcion,p.nombre from producto p 
                        inner join unidad_medida um on p.idunidad_medida=um.idunidad_medida where p.idproducto =$idproducto  " ;
		$rbe = mysql_query($query,$cnn);
                $rowe = mysql_fetch_array($rbe);
	
?>
<form id="frm_notaingreso_reg" name="frm_notaingreso_reg" class="form-vertical">
<table width="400">
	<tr>
		<td colspan="2">
			<center><p class="form-title">Registro de Nota de Ingreso</p><br/></center>
		</td>
       <tr height="45">
		<td><label>Tipo de Ingreso:</label></td>
		<td>
		<select name="idtipo_ingreso" id="idtipo_ingreso" size="1">
		<option value="0" > Seleccione el tipo de ingreso </option>
		<?php while($rowti = mysql_fetch_array($rsp)){ ?>
		<option value="<?php echo $rowti[0]; ?>"> <?php echo $rowti[1]; ?> </option>
		<?php } ?>
		</select>
		</td>

                
	</tr>
        <tr height="45">
		<td><label>Proveedor:</label></td>
		<td>
		<select name="idproveedor" id="idproveedor" size="1">
		<option value="0" > Seleccione el Proveedor </option>
		<?php while($rowpro = mysql_fetch_array($rspro)){ ?>
		<option value="<?php echo $rowpro[0]; ?>"> <?php echo $rowpro[1]; ?> </option>
		<?php } ?>
		</select>
		</td>

                
	</tr>
        <tr>
            <td></td>
                <td>
                    <button type="button" id="reg_soli" onclick="generar();" class="btn btn-primary">Generar</button>
                </td>
        </tr>


       <tr height="45">
		<td><label>Producto:</label></td>
		
                    
       <input type="text" value="<?php echo $rowe[0]; ?>" style="visibility: hidden" id="txtempleado" disabled="true" class="form-control input-sm">
                   
		<td>
                    
                    <input type="text" value="<?php echo $rowe[3]; ?>" id="txtempleado" disabled="true" class="form-control input-sm">
                   
		</td>
                <td><a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'nota_ingreso/buscar_producto.php');" style="cursor:pointer">
						Buscar Producto</a></td>
	</tr>
   
        <tr height="45">
		<td><label>Cantidad Ingresada:</label></td>
		<td>
                    <input type="text" id="txtcantidad" onkeypress="ValidaSoloNumeros()" class="form-control input-sm" placeholder="Ingrese Cantidad a Ingresar">
		</td>		
	</tr>
        <tr height="45">
		<td><label>Unidad de Medida:</label></td>
     
                   <input type="text" value="<?php echo $rowe[1]; ?>" style="visibility: hidden" id="txtidunidad_medida"  disabled="true" class="form-control input-sm">                
		
		<td>
                    
                    <input type="text" value="<?php echo $rowe[2]; ?>" id="txtdescripcion_um"  disabled="true" class="form-control input-sm">
                   
		</td>

                
	</tr>
        	
                <td>
		<!--<button type="button" class="btn btn-default">Limpiar</button>-->
                <button type="button"  id="agre_deta" onclick="agregar_producto('<?php echo $rowe[0];?>');" class="btn btn-primary">Agregar Producto</button>
		</td>
	</tr>
</table>
    
    <div id="detalle_notaingreso">
    </div>   
</form>
<script>
        function ValidaSoloNumeros() 
        {
            if ((event.keyCode < 48) || (event.keyCode > 57)) 
            event.returnValue = false;
        }
        function mostrar_detalle()
        {
            load_div("detalle_notaingreso","nota_ingreso/notaingreso_listar2.php");
        }
        function generar()
        {
            
            if(idtipo_ingreso.value==0)
            {
                alert('Seleccione un Tipo de Ingreso');
		return;
            }
            if(idproveedor.value==0)
            {
                alert('Seleccione un Proveedor');
		return;
            }
            $.post('nota_ingreso/notaingreso_reg_ope.php', 
		{	
			idtipo_ingreso : idtipo_ingreso.value,
                        idproveedor    : idproveedor.value
		},
		function (data){
			alert(data);
		}
	);
        document.getElementById("idarea").disabled=true;
        document.getElementById("reg_soli").disabled=true;
        }
        function agregar_producto(idproducto)
        {
            var cantidad = document.frm_notaingreso_reg.txtcantidad;
            var idunidad_medida = document.frm_notaingreso_reg.txtidunidad_medida;
            if(idproducto.value=='')
            {
                alert('Seleccione producto');
                return;
            }
            if(cantidad.value=='')
            {
                alert('Ingrese Cantidad');
                cantidad.focus();
                return;
            }
            if(idunidad_medida.value=='')
            {
                alert('Ingrese Unidad de Medida');
                return;
            }
            $.post('nota_ingreso/detalle_notaingreso_reg_ope.php', 
		{	
                        cantidad   :cantidad.value,
			idproducto : idproducto,
                        idunidad_medida : idunidad_medida.value
		},
		function (data){
			alert(data);
                        mostrar_detalle();
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

