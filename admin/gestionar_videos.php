<html>
	<head>
		<script src="../js/ajax.js" language="JavaScript"></script>
		<script src="../js/funciones.js" language="JavaScript"></script>
		<script src="../js/prototype.js" language="JavaScript"></script>
	</head>
	<body>
<?
	require_once("../conf/funciones.php");
	require_once("../conf/conexion.php");
	$link=Conectarse();

	if (isset($_POST['op_fiestas']))
  {
  	$idfiesta=$_POST['op_fiestas'];
  	$video=$_POST['video'];
  	$ruta=$_POST['ruta'];
  	print ("IdFiesta: ".$idfiesta);
  	print ("<br>Video: ".$video);
  	print ("<br>Ruta: ".$ruta);
  	
  	$query="select IdFiesta,municipios_provincias_comunidades_IdComunidad, municipios_provincias_IdProvincia, municipios_IdMunicipio from fiestas where IdFiesta =".$idfiesta;
		$qfiesta=mysql_query ($query,$link);
		
		$idcomunidad=mysql_result($qfiesta,0,"municipios_provincias_comunidades_IdComunidad");
		$idprovincia=mysql_result($qfiesta,0,"municipios_provincias_IdProvincia");
		$idmunicipio=mysql_result($qfiesta,0,"municipios_IdMunicipio");
		
  	$query="insert into videos (fiestas_IdFiesta,fiestas_municipios_provincias_comunidades_IdComunidad,fiestas_municipios_provincias_IdProvincia,fiestas_municipios_IdMunicipio,Video,Ruta,fiestas_municipios_provincias_comunidades_paises_IdPais) values (".$idfiesta.",".$idcomunidad.",".$idprovincia.",".$idmunicipio.",\"".$video."\",\"".$ruta."\",1)";
    $qresultado=mysql_query ($query,$link);

		if ($qresultado<>1)
		{
			$error=1;
			print ("<p>Query error: ".$query."<br>");
		}
		
		print ("<table border=\"0\" width=\"100%\">");
			print("<tr>");
				print("<td><a href=\"index.php\">Indice</a></td>");
				print("<td><a href=\"gestionar_videos.php\">Otro video</a></td>");
			print("</tr>");
		print("</table>");
  }
  else
  {
		print	("<form name=\"programas\" id=\"programas\" method=\"post\">");
	  	if(isset($_GET['IdFiesta']))
	  	{
	  		
				$query="select * from municipios where provincias_comunidades_IdComunidad=".$_GET['IdComunidad']." and provincias_IdProvincia=".$_GET['IdProvincia']." and IdMunicipio=".$_GET['IdMunicipio'];
				$qmunicipio=mysql_query ($query,$link);
	  		print ("Municipio: ".mysql_result($qmunicipio,0,"Municipio"));
	  		print ("<p>");
	  		print ("IdFiesta: <input tipe=\"text\" id=\"op_fiestas\" name=\"op_fiestas\" value=".$_GET['IdFiesta']." size=\"30\" readonly/>");
	  	}
	  	else
	  	{
		  	$query="select IdFiesta,municipios_provincias_comunidades_IdComunidad, municipios_provincias_IdProvincia, municipios_IdMunicipio from fiestas where IdFiesta not in (select fiestas_IdFiesta from videos) order by IdFiesta";
				$q=mysql_query ($query,$link);
			
				//Obtener el numero de filas devuelto
				$total_registros=mysql_num_rows($q);
				
				print ("<select name='op_fiestas' id='op_fiestas'>");
				print ("<option value='0'>IdFiesta</option>");
				while($registro=mysql_fetch_row($q))
				{
					$query="select * from municipios where provincias_comunidades_IdComunidad=".$registro[1]." and provincias_IdProvincia=".$registro[2]." and IdMunicipio=".$registro[3];
					$qmunicipio=mysql_query ($query,$link);
					print ("<option value='".$registro[0]."'>".mysql_result($qmunicipio,0,"Municipio")."</option>");
				}			
				print ("</select>");
			}
		print ("<p>");
  	print ("Video: <input tipe=\"text\" id=\"video\" name=\"video\" size=\"30\" maxlength=50/>");
  	print ("<p>");
  	print ("Ruta: <input tipe=\"text\" id=\"ruta\" name=\"ruta\" size=\"30\" maxlength=50/>");
  	print ("<p>");
  	print ("<input type=\"submit\" name=\"enviar\" id=\"enviar\" value=\"Guardar\"/>");
		print ("</form>");
		print ("<p><a href=\"index.php\">Indice</a>");
	}
?>

	</body>
</html>	
