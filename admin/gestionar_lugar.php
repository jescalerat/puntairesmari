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
	
	if (isset($_POST['op_comunidades'])&&isset($_POST['op_provincias'])&&isset($_POST['op_municipios']))
  {
  	$comunidad=$_POST['op_comunidades'];
  	$provincia=$_POST['op_provincias'];
  	$municipio=$_POST['op_municipios'];
	$descripcion=$_POST['descripcion'];
  	$dia=$_POST['dia'];
  	$mes=$_POST['mes'];
  	$anyo=$_POST['anyo'];
  	print ("Comunidad: ".$comunidad);
  	print ("<br>Provincia: ".$provincia);
  	print ("<br>Lugar: ".$municipio);
	print ("<br>Descripcion: ".$descripcion);
  	print ("<br>Dia: ".$dia);
  	print ("<br>Mes: ".$mes);
  	print ("<br>Año: ".$anyo);
  	$idMunicipio=explode("@",$municipio);
  	$idcomunidad=$idMunicipio[2];
  	$idprovincia=$idMunicipio[1];
  	$idmunicipio=$idMunicipio[0];
  	
  	$query="insert into encuentros (IdMunicipio,Descripcion,Dia,Mes,Anyo) values (".$idmunicipio.",\"".$descripcion."\",\"".$dia."\",".$mes.",".$anyo.")";
    $qresultado=mysql_query ($query,$link);

	if ($qresultado<>1)
	{
		$error=1;
		print ("<p>Query error: ".$query."<br>");
	}
		
	$idencuentro = mysql_insert_id();
		
	print ("<table border=\"0\" width=\"100%\">");
		print("<tr>");
			print("<td><a href=\"index.php\">Indice</a></td>");
			print("<td><a href=\"gestionar_lugar.php\">Otro lugar</a></td>");
			print("<td><a href=\"gestionar_cartel.php?IdEncuentro=".$idencuentro."&IdMunicipio=".$idmunicipio."\">Insertar cartel</a></td>");
			print("<td><a href=\"gestionar_contactos.php?IdEncuentro=".$idencuentro."\">Insertar contactos</a></td>");
		print("</tr>");
	print("</table>");
  }
  else
  {
	print	("<form name=\"encuentros\" id=\"encuentros\" method=\"post\">");
		if(isset($_GET['IdMunicipio']))
		{
			$query="select * from municipios where IdMunicipio=".$_GET['IdMunicipio'];
			$qmunicipio=mysql_query ($query,$link);
			print ("Municipio: ".mysql_result($qmunicipio,0,"Municipio"));

			$query="select * from provincias where IdProvincia=".mysql_result($qmunicipio,0,"IdProvincia");
			$qprovincia=mysql_query ($query,$link);
			
			print("<input type=\"hidden\" id=\"op_comunidades\" name=\"op_comunidades\" value=\"".mysql_result($qprovincia,0,"IdComunidad")."\">");
			print("<input type=\"hidden\" id=\"op_provincias\" name=\"op_provincias\" value=\"".mysql_result($qmunicipio,0,"IdProvincia")."\">");
			print("<input type=\"hidden\" id=\"op_municipios\" name=\"op_municipios\" value=\"".$_GET['IdMunicipio']."\">");
		}
		else
		{
			generaComunidades(1);
			print ("<p>");
				print ("<SELECT disabled=\"disabled\" name=\"op_provincias\" id=\"op_provincias\">");
					print("<option value=\"0\">Provincias</option>");
				print ("</select>");
			print ("<p>");
				print ("<SELECT disabled=\"disabled\" name=\"op_municipios\" id=\"op_municipios\">");
					print("<option value=\"0\">Municipios</option>");
				print ("</select>");
		}
		print ("<p>");
		print ("Descripci&oacute;n: <input tipe=\"text\" id=\"descripcion\" name=\"descripcion\" size=\"30\" maxlength=50/>");
		print ("<p>");
		print ("Dia: <input tipe=\"text\" id=\"dia\" name=\"dia\" size=\"30\" maxlength=50/>");
		print ("<p>");
		print ("Mes: <input tipe=\"text\" id=\"mes\" name=\"mes\" size=\"30\" maxlength=50/>");
		print ("<p>");
		print ("Año: <input tipe=\"text\" id=\"anyo\" name=\"anyo\" value=2016 size=\"30\" maxlength=50/>");
		print ("<p>");
		print ("<input type=\"submit\" name=\"enviar\" id=\"enviar\" value=\"Guardar\"/>");
	print ("</form>");
	print ("<p><a href=\"index.php\">Indice</a>");
	}
?>
<input type="hidden" id="provinciasString" name="provinciasString" value="<?print(cambiarAcentos(_PROVINCIAS));?>">
<input type="hidden" id="municipiosString" name="municipiosString" value="<?print(cambiarAcentos(_MUNICIPIOS));?>">

	</body>
</html>	
