<?php
	$idencuentro = $_GET["idencuentro"];

	$query="select * from contactos where IdEncuentro = ".$idencuentro;
	$q=mysqli_query ($link, $query);
	
	//Obtener el numero de filas devuelto
	$total_registros=mysqli_num_rows($q);
?>	
	<table border="0" width="100%">
		<tr>
<?php 		
			if ($total_registros==0)
			{
?>				
				<td><?= cambiarAcentos(_SINCONTACTO) ?></td>
<?php 				
			}
			else
			{
?>				
				<td>
<?php 				
					while($contactos=mysqli_fetch_array($q, MYSQLI_BOTH))
					{
						print(cambiarAcentos($contactos["Contacto"]));
						print ("<br>");
					}
?>					
				</td>
<?php 				
			}
			mysqli_free_result($q);
?>
		</tr>
	</table>	
