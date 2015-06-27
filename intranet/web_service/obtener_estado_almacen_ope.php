<?php 
require_once('../../lib/nusoap.php'); 
$l_oClient = new nusoap_client('http://www.almacen2015.somee.com/Service1.asmx?WSDL','wsdl');
$err = $l_oClient->getError();
if ($err) {
// Display the error
echo '<p><b>Constructor error: ' . $err . '</b></p>';
// At this point, you know the call that follows will fail
}
$metodoALlamar = 'getAlmacen';
$error = $l_oClient->getError();
if ($error) {
echo '<pre style="color: red">' . $error . '</pre>';
echo '<p style="color:red;'>htmlspecialchars($l_oClient->getDebug(), ENT_QUOTES).'</p>';
die();
}

$parametro = $_POST['almacen'];


$l_stResult = $l_oClient->call(
$metodoALlamar,
array('NombreAlmacen' => $parametro),
"uri:http://www.almacen2015.somee.com/Service1.asmx?WSDL",
"uri:http://www.almacen2015.somee.com/Service1.asmx?WSDL/$metodoALlamar"); 

// Verificacion que los parametros estan ok, y si lo estan. mostrar rta.
if ($l_oClient->fault) {
echo 'Almacen no existente';
} else {
$error = $l_oClient->getError();
if ($error) {
echo '<b style="color: red">Error: ' . $error . '</b>';
} else {

 echo $l_stResult['getAlmacenResult'];
}
}