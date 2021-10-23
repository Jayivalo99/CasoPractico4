 <?php
	  $Id=$_POST['Id'];



    include('lib/nusoap.php');
    //url del webservice
	$client=new nusoap_client("https://proyectojayi.x10.mx/servidor.php?wsdl");
    
	$err = $client->getError();
	if ($err) {	echo 'Error en Constructor' . $err ; } 
    //pasando los parámetros a un array
  
	$resultado = $client->call('eliminarcelular', array('Id'=>$Id));
	
	if ($client->fault) {
	echo 'Fallo';
	print_r($result);
} else {	// Chequea errores
	$err = $client->getError();
	if ($err) {		// Muestra el error
		echo 'Error' . $err ;
	} else {		// Muestra el resultado
		
		header('location:http://localhost/celular2/index.php');
	}
}
 ?>