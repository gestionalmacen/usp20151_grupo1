<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
        error_reporting(0);
	$q = $_GET['q'];
        $w = $_GET['w'];
	$query = "select ns.idnota_salida,ts.descripcion,ns.fecha_registro,ns.fecha_emision from nota_salida ns
                 inner join tipo_salida ts on ns.idtipo_salida=ts.idtipo_salida where ns.fecha_registro between '$q' and '$w' order by ns.fecha_registro" ;
	$rs = mysql_query($query,$cnn);
?>
<center>
	<p class="form-title"> Lista de Notas de Salida </p>
	<table class="table">
		<tr bgcolor="lightblue">

                        <td><b> Descripcion </b></td>
			<td><b> Fecha Registro </b></td>			
			<td><b> Fecha Emision </b></td>
			
		</tr>
		<?php while($row = mysql_fetch_array($rs)){ ?>
			<tr>
				<td> <a data-toggle="modal" data-target="#myModal"  onclick="load_div('modal_body', 'producto/producto_pre_modificar.php?idproducto=<?php echo $row[0];?>');" style="cursor:pointer">
				<?php echo $row[1];?></a> </td>
				<td> <?php echo $row[2];?> </td>
				<td> <?php echo $row[3];?> </td>
				
				
			</tr>
		
		<?php }?>
	</table>
</center>

