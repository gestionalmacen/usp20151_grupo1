<?php
	require_once ("../../conexion.php");
	$cnn=conectar();
	$q = $_GET['q'];
	$query = "SELECT u.idusuario AS 'idusuario',u.nombre AS 'Login',concat(e.primer_nombre,' ',e.segundo_nombre) AS 'Nombres',g.nombre_grupo AS 'nombre_grupo',u.fecha_acceso AS 'fecha_acceso',u.ip_acceso AS 'ip_acceso',u.fecha_alta AS 'fecha_alta',u.fecha_registro AS 'Fecha Vigencia' 
        FROM usuario u inner join empleado e on u.idempleado=e.idempleado
        inner join grupo_usuario g on u.idgrupo_usuario=g.idgrupo_usuario WHERE u.nombre like '%$q%' order by u.nombre" ;
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


