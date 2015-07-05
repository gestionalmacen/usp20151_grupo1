<?php	
        session_start();
	require_once ("../../conexion.php");        
	if(isset($_SESSION['idusuario'])){
		$cnn=conectar();
                $idtipo_salida = $_POST['idtipo_salida'];
		$query = "insert into nota_salida(idtipo_salida,fecha_registro,fecha_emision) values ($idtipo_salida,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)" ;
		if(mysql_query($query,$cnn)){
			echo "Nota de Salida Generada";
		}else{
			echo "Fallo";
		}}else {
			echo"<script language=javascript>
				location.href='../index.html';
				</script>";
		}
	
?>

