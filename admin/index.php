<?php
	session_start();
	/*if (!isset($_SESSION['registrado']))
	{
		header("Location:login.php?abrirpagina=1");	
	}*/
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

		<script type="text/javascript" src="../js/funciones.js"></script>
		<script type="text/javascript" src="../js/prototype.js"></script>
		<script type="text/javascript" src="../js/ajax.js"></script>
		
		<link rel="stylesheet" href="../css/plantilla.css">
		
	</head>
	<body class="administracion">
	<?php
		$ruta = substr($_SERVER['SCRIPT_FILENAME'], 0, strrpos($_SERVER['SCRIPT_FILENAME'], '/'));
		$_SESSION["ruta"] = $ruta.="/";
	?>
	<table border="0" width="100%">
		<tr>
			<td width="15%" valign="top">
				<div id="menu">
					<?php require_once("menu.php") ?>
				</div>
			</td>
			<td valign="top">
				<div id="principal">
				</div>
			</td>
		</tr>
	</table>
</body>
</html>