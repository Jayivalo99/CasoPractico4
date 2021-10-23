<?php
require_once 'conexion.php';
require_once 'lib/nusoap.php';

//insertar celular	
function  insertcelular($nombre,$marca,$sistema_op,$color){
	try{
		$conexion=new conexion();
		$consulta=$conexion->prepare("INSERT INTO celular(nombre,marca,sistema_op,color)
		       VALUES(:nombre,:marca,:sistema_op,:color)");

		$consulta -> bindParam(":nombre",$nombre,PDO::PARAM_STR);
		$consulta -> bindParam(":marca",$marca,PDO::PARAM_STR);
		$consulta -> bindParam(":sistema_op",$sistema_op,PDO::PARAM_STR);
		$consulta -> bindParam(":color",$color,PDO::PARAM_STR);
		$consulta -> execute();
		$ultimoId=$conexion->lastInsertId();
		return join(",",array($ultimoId));


		} catch (Exception $e)
	
			{
			return join(",",array(false));
			}
}
//termina insertar celular

//funcion de devoler los registros
function visualizarcelular(){
  	try{
  		$conexion=new conexion();
		$consulta1=$conexion->prepare("SELECT Id,nombre,marca,sistema_op,color FROM celular");
		$consulta1 -> execute();
		while ($tabla = $consulta1->fetch(PDO::FETCH_ASSOC)){
			return $tabla;
		}
		

		//}
  	}catch(Exception $e){
  		echo 'Error='.$e->getMessage();
  	}

  	}

//fin de devolver celular














//funcion para actualizar los celulares (registros)/

function actualizarcelular($Id,$nombre,$marca,$sistema_op,$color){
  	try{
  		$conexion=new conexion();
		$consulta2=$conexion->prepare("UPDATE celular SET nombre = :nombre , marca = :marca, sistema_op = :sistema_op , color = :color WHERE Id = :Id");

		$consulta2 -> bindParam(":nombre",$nombre,PDO::PARAM_STR);
		$consulta2 -> bindParam(":marca",$marca,PDO::PARAM_STR);
		$consulta2 -> bindParam(":sistema_op",$sistema_op,PDO::PARAM_STR);
		$consulta2 -> bindParam(":color",$color,PDO::PARAM_STR);
		$consulta2 -> bindParam(":Id",$Id,PDO::PARAM_INT);
		$consulta2 -> execute();
		$resultado = $consulta2->rowCount();
		if($resultado > 0){
			return join(",",array(true));
		}
		else{
			return join(",",array(false));	
		}

  	}catch(Exception $e){
  		return join(",",array(false));	
  	}

}//Fin de la función actualiza

//Función delete celular
function eliminarcelular($Id){
  	try{
  		$conexion=new conexion();
		$consulta3=$conexion->prepare("DELETE FROM celular WHERE Id =?");
		$consulta3->execute(array($Id));
		$resultadod = $consulta3->rowCount();

		if($resultadod > 0){
			return join(",",array(true));
		}
		else{
			return join(",",array(false));	
		}

  	}catch(Exception $e){
  		return join(",",array(false));	
  	} 
  	}//fin función delete
  	
//arreglo para visulizar los datos





$server = new nusoap_server();
$server -> configureWSDL("celularservice","urn:celularservice");
//insertar
$server->register("insertcelular",
		array("nombre"=>"xsd:string","marca"=>"xsd:string","sistema_op"=>"xsd:string","color"=>"xsd:string"),
		array("return"=>"xsd:string"),
		"urn:celularservice",
		"urn:celularservice#insertcelular",
		"rpc",
		"encoded",
		"Metodo que inserta un producto de celular");
//visualizarcelular


$server->wsdl->addComplexType(
'paramsIn',
'complexType',
'struct',
'all',
'',
array());

$server->wsdl->addComplexType(
'paramsOut',
'complexType',
'struct',
'all',
'',
array(
'Id'=>array('name'=> 'Id', 'type' => 'xsd:string'),
'nombre'=>array('name'=> 'nombre', 'type' => 'xsd:string'),
'marca'=>array('name'=> 'marca', 'type' => 'xsd:string'),
'sistema_op'=>array('name'=> 'sistema_op', 'type' => 'xsd:string'),
'color'=>array('name'=> 'color', 'type' => 'xsd:string')	
)
);

$server->register("visualizarcelular",
        array(),
        array("return" => "tns:paramsOut"),
        "urn:motoservice",
        "urn:motoservice#visualizarcelular",
        "rpc",
        "encoded",
        "Metodo que devuelve los registros de celulares");




//actualizar
$server->register("actualizarcelular",
        array("Id" => "xsd:integer", "nombre" => "xsd:string","marca" => "xsd:string","sistema_op" => "xsd:string","color" => "xsd:string"),
        array("return" => "xsd:string"),
        "urn:celularservice",
        "urn:celularservice#actualizarcelular",
        "rpc",
        "encoded",
        "Metodo que actualiza un registro de celular");
//eliminar
$server->register("eliminarcelular",
        array("Id" => "xsd:integer"),
        array("return" => "xsd:string"),
        "urn:celularservice",
        "urn:celularservice#eliminarcelular",
        "rpc",
        "encoded",
        "Metodo que elimina los registros de celulares");

//es un flujo de sólo lectura que permite leer datos del cuerpo solicitado
$post =file_get_contents('php://input');
$server->service($post);

?>