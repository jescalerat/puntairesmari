<?php
	//http://tinypic.com
	
	$idencuentro = $_GET["idencuentro"];

	$query="select * from carteles where IdEncuentro = ".$idencuentro;
	$q=mysqli_query ($link, $query);
	//$rowcartel=mysqli_fetch_array($q, MYSQLI_BOTH);
	
	//Obtener el numero de filas devuelto
	$total_registros=mysqli_num_rows($q);
	
?>	
	<table border="0" width="100%">
<?php 			
			if ($total_registros==0)
			{
?>				
				<tr><td><?= cambiarAcentos(_SINCARTEL) ?></td></tr>
<?php				
			}
			else
			{
				while($carteles=mysqli_fetch_array($q, MYSQLI_BOTH))
				{
?>				
					<tr>
						<td align="center">
							<img src="<?= $carteles["Carteles"] ?>" name="btndocumento" border="0" height="1000px" width="800px" id="btndocumento">
						</td>
					</tr>
<?php 				
				}
			}
			mysqli_free_result($q);
?>
	</table>	
