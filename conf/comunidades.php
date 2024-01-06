<?php
	require_once("conexion.php");
	$link=Conectarse();

	$query="select *  ";
	$query.="from comunidades c  ";
	$query.="where 1=1 ";
	$query.="order by c.IdComunidad asc";

	$comunidadesOption=mysqli_query ($link, $query);

	$items = array();
	while($comunidadOption=mysqli_fetch_array($comunidadesOption, MYSQLI_BOTH))
	{
		$option = array("id" => $comunidadOption["IdComunidad"], "value" => htmlentities($comunidadOption["Comunidad"]));
		$items[] = $option;
	}

	$data = json_encode($items);
	// Convertimos en formato JSON, luego imprimimos la data
	$response = isset($_GET['callback'])?$_GET['callback']."(".$data.")":$data;
	echo($response);
?>
