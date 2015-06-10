<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$q = $_GET['q'];
	$query = "SELECT * FROM almacen WHERE nombre like '%$q%' order by nombre" ;
	$rs = mysql_query($query,$cnn);
?>
<center>
	<p class="form-title"> Lista de Almacen </p>
        
	<table class="table">
		<tr bgcolor="lightblue">
                    <td><b> Nombre de Almacen </b></td>
                       <td><b> Estado </b></td>
                       
                      
			
		</tr>
		<?php while($row = mysql_fetch_array($rs)){ ?>
			<tr>
				<td> <a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'almacen/almacen_mod.php?idalmacen=<?php echo $row[0];?>');" style="cursor:pointer">
						<?php echo $row[1];?></a> </td>
                                <td> <?php if($row[2]=='A'){echo "Activo";}else {echo"Inactivo";}?> </td>
                                
                            			
			</tr>
		
		<?php }?>
	</table>
</center>

