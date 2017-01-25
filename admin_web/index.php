<?
	session_start();
	/*if (!isset($_SESSION['registrado']))
	{
		header("Location:login.php?abrirpagina=1");	
	}*/
?>
<html>
<head>
<META NAME="TITLE" CONTENT="Hospi Tauro">
<META NAME="DESCRIPTION" CONTENT="Fiestas y toros">
<META NAME="KEYWORDS" CONTENT="fiestas,toros,recortes,anillas">
<META NAME="AUTHOR" CONTENT="jet">
<META HTTP-EQUIV="EXPIRES" CONTENT="Mon, 31 Dec 2054 00:00:01 PST">
<META HTTP-EQUIV="CHARSET" CONTENT="ISO-8859-1">
<META HTTP-EQUIV="CONTENT-LANGUAGE" CONTENT="Español">
<META HTTP-EQUIV="VW96.OBJECT TYPE" CONTENT="Pag. Personal">
<META NAME="RATING" CONTENT="General">
<META NAME="REVISIT-AFTER" CONTENT="7 days">
<META NAME="Subject" CONTENT="Deportes">
<META NAME="Revisit" CONTENT="1 day">
<META NAME="Distribution" CONTENT="Global">
<META NAME="Robots" CONTENT="All">
<title>Hospi Tauro</title>
<script src="../js/funciones.js" language="JavaScript"></script>
<script src="../js/prototype.js" language="JavaScript"></script>
</head>
<body>
	<?
	$ruta = substr($_SERVER['SCRIPT_FILENAME'], 0, strrpos($_SERVER['SCRIPT_FILENAME'], '/'));
	$_SESSION["ruta"] = $ruta.="/";
	?>
	<table border="0" width="100%">
		<tr>
			<td width="15%" valign="top">
				<div id="menu">
					<?print(require_once("menu.php"));?>
				</div>
			</td>
			<td>
				<div id="principal">
				</div>
			</td>
		</tr>
	</table>
</body>
</html>