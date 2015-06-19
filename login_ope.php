<?php
	session_start();
	require_once("conexion.php");
	$cnn = conectar();
	$usuario = $_POST['usuario'];
	$clave = $_POST['clave'];
	$query = "SELECT concat(e.primer_nombre,' ',e.apellido_paterno) AS 'Nombre y Apellido',u.nombre AS 'nombre',u.clave AS 'clave',u.idgrupo_usuario AS 'idgrupo_usuario',u.estado AS estado
        FROM usuario u inner join empleado e on u.idempleado=e.idempleado 
        inner join grupo_usuario g on u.idgrupo_usuario=g.idgrupo_usuario where u.nombre = '$usuario' and u.clave = md5('$clave') ;";
	$rs = mysql_query ($query,$cnn);
	$n = is_resource($rs)?mysql_num_rows($rs):0;
	if($n>0){
		$row = mysql_fetch_array($rs);
                $_SESSION['estado']=$row[4];
                if($_SESSION['estado']=='A')
                {
                    $_SESSION['idgrupo_usuario']=$row[3];
                    $query3="update usuario set fecha_acceso = CURRENT_TIMESTAMP where nombre ='".$usuario."';";
                    mysql_query($query3,$cnn);
                    $_SESSION['nombre']=$row[2];
                    $_SESSION['usuario']=$usuario;
                    echo "Bienvenido";
                }
                else
                {
                    echo "Usuario bloqueado o eliminado";
                }
		
	}else{
            $_SESSION['intentos']=$_SESSION['intentos']+1;
                if($_SESSION['intentos']==3)
                {
                    $query2="update usuario set estado='B' where nombre='".$usuario."';";
                    mysql_query($query2,$cnn);
                    $_SESSION['intentos']=0;
                    echo "Excedio el numero de intentos";
                }
                else
                {
                echo "Error en Usuario";
                }
	}
        
        
?>