<?php
	require_once("conexion.php");
	$link=Conectarse();

	$idProvincia = 0;
	if(isset($_GET['id'])){
		$idProvincia = $_GET['id'];
	}

	$query="select *  ";
	$query.="from municipios m  ";
	$query.="where 1=1 ";
	$query.="and m.IdProvincia=".$idProvincia." ";
	$query.="order by m.Municipio ";

	$municipiosOption=mysqli_query ($link, $query);

	$items = array();
	while($municipioOption=mysqli_fetch_array($municipiosOption, MYSQLI_BOTH))
	{
		$option = array("id" => $municipioOption["IdMunicipio"], "value" => htmlentities($municipioOption["Municipio"]));
		$items[] = $option;
	}

	$data = json_encode($items);
	// Convertimos en formato JSON, luego imprimimos la data
	$response = isset($_GET['callback'])?$_GET['callback']."(".$data.")":$data;
	echo($response);
?>
