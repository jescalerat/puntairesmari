<?php
	$idencuentro = $_GET["idencuentro"];

	$query="select * from carteles where IdEncuentro = ".$idencuentro;
	$q=mysqli_query ($link, $query);
	$rowcartel=mysqli_fetch_array($q, MYSQLI_BOTH);
	
	//Obtener el numero de filas devuelto
	$total_registros=mysqli_num_rows($q);
	
?>	
	<table border="0" width="100%">
		<tr>
<?php 			
			if ($total_registros==0)
			{
?>				
				<td><?= cambiarAcentos(_SINCARTEL) ?></td>
<?php				
			}
			else
			{
?>				
				<td><a href="<?= $_SESSION["rutaservidor"] ?>paginas/bajar_fichero.php?f=<?= $rowcartel["Fichero"] ?>"><img src="imagenes/documento.gif" name="btndocumento" border="0" id="btndocumento"></a></td>
<?php 				
			}
			mysqli_free_result($q);
?>
		</tr>
	</table>	
