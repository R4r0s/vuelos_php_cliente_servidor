<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
	include "conexion.php";

	$arrayMensaje = array();
	$arrayVuelos = array();	
		
	$sql = "SELECT id as id, codigo_vuelo as codigo, origen as origen, destino as destino, fecha as fecha, hora as hora, plazas_totales as plazas_totales, plazas_disponibles as plazas_disponibles FROM vuelos";
	if(isset($_GET["idb"])){
		$sql .= " where id = '".$_GET["idb"]."'";
	}
	$result = $conn->query($sql);
	$contador = 0;
	
	if(isset($result) && $result){
	
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				
				
				
				$arrayVuelos[] = $row;
			
				$contador++;

			}
			
			$arrayMensaje["estado"] = "ok";
			$arrayMensaje["numeroVuelos"] = $contador;
			$arrayMensaje["vuelos"] = $arrayVuelos;			
			
		} else {
			$arrayMensaje["estado"] = "ok";
			$arrayMensaje["numeroEquipos"] = 0;	
		}
	}else{
		$arrayMensaje["estado"] = "error";
		$arrayMensaje["mensaje"] = "Se ha producido un error al conectar con la BD";
		$arrayMensaje["query"] = $sql;
	}
	
	$mensajeJSON = json_encode($arrayMensaje, JSON_PRETTY_PRINT);
	
	
	if(isset($_GET["debug"]) && $_GET["debug"] ==1){
		echo "<pre>";
		echo $mensajeJSON;
		echo "</pre>";
	}else{
		echo $mensajeJSON;
	}



?>