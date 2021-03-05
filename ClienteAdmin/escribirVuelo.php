<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
require 'conexion.php';


$arrEsperado = array(
    "peticion" => "add",
    "jugador" => array(
        "nombre" => "EJEMPLO",
        "numero" => 3,
        "idEquipo" => 1
    )
    );

function JSONCorrectoAnnadir($recibido){

    $aux = false;

    if(isset($recibido["peticion"]) && $recibido["peticion"]=="add" ){

        if(isset($recibido["vuelos"])){

            $auxVuelo = $recibido["vuelos"];

            if(isset($auxVuelo["codigo_vuelo"]) 
                && isset($auxVuelo["origen"]) 
                && isset($auxVuelo["destino"])
				&& isset($auxVuelo["fecha"])	
				&& isset($auxVuelo["hora"])
				&& isset($auxVuelo["plazas_totales"])
				&& isset($auxVuelo["plazas_disponibles"])){
                    $aux = true;
                }

        }

    }

    return $aux;
}


/*
 * Se mostrará siempre la información en formato json para que se pueda leer desde un html (via js)
 * o una aplicación móvil o de escritorio realizada en java o en otro lenguajes
 */

$arrMensaje = array();  // Este array es el codificaremos como JSON tanto si hay resultado como si hay error

/*
 * Lo primero es comprobar que nos han enviado la información via JSON
 */

$parameters = file_get_contents("php://input");


if(isset($parameters)){

	// Parseamos el string json y lo convertimos a objeto JSON
    $mensajeRecibido = json_decode($parameters, true);




	// Comprobamos que están todos los datos en el json que hemos recibido
	// Funcion declarada en jsonEsperado.php
	if(JSONCorrectoAnnadir($mensajeRecibido)){

		$vuelo = $mensajeRecibido['vuelos']; 
		
		$codigo = $vuelo['codigo_vuelo'];
		$origen = $vuelo['origen'];
		$destino = $vuelo['destino'];
		$fecha = $vuelo['fecha'];
		$hora = $vuelo['hora'];
		$plazas_totales = $vuelo['plazas_totales'];
		$plazas_disponibles = $vuelo['plazas_disponibles'];
		
		$query  = "INSERT INTO  vuelos (codigo_vuelo,origen,destino,fecha,hora,plazas_totales,plazas_disponibles) ";
		$query .= "VALUES ('$codigo','$origen','$destino','$fecha','$hora','$plazas_totales','$plazas_disponibles')";
		
		$result = $conn->query ( $query );
		
		if (isset ( $result ) && $result) { // Si pasa por este if, la query está está bien y se ha insertado correctamente
			
			$arrMensaje["estado"] = "ok";
			$arrMensaje["mensaje"] = "Vuelo insertado correctamente";
			$lastId = $conn->insert_id;
			$arrMensaje["lastId"] = $lastId;
			
		}else{ // Se ha producido algún error al ejecutar la query
			
			$arrMensaje["estado"] = "error";
			$arrMensaje["mensaje"] = "SE HA PRODUCIDO UN ERROR AL ACCEDER A LA BASE DE DATOS";
			$arrMensaje["error"] = $conn->error;
			$arrMensaje["query"] = $query;
			
		}

		
	}else{ // Nos ha llegado un json no tiene los campos necesarios
		
		$arrMensaje["estado"] = "error";
		$arrMensaje["mensaje"] = "EL JSON NO CONTIENE LOS CAMPOS ESPERADOS";
		$arrMensaje["recibido"] = $mensajeRecibido;
		$arrMensaje["esperado"] = $arrEsperado;
	}

}else{	// No nos han enviado el json correctamente
	
	$arrMensaje["estado"] = "error";
	$arrMensaje["mensaje"] = "EL JSON NO SE HA ENVIADO CORRECTAMENTE";
	
}

$mensajeJSON = json_encode($arrMensaje,JSON_PRETTY_PRINT);

//echo "<pre>";  // Descomentar si se quiere ver resultado "bonito" en navegador. Solo para pruebas
echo $mensajeJSON;
//echo "</pre>"; // Descomentar si se quiere ver resultado "bonito" en navegador

$conn->close ();

die();

?>