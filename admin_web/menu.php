<?
	if (!isset($link))
	{
	    require_once("../conf/conexion.php");
	    $link=Conectarse();
	}
	
	//Query
	$query="select * from contador";
  $qcontador=mysql_query ($query,$link);
  
  $contador = mysql_result($qcontador,0,"Contador");

?>	
<table border="0" width="100%">
	<tr>
		<td>
			<a href=# onclick=llamada_prototype('comprobar_visitas.php','principal')>Comprobar visitas</a>
		</td>
	</tr>
	<tr>
		<td>
			<a href=# onclick=llamada_prototype('comprobar_paginas_vistas.php','principal')>Comprobar paginas vistas</a>
		</td>
	</tr>
	<tr>
		<td>
			<a href=# onclick=llamada_prototype('comprobar_correo.php','principal')>Comprobar correo</a>
		</td>
	</tr>
	<tr>
		<td>
			<?print ($contador);?>
		</td>
	</tr>
</table>