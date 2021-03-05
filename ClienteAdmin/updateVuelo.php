<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
include "conexion.php";

$parameters = file_get_contents("php://input");
$mensaje = json_decode($parameters, true);

$id = $mensaje['id'];
$codigo = $mensaje['codigo'];
$origen = $mensaje['origen'];
$destino = $mensaje['destino'];
$fecha = $mensaje['fecha'];
$hora = $mensaje['hora'];
$totales = $mensaje['totales'];
$disponibles = $mensaje['disponibles'];

$sql = "UPDATE vuelos SET codigo_vuelo = '$codigo', origen = '$origen', destino = '$destino', fecha = 'fecha', hora = 'hora', plazas_totales = '$totales', plazas_disponibles = '$disponibles' where id = $id";

$result = $conn -> query($sql);

?>