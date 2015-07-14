<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
        error_reporting(0);
	$q = $_GET['q'];
	$query = "select s.idsolicitud,u.nombre,a.nombre,s.fecha,s.estado from solicitud s
                 inner join usuario u on u.idusuario=s.idusuario
                 inner join area a on a.idarea=s.idarea
                 where s.fecha between '$q' and CURRENT_TIMESTAMP order by s.fecha" ;
	$rs = mysql_query($query,$cnn);
?>
<center>
	<p class="form-title"> Lista de Solicitudes </p>
	<table class="table">
		<tr bgcolor="lightblue">

                        <td><b> Usuario </b></td>
			<td><b> Area </b></td>			
			<td><b> Fecha </b></td>
                        <td><b> Estado </b></td>
			
		</tr>
		<?php while($row = mysql_fetch_array($rs)){ ?>
			<tr>
				<td> <a data-toggle="modal"   onclick="load_div('contenido', 'solicitud/solicitud_pre_modificar.php?idsolicitud=<?php echo $row[0];?>');" style="cursor:pointer">
				<?php echo $row[1];?></a> </td>
				<td> <?php echo $row[2];?> </td>
				<td> <?php echo $row[3];?> </td>
                                <td> <?php if($row[4]=='P') {echo 'Pendiente';} else {echo 'Entregado';} ;?> </td>
				
				
			</tr>
		
		<?php }?>
	</table>
</center>
