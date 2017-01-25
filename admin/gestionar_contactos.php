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
	
	$idencuentro=$_GET['IdEncuentro'];
	
	$idEncuentroInsert = "";
	if (isset($_POST['op_encuentro']) || isset($_POST['idEncuentro']))
	{
		if (isset($_POST['op_encuentro']))
		{
			$idEncuentroInsert = $_POST['op_encuentro'];
		}
		if (isset($_POST['idEncuentro']))
		{
			$idEncuentroInsert = $_POST['idEncuentro'];
		}
	}
	

	if (isset($_POST['contacto']) && $idEncuentroInsert != "")
	{
		$contacto=$_POST['contacto'];
		
		print ("Encuentro: ".$idEncuentroInsert);
		print ("<br>Contacto: ".$contacto);
  	
		$query="insert into contactos (IdEncuentro,Contacto) values (".$idEncuentroInsert.",\"".$contacto."\")";
		$qresultado=mysql_query ($query,$link);

		if ($qresultado<>1)
		{
			$error=1;
			print ("<p>Query error: ".$query."<br>");
		}
		
		print ("<table border=\"0\" width=\"100%\">");
			print("<tr>");
				print("<td><a href=\"index.php\">Indice</a></td>");
				print("<td><a href=\"gestionar_contactos.php?IdEncuentro=".$idEncuentroInsert."\">Otro contacto</a></td>");
				print("<td><a href=\"gestionar_lugar.php\">Otro lugar</a></td>");
			print("</tr>");
		print("</table>");			
	}
	else if (!isset($idencuentro))
	{
		print ("<form name=\"contactos\" id=\"contactos\" method=\"post\">");
			$query="select e.idencuentro, concat(e.Dia,\"-\",e.Mes,\"-\",e.Anyo) as dia, m.municipio from encuentros e, municipios m where e.IdMunicipio=m.IdMunicipio order by m.Municipio";
			$q=mysql_query ($query,$link);
				
			//Obtener el numero de filas devuelto
			$total_registros=mysql_num_rows($q);
					
			print ("<select name='op_encuentro' id='op_encuentro'>");
				print ("<option value='0'>Encuentro</option>");
				while($registro=mysql_fetch_row($q))
				{
					print ("<option value='".$registro[0]."'>".$registro[1]." - ".$registro[2]."</option>");
				}			
			print ("</select>");
			
			print ("<p>");
			print ("Contacto: <input tipe=\"text\" id=\"contacto\" name=\"contacto\" size=\"30\" maxlength=100/>");
			print ("<p>");
			print ("<input type=\"submit\" name=\"enviar\" id=\"enviar\" value=\"Guardar\"/>");
		print ("</form>");
		print ("<p><a href=\"index.php\">Indice</a>");
	}
	else
	{
		print ("<form name=\"contactos\" id=\"contactos\" method=\"post\">");
			print("<input type=\"hidden\" id=\"idEncuentro\" name=\"idEncuentro\" value=\"".$idencuentro."\">");
			print ("<p>");
			print ("Contacto: <input tipe=\"text\" id=\"contacto\" name=\"contacto\" size=\"30\" maxlength=100/>");
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
