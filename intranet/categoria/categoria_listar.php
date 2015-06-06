<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$q = $_GET['q'];
	$query = "SELECT * FROM categoria WHERE nombre like '%$q%' order by nombre" ;
	$rs = mysql_query($query,$cnn);
?>
<center>
	<p class="form-title"> Lista de Categoria </p>
        
	<table class="table">
		<tr>
                       <td> Nombre de Categoria </td>
                       <td> Estado </td>
                       
                      
			
		</tr>
		<?php while($row = mysql_fetch_array($rs)){ ?>
			<tr>
				<td> <a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'categoria/categoria_mod.php?idcategoria=<?php echo $row[0];?>');" style="cursor:pointer">
						<?php echo $row[1];?></a> </td>
                                <td> <?php if($row[2]=='A'){echo "Activo";}else {echo"Inactivo";}?> </td>
                                
                            			
			</tr>
		
		<?php }?>
	</table>
</center>


