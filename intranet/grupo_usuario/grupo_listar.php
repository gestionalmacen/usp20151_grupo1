<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$q = $_GET['q'];
	$query = "select * from grupo_usuario where nombre_grupo like '%$q%' order by nombre_grupo" ;
	$rs = mysql_query($query,$cnn);
?>
<center>
	<p class="form-title"> Lista Grupos de Usuario </p>
        
	<table class="table">
		<tr>
			<td> Nombre </td>
			<td> Estado </td>
                       
			
		</tr>
		<?php while($row = mysql_fetch_array($rs)){ ?>
			<tr>
				<td> <a data-toggle="modal" data-target="#myModal" onclick="load_div('modal_body', 'grupo_usuario/grupo_mod_baja.php?idgrupo_usuario=<?php echo $row[0];?>');" style="cursor:pointer">
						<?php echo $row[1];?></a> </td>
                                <td> <?php if($row[2]=='A'){echo "Activo";}else {echo"Inactivo";}?> </td>
                              <!--  <td>
                                    <a data-toggle="modal" data-target="#myModal"  style="cursor:pointer" onclick="load_div('modal_body', 'grupo_usuario/grupo_mod_baja.php?idgrupo_usuario=<?php echo $row[0];?>';">Dar de baja </a>
                                    &nbsp;
                                    <a data-toggle="modal" data-target="#myModal"  style="cursor:pointer" onclick="load_div('modal_body', 'grupo_usuario/grupo_mod_alta.php?idgrupo_usuario=<?php echo $row[0];?>';">Dar de alta</a>
                                </td>	-->			
			</tr>
		
		<?php }?>
	</table>
</center>
