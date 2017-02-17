<?php
	if (!isset($link))
	{
	    require_once("../conf/conexion.php");
	    $link=Conectarse();
	}
	
	//Query
	$query="select * from contador";
	
  	$qcontador=mysqli_query ($link, $query);
  	$rowcontador=mysqli_fetch_array($qcontador, MYSQLI_BOTH);

  	$contador = $rowcontador["Contador"];
  	mysqli_free_result($qcontador);

?>	

<table border="0" width="100%" class="admin">
	<tr>
		<th>
			Administracion
		</th>
	</tr>
	<tr>
		<td>
			&nbsp;
			<a class="admin" href="#" onclick="llamada_prototype('gestionar_municipios.php','principal');">Insertar Municipio</a>
		</td>
	</tr>
	<tr>
		<td>
			&nbsp;
			<a class="admin" href="#" onclick="llamada_prototype('gestionar_lugar.php','principal');">Insertar Encuentro</a>
		</td>
	</tr>
	<tr>
		<td>
			&nbsp;
			<a class="admin" href="#" onclick="llamada_prototype('gestionar_contactos.php','principal');">Insertar Contacto</a>
		</td>
	</tr>
	<tr>
		<td>
			&nbsp;
			<a class="admin" href="#" onclick="llamada_prototype('gestionar_carteles.php','principal');">Insertar Cartel</a>
		</td>
	</tr>
	<tr>
		<th>
			Consultas
		</th>
	</tr>
	<tr>
		<td>
			&nbsp;
			<a class="admin" href="#" onclick="llamada_prototype('comprobar_visitas.php','principal');">Visitas</a>
		</td>
	</tr>
	<tr>
		<td>
			&nbsp;
			<a class="admin" href="#" onclick="llamada_prototype('comprobar_paginas_vistas.php','principal');">Paginas vistas</a>
		</td>
	</tr>
	<tr>
		<td>
			&nbsp;
			<a class="admin" href="#" onclick="llamada_prototype('comprobar_correo.php','principal');">Correo</a>
		</td>
	</tr>
</table>
Contador: <?= $contador ?>