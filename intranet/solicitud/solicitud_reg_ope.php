<?php	
        session_start();
	require_once ("../../conexion.php");        
	if(isset($_SESSION['idusuario'])){
		$cnn=conectar();
		$idusuario = $_SESSION['idusuario'];
                $select="SELECT e.idarea FROM usuario u 
                inner join empleado e on u.idempleado=e.idempleado where u.idusuario=$idusuario";
                $s=mysql_query($select,$cnn);
                $id=  mysql_fetch_array($s);
                $ida=$id[0];
		$query = "insert into solicitud (idusuario,idarea,fecha,estado) values ($idusuario,$ida,CURRENT_TIMESTAMP,'P')" ;
		if(mysql_query($query,$cnn)){
			echo "Solicitud Registrada";
		}else{
			echo "Fallo";
		}}else {
			echo"<script language=javascript>
				location.href='../index.html';
				</script>";
		}
	
?>

