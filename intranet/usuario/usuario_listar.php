<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$q = $_GET['q'];
	$query = "SELECT * FROM v_usuario v WHERE v.Login like '%$q%' order by v.Login" ;
	$rs = mysql_query($query,$cnn);
?>
<center>
	<p class="form-title"> Lista de Usuario </p>
        
	<table class="table">
		<tr>
                       <td> Login </td>
                       <td> Nombres </td>
                       <td> Grupo </td>
                       <td> Fecha Acceso </td>
                       <td> IP Acceso </td>
                       <td> Fecha Alta </td>
                       <td> Fecha Vigencia </td>
                      
			
		</tr>
		<?php while($row = mysql_fetch_array($rs)){ ?>
			<tr>
				<td> <a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'usuario/usuario_baja.php?idusuario=<?php echo $row[0];?>');" style="cursor:pointer">
						<?php echo $row[1];?></a> </td>
                                <td> <?php echo $row[2];?> </td>
                                <td> <?php echo $row[3];?> </td>
                                <td> <?php echo $row[4];?> </td>
                                <td> <?php echo $row[5];?> </td>
                                <td> <?php echo $row[6];?> </td>
                                <td> <?php echo $row[7];?> </td>
                            			
			</tr>
		
		<?php }?>
	</table>
</center>


