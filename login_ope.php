<?php
	session_start();
	require_once("conexion.php");
	$cnn = conectar();
	$usuario = $_POST['usuario'];
	$clave = $_POST['clave'];
	$query = "SELECT * FROM v_login v where v.nombre = '$usuario' and v.clave = md5('$clave') ;";
	$rs = mysql_query ($query,$cnn);
	$n = is_resource($rs)?mysql_num_rows($rs):0;
	if($n>0){
		$row = mysql_fetch_array($rs);
                $_SESSION['estado']=$row[4];
                if($_SESSION['estado']=='A')
                {
                    $_SESSION['tipo_usuario']=$row[1];
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