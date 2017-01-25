<?
	if (!isset($link))
	{
	    require_once($_SESSION["ruta"]."conf/conexion.php");
	    $link=Conectarse();
	}
	
	$idencuentro = $_GET["idencuentro"];

	$query="select * from encuentros where IdEncuentro = ".$idencuentro;
	$qlugar=mysql_query ($query,$link);
	
	$query="select * from municipios where IdMunicipio = ".mysql_result($qlugar,0,"IdMunicipio");
	$qmunicipio=mysql_query ($query,$link);
	
	$query="select * from provincias where IdProvincia = ".mysql_result($qmunicipio,0,"IdProvincia");
	$qprovincia=mysql_query ($query,$link);
	
	print ("<table border=\"0\" width=\"100%\">");
		print ("<tr>");
			print ("<td align=\"center\"><h1>".cambiarAcentos(mysql_result($qmunicipio,0,"Municipio"))." (".cambiarAcentos(mysql_result($qprovincia,0,"Provincia")).")</h1></td>");
		print ("</tr>");
		print ("<tr>");
			print ("<td align=\"center\"><h3>".cambiarAcentos(mysql_result($qlugar,0,"Descripcion"))."</h3></td>");
		print ("</tr>");
	print ("</table>");	
	
	//Si me viene desde la busqueda de fotos para poder modificar el estilo de la pestaña
	$busquedaFotoVideo = 0;
	$busquedaFotoVideo = $_GET["busquedafotovideo"];

	$dia = $_GET["dia"];
	$mes = $_GET["mes"];
	$ano = $_GET["ano"];
	
	$idfiestames = $_GET["idfiestasmes"];
	$tmp = stripslashes($idfiestames);
    $tmp = urldecode($tmp);
    $tmp = unserialize($tmp); 
	$tmp = serialize($tmp);
    $tmp = urlencode($tmp);
?>
<form name="cambiar_boton" method="post">
<ul id="tabnav">
<li class="<?print ("activo");?>" id="bt1"><a href="javascript:llamada_prototype('<?print($_SESSION["rutaservidor"]);?>paginas/carteles.php?idencuentro=<? print ($idencuentro);?>','ContTabul');CambiarEstilo('bt1');"><?print (_CARTELES);?></a></li>
<li class="<?print ("inactivo");?>" id="bt2"><a href="javascript:llamada_prototype('<?print($_SESSION["rutaservidor"]);?>paginas/contactos.php?idencuentro=<? print ($idencuentro);?>','ContTabul');CambiarEstilo('bt2');"><?print (_CONTACTOS);?></a></li>
</ul>
<div id="ContTabul">
<?
	require_once($_SESSION["ruta"]."includes/inc_carteles.php");
?>
</div>	
</form>
<a href="javascript:llamada_prototype('<?print($_SESSION["rutaservidor"]);?>paginas/calendario.php?dia=<? print ($dia);?>&mes=<? print ($mes);?>&ano=<? print ($ano);?>&idfiesta=<? print ($tmp);?>','principal');"><? print (_VOLVER);?></a>