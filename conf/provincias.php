<?php
	require_once("conexion.php");
	$link=Conectarse();

	$idComunidad = 0;
	if(isset($_GET['id'])){
		$idComunidad = $_GET['id'];
	}

	$query="select *  ";
	$query.="from provincias p  ";
	$query.="where 1=1 ";
	$query.="and p.IdComunidad=".$idComunidad." ";
	$query.="order by p.IdProvincia ";

	$provinciasOption=mysqli_query ($link, $query);

	$items = array();
	while($provinciaOption=mysqli_fetch_array($provinciasOption, MYSQLI_BOTH))
	{
		$option = array("id" => $provinciaOption["IdProvincia"], "value" => htmlentities($provinciaOption["Provincia"]));
		$items[] = $option;
	}

	$data = json_encode($items);
	// Convertimos en formato JSON, luego imprimimos la data
	$response = isset($_GET['callback'])?$_GET['callback']."(".$data.")":$data;
	echo($response);
?>