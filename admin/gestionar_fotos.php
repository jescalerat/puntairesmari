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
  	$query="select IdFiesta,municipios_provincias_comunidades_IdComunidad, municipios_provincias_IdProvincia, municipios_IdMunicipio from fiestas where IdFiesta =".$idfiesta;
		$qfiesta=mysql_query ($query,$link);
		
		$idcomunidad=mysql_result($qfiesta,0,"municipios_provincias_comunidades_IdComunidad");
		$idprovincia=mysql_result($qfiesta,0,"municipios_provincias_IdProvincia");
		$idmunicipio=mysql_result($qfiesta,0,"municipios_IdMunicipio");
		
  	for($x=0;$x<=20;$x++)
  	{
  		$foto=$_POST["foto".$x];
  		if (strcmp($foto,"")!=0)
  		{
	  		$ruta=$_POST["ruta".$x];
	  		$pie=$_POST["pie".$x];
	  		$imageshack=$_POST["imageshack".$x];
	  		$visible=$_POST["visible".$x];
	  		$idtipofoton1=$_POST["op_tipofoton1".$x];
	  		$tipofoton2=$_POST["op_tipofoton2".$x];
	  		$idTipoFotos=explode("@",$tipofoton2);
  			$idtipofoton1=$idTipoFotos[1];
  			$idtipofoton2=$idTipoFotos[0];
	  	
		  	print ("<br>IdFiesta: ".$idfiesta);
		  	print ("<br>Foto: ".$foto);
		  	print ("<br>Ruta: ".$ruta);
		  	print ("<br>Pie: ".$pie);
		  	print ("<br>Imageshack: ".$imageshack);
		  	print ("<br>Visible: ".$visible);
		  	print ("<br>TipoFotoN1: ".$idtipofoton1);
		  	print ("<br>TipoFotoN2: ".$idtipofoton2);
		  	
		  	$query="insert into fotos (fiestas_IdFiesta,fiestas_municipios_provincias_comunidades_IdComunidad,fiestas_municipios_provincias_IdProvincia,fiestas_municipios_IdMunicipio,Foto,Ruta,Pie,Imageshack,Visible,tiposfotosn2_tiposfotosn1_IdTipoFotoN1,tiposfotosn2_IdTipoFotoN2,fiestas_municipios_provincias_comunidades_paises_IdPais) values (".$idfiesta.",".$idcomunidad.",".$idprovincia.",".$idmunicipio.",\"".$foto."\",\"".$ruta."\",\"".$pie."\",\"".$imageshack."\",".$visible.",".$idtipofoton1.",".$idtipofoton2.",1)";
		    $qresultado=mysql_query ($query,$link);
		
				if ($qresultado<>1)
				{
					$error=1;
					print ("<p>Query error: ".$query."<br>");
				}
			}
		}
			
		print ("<table border=\"0\" width=\"100%\">");
			print("<tr>");
				print("<td><a href=\"index.php\">Indice</a></td>");
				print("<td><a href=\"gestionar_fotos.php?IdFiesta=".$idfiesta."&IdComunidad=".$idcomunidad."&IdProvincia=".$idprovincia."&IdMunicipio=".$idmunicipio."\">Mas fotos</a></td>");
			print("</tr>");
		print("</table>");
  }
  else
  {
		print	("<form name=\"fotos\" id=\"fotos\" method=\"post\">");
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
		  	$query="select IdFiesta,municipios_provincias_comunidades_IdComunidad, municipios_provincias_IdProvincia, municipios_IdMunicipio from fiestas where IdFiesta not in (select fiestas_IdFiesta from fotos) order by IdFiesta";
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
		for ($x=0;$x<=20;$x++)
		{
			print ("<p>".$x);
			print ("Foto: <input tipe=\"text\" id=\"foto".$x."\" name=\"foto".$x."\" size=\"10\" maxlength=50/>");
	  	print ("Ruta: <input tipe=\"text\" id=\"ruta".$x."\" name=\"ruta".$x."\" size=\"10\" maxlength=20/>");
	  	print ("Pie: <input tipe=\"text\" id=\"pie".$x."\" name=\"pie".$x."\" size=\"10\" maxlength=50/>");
	  	print ("Imageshack: <input tipe=\"text\" id=\"imageshack".$x."\" name=\"imageshack".$x."\" size=\"20\" maxlength=100/>");
	  	print ("Visible?: <input tipe=\"text\" id=\"visible".$x."\" name=\"visible".$x."\" value=\"1\" size=\"5\" maxlength=1/>");
	  	print ("<p>");
	  	generaTipoFotos($x);
	  	print ("<SELECT disabled=\"disabled\" name=\"op_tipofoton2".$x."\" id=\"op_tipofoton2".$x."\">");
				print("<option value=\"0\">TipoFotoN2</option>");
			print ("</select>");
	  }
  	print ("<p>");
  	print ("<input type=\"submit\" name=\"enviar\" id=\"enviar\" value=\"Guardar\"/>");
		print ("</form>");
		print ("<p><a href=\"index.php\">Indice</a>");
	}
?>

	</body>
</html>	
