<?php
	session_start();
	require_once ("../../conexion.php");
	if(isset($_SESSION['usuario'])){
		$usuario=$_SESSION['usuario'];
		$cnn=conectar();
                error_reporting(0);
                $idproducto =$_GET['idproducto'];
                
		$query = "select * from tipo_salida order by descripcion" ;
		$rsp = mysql_query($query,$cnn);
                
                $uni_me = "select * from unidad_medida order by descripcion" ;
		$rup = mysql_query($uni_me,$cnn);
                
                $query = "select p.idproducto,p.idunidad_medida,um.descripcion,p.nombre from producto p 
                        inner join unidad_medida um on p.idunidad_medida=um.idunidad_medida where p.idproducto =$idproducto " ;
		$rbe = mysql_query($query,$cnn);
                $rowe = mysql_fetch_array($rbe);
	
?>
<form id="frm_notasalida_reg" name="frm_notasalida_reg" class="form-vertical">
<table width="400">
	<tr>
		<td colspan="2">
			<center><p class="form-title">Registro de Nota de Salida</p><br/></center>
		</td>
       <tr height="45">
		<td><label>Tipo de Salida:</label></td>
		<td>
		<select name="idtipo_salida" id="idtipo_salida" size="1">
		<option value="0" > Seleccione el tipo de la Salida </option>
		<?php while($row = mysql_fetch_array($rsp)){ ?>
		<option value="<?php echo $row[0]; ?>"> <?php echo $row[1]; ?> </option>
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
	</tr>
                <tr height="45">
		<td><label>Producto:</label></td>
		
                    
                <input type="text" value="<?php echo $rowe[0]; ?>" style="visibility: hidden" id="txtempleado" disabled="true" class="form-control input-sm">
                   
		
                <td>
                    
                    <input type="text" value="<?php echo $rowe[3]; ?>" id="txtempleado" disabled="true" class="form-control input-sm">
                   
		</td>
                <td><a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'nota_salida/buscar_producto.php');" style="cursor:pointer">
						Buscar Producto</a></td>
	</tr> 


   
        <tr height="45">
		<td><label>Cantidad Entregada:</label></td>
		<td>
                    <input type="text" id="txtcantidad" onkeypress="ValidaSoloNumeros()" class="form-control input-sm" placeholder="Ingrese Cantidad Entregada">
		</td>
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
    
    <div id="detalle_notasalida">
    </div>   
</form>
<script>
    
    function ValidaSoloNumeros() {
    if ((event.keyCode < 48) || (event.keyCode > 57)) 
    event.returnValue = false;
    }
        function mostrar_detalle()
        {
            load_div("detalle_notasalida","nota_salida/notasalida_listar2.php");
        }
        
        function agregar_producto(idproducto)
        {
            var cantidad = document.frm_notasalida_reg.txtcantidad;
            var idunidad_medida = document.frm_notasalida_reg.txtidunidad_medida;
            
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
            $.post('nota_salida/detalle_notasalida_reg_ope.php', 
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
        function generar()
        {
            
            if(idtipo_salida.value==0)
            {
                alert('seleccione un tipo de salida');
		return;
            }
            $.post('nota_salida/notasalida_reg_ope.php', 
		{	
			idtipo_salida : idtipo_salida.value
		},
		function (data){
			alert(data);
		}
	);
        document.getElementById("idarea").disabled=true;
        document.getElementById("reg_soli").disabled=true;
        }
</script>
<?php 

	}else{	
		echo "<script language=javascript>
            location.href='../index.html';
	   </script>";	
	}
?>