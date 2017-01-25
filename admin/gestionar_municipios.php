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

	if (isset($_POST['op_comunidades'])&&isset($_POST['op_provincias'])&&isset($_POST['municipio']))
	{
		$comunidad=$_POST['op_comunidades'];
		$provincia=$_POST['op_provincias'];
		$municipio=$_POST['municipio'];
		print ("Pais: ".$comunidad);
		print ("<br>Comunidad: ".$comunidad);
		print ("<br>Provincia: ".$provincia);
		print ("<br>Lugar: ".$municipio);
		$idProvincia=explode("@",$provincia);
		$idcomunidad=$idProvincia[1];
		$idprovincia=$idProvincia[0];

  	
		$query="insert into municipios (IdProvincia,Municipio) values (".$idprovincia.",\"".$municipio."\")";
		$qresultado=mysql_query ($query,$link);

		if ($qresultado<>1)
		{
			$error=1;
			print ("<p>Query error: ".$query."<br>");
		}
		
		//Buscar el ultimo id de la comunidad, la provincia y el pais
		$query="select IdMunicipio from municipios order by idmunicipio desc limit 0,1";
		$qidmunicipio=mysql_query ($query,$link);

		$proximoid = mysql_result($qidmunicipio,0,"IdMunicipio");

		print ("<table border=\"0\" width=\"100%\">");
			print("<tr>");
				print("<td><a href=\"index.php\">Indice</a></td>");
				print("<td><a href=\"gestionar_municipios.php\">Otro municipio</a></td>");
				print("<td><a href=\"gestionar_lugar.php?IdMunicipio=".$proximoid."\">Insertar encuentro</a></td>");
			print("</tr>");
		print("</table>");			
	}
	else
	{
		print ("<form name=\"encuentros\" id=\"encuentros\" method=\"post\">");
			generaComunidades(1);
			print ("<p>");
				print ("<SELECT disabled=\"disabled\" name=\"op_provincias\" id=\"op_provincias\">");
					print("<option value=\"0\">Provincias</option>");
				print ("</select>");
				print ("<p>");
				print ("<SELECT disabled=\"disabled\" name=\"op_municipios\" id=\"op_municipios\">");
					print("<option value=\"0\">Municipios</option>");
				print ("</select>");
				print ("<p>");
			print ("Municipio: <input tipe=\"text\" id=\"municipio\" name=\"municipio\" size=\"30\" maxlength=50/>");
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
