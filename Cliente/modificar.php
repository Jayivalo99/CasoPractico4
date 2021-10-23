 <?php
        $Id=$_POST['Id'];
	    $nombre=$_POST['nombre'];
		$marca=$_POST['marca'];
		$sistema_op=$_POST['sistema_op'];
		$color=$_POST['color'];
	
    include('lib/nusoap.php');
    //url del webservice
	$client=new nusoap_client("https://proyectojayi.x10.mx/servidor.php?wsdl");
    
	$err = $client->getError();
	if ($err) {	echo 'Error en Constructor' . $err ; } 
    //pasando los parámetros a un array
    $param=array('Id'=>$Id,'nombre'=>$nombre, 'marca' => $marca, 'sistema_op' => $sistema_op, 'color' => $color);
    
	$resultado = $client->call('actualizarcelular',$param);
	
	if ($client->fault) {
	echo 'Fallo';
	print_r($result);
} else {	// Chequea errores
	$err = $client->getError();
	if ($err) {		// Muestra el error
		echo 'Error' . $err ;
	} else {		// Muestra el resultado
		//echo 'Resultado';
		//print_r ($resultado);
		header('location:http://localhost/celular2/index.php');
	}
}
 ?>