<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$q = $_GET['q'];
	$query = "select s.idsubcategoria, s.nombre as 'subcategoria',c.nombre as 'categoria'  from subcategoria s 
        inner join categoria c on s.idcategoria=c.idcategoria where s.nombre like '%$q%' order by s.nombre ;" ;
	$rs = mysql_query($query,$cnn);
?>
<center>
	<p class="form-title"> Lista de Subcategoria </p>
        
	<table class="table">
		<tr bgcolor="lightblue">
                       
                       <td> Nombre de Subcategoria </td>
                       <td> Nombre de Categoria </td>
                       		
		</tr>
		<?php while($row = mysql_fetch_array($rs)){ ?>
			<tr>
				<td><?php echo $row[1];?></td>
                                <td> <?php echo $row[2];?> </td>
                                
                            			
			</tr>
		
		<?php }?>
	</table>
</center>




