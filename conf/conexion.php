<?php
function Conectarse()
{
	//Conexi�n localhost
	$enlace = mysqli_connect("localhost","root","", "puntairesmari");
	//Conexi�n web 1and1
	//$enlace = mysqli_connect("db393887321.db.1and1.com","dbo393887321","Torres2008", "db393887321");

	if (!$enlace) {
		echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		echo "errno de depuraci�n: " . mysqli_connect_errno() . PHP_EOL;
		echo "error de depuraci�n: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}
	
	mysqli_query ($enlace, "SET NAMES 'utf8'");
	return $enlace;
}
?>
