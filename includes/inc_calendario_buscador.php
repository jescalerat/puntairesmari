<?php
		$query="select distinct Anyo from encuentros ";
		$query.="order by Anyo desc";
		
		$q=mysql_query ($query,$link);
		$filas=mysql_num_rows($q);
		
		print ("<table border=\"0\" width=\"100%\" align=\"center\">");
			print ("<tr>");
				print("<td><h1>"._BUSCADORENCUENTROS."</h1></td>");
			print ("</tr>");
			print ("<tr>");
				print("<td>");
					print ("<SELECT name=\"anyobuscador\" id=\"anyobuscador\" onChange=\"location=this.options[this.selectedIndex].value\">");
					if ($_GET["ano"]==mysql_result($q,0,"anyo"))
					{
						print("<option value=javascript:llamada_prototype('".$_SESSION["rutaservidor"]."paginas/calendario.php?ano=".mysql_result($q,0,"anyo")."','principal') selected>".mysql_result($q,0,"anyo"));
					}
					else
					{
						print("<option value=javascript:llamada_prototype('".$_SESSION["rutaservidor"]."paginas/calendario.php?ano=".mysql_result($q,0,"anyo")."','principal')>".mysql_result($q,0,"anyo"));
					}
					
					for ($x=1;$x<$filas;$x++)
					{
						if ($_GET["ano"]==mysql_result($q,$x,"anyo"))
						{
							print("<option value=javascript:llamada_prototype('".$_SESSION["rutaservidor"]."paginas/calendario.php?ano=".mysql_result($q,$x,"anyo")."','principal') selected>".mysql_result($q,$x,"anyo"));
						}
						else
						{
							print("<option value=javascript:llamada_prototype('".$_SESSION["rutaservidor"]."paginas/calendario.php?ano=".mysql_result($q,$x,"anyo")."','principal')>".mysql_result($q,$x,"anyo"));
						}
					}
					print ("</select>");
				print("</td>");
			print ("</tr>");
			print ("<tr>");
				print("<td>");
					print("<div id=\"comunidades\">");
						generaComunidades(0);
					print("</div>");
				print("</td>");
			print ("</tr>");
			print ("<tr>");
				print("<td>");
					print("<div id=\"provincias\">");
						print ("<SELECT disabled=\"disabled\" name=\"op_provincias\" id=\"op_provincias\">");
							print("<option value=\"0\">".cambiarAcentos(_PROVINCIAS)."</option>");
						print ("</select>");
					print("</div>");
				print("</td>");
			print ("</tr>");
			print ("<tr>");
				print("<td>");
					print("<div id=\"municipios\">");
						print ("<SELECT disabled=\"disabled\" name=\"op_municipios\" id=\"op_municipios\">");
							print("<option value=\"0\">".cambiarAcentos(_MUNICIPIOS)."</option>");
						print ("</select>");
					print("</div>");
				print("</td>");
			print ("</tr>");
		print("</table>");
?>

<input type="hidden" id="comunidadesString" name="comunidadesString" value="<?print(cambiarAcentos(_COMUNIDADES));?>">
<input type="hidden" id="provinciasString" name="provinciasString" value="<?print(cambiarAcentos(_PROVINCIAS));?>">
<input type="hidden" id="municipiosString" name="municipiosString" value="<?print(cambiarAcentos(_MUNICIPIOS));?>">
