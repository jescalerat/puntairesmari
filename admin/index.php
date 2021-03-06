<?php
  	session_start();
  	if (!isset($_SESSION['registrado']))
	{
		header("Location:login.php");	
	}
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
		
		<script LANGUAGE="JavaScript">
			function ejecutarAccion(url)
			{
				var formulario = "";
				var result = url.indexOf("lugar");
				if (result != -1){
					formulario = "encuentros";
				}
				result = url.indexOf("contacto");
				if (result != -1){
					formulario = "contactos";
				}
				result = url.indexOf("cartel");
				if (result != -1){
					formulario = "carteles";
				}
				result = url.indexOf("municipios");
				if (result != -1){
					formulario = "municipios";
				}
				result = url.indexOf("modificar");
				if (result != -1){
					formulario = "encuentros";
				}
				result = url.indexOf("duplicar");
				if (result != -1){
					formulario = "dupEncuentros";
				}
				
				llamada_prototype(url,'principal', 2, formulario);
			}
		</script>
	</head>
	<body class="administracion">
	<?php
		$ruta = substr($_SERVER['SCRIPT_FILENAME'], 0, strrpos($_SERVER['SCRIPT_FILENAME'], '/'));
		$_SESSION["ruta"] = $ruta.="/";
	?>

	<table border="0" width="100%">
		<tr>
			<td width="15%" valign="top">
				<center><h2 class="admin"><?= $_SESSION['nombre'] ?></h2></center>
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