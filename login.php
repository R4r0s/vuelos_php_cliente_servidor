<?php


$name = $_GET['user'];
$contraseña = $_GET['pass'];

$admin = "admin";
$contrasenaAdmin = "admin";
$user = "user";
$contrasenaUser = "123";

if($name == $admin && $contraseña == $contrasenaAdmin)
{
	header('Status: 301 Moved Permanently', false, 301);
	header("Location: http://localhost/php/Adat_Trbajo_final/ClienteAdmin/clienteAdmin.html");
	exit;
}
else if ($name == $user && $contraseña == $contrasenaUser) 
{
	header('Status: 301 Moved Permanently', false, 301);
	header("Location: http://localhost/php/Adat_Trbajo_final/ClienteUser/clienteUser.html");
	exit;
}
else{
	header('Status: 301 Moved Permanently', false, 301);
	header("Location: http://localhost/php/Adat_Trbajo_final/index.html");
	exit;
}
	


?>