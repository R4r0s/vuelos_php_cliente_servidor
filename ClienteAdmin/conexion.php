<?php

// Desactivar toda las notificaciónes del PHP

//error_reporting(0);

$servername = "localhost";
$user = "root";
$password = "";
$dbname = "adat_vuelos_php";
$conn = new mysqli($servername, $user,$password,$dbname);
// Check connection
if ($conn->connect_error) {
	$arrayMensaje = array();
	$arrayMensaje["estado"]= "error";
	$arrayMensaje["mensaje"] = "No se puede conectar a la BD";
	$mensajeJSON = json_encode($arrayMensaje, JSON_PRETTY_PRINT);
	die($mensajeJSON);
}


?>