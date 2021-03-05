<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
include "conexion.php";
$parameters = file_get_contents("php://input");
$mensaje = json_decode($parameters, true);
$id = $mensaje['id'];
$sql = "DELETE FROM vuelos WHERE id = $id";
$result = $conn -> query($sql);

?>