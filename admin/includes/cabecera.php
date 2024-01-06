<?php
    session_start();
    if (!isset($_SESSION['registrado']))
    {
		header("Location:login.php");	
	}
	$tipo_usuario = $_SESSION['tipo_usuario'];

	require_once("../conf/traduccion.php");
	require_once("../conf/conexion.php");
	require_once("../conf/funciones.php");
	$link=Conectarse();
?>
<!DOCTYPE html>
  <html>
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="TITLE" content="Puntaires Mari"/>
		<meta name="DESCRIPTION" content="Calendario de bolillos"/>
		<meta name="KEYWORDS" content="bolillos,boixets,encuentro,trobada"/>
		<meta name="AUTHOR" content="jet"/>
		<meta http-equiv="EXPIRES" content="Mon, 31 Dec 2054 00:00:01 PST"/>
		<meta http-equiv="CHARSET" content="UTF-8"/>
		<meta http-equiv="content-LANGUAGE" content="Espa�ol"/>
		<meta http-equiv="VW96.OBJECT TYPE" content="Pag. Personal"/>
		<meta name="RATING" content="General"/>
		<meta name="REVISIT-AFTER" content="7 days"/>
		<meta name="Subject" content="Ocio"/>
		<meta name="Revisit" content="1 day"/>
		<meta name="Distribution" content="Global"/>
		<meta name="Robots" content="All"/>
	
		<title>Puntaires Mari</title>	

		<!--Import Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css"  media="screen,projection"/>

		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	</head>
	<body>