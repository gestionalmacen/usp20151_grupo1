<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$q = $_GET['q'];
	$query = "SELECT s.idsubcategoria,s.nombre as 'subcategoria' , c.nombre as 'categoria' FROM subcategoria s
        inner join categoria c on s.idcategoria=c.idcategoria  where s.nombre like '%$q%'" ;
	$rs = mysql_query($query,$cnn);
?>
<center>
	<p class="form-title"> Lista Subcategoria</p>
        
	<table class="table">
		<tr>
                        
			<td> Ctageoria </td>
			<td> Subcategoria </td>
			
		</tr>
		<?php while($row = mysql_fetch_array($rs)){ ?>
			<tr>
                              
				<td> <a  data-dismiss="modal" data-target="#myModal" onclick="load_div('contenido', 'producto/producto_pre_modificar.php?idsubcategoria=<?php echo $row[0];?>');" style="cursor:pointer">
						<?php echo $row[1];?></a> </td>
                                <td> <?php echo $row[2]?> </td>
                                
                              <!--  <td>
                                    <a data-toggle="modal" data-target="#myModal"  style="cursor:pointer" onclick="load_div('modal_body', 'grupo_usuario/grupo_mod_baja.php?idgrupo_usuario=<?php echo $row[0];?>';">Dar de baja </a>
                                    &nbsp;
                                    <a data-toggle="modal" data-target="#myModal"  style="cursor:pointer" onclick="load_div('modal_body', 'grupo_usuario/grupo_mod_alta.php?idgrupo_usuario=<?php echo $row[0];?>';">Dar de alta</a>
                                </td>	-->			
			</tr>
		
		<?php }?>
	</table>
</center>

