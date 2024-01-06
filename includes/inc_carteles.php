<?php
	//http://tinypic.com
	
	$idencuentro = $_GET["idencuentro"];

	$query="select * from carteles where IdEncuentro = ".$idencuentro;
	$q=mysqli_query ($link, $query);
	
	//Obtener el numero de filas devuelto
	$total_registros=mysqli_num_rows($q);
	
?>	
	<div class="row">
		<div class="col">
<?php 			
			if ($total_registros==0)
			{
?>				
				<div class="row">
    				<div class="col text-center">
    					<?= cambiarAcentos(_SINCARTEL) ?>
    				</div>
    			</div>
<?php				
			}
			else
			{
				while($carteles=mysqli_fetch_array($q, MYSQLI_BOTH))
				{
?>				
					<div class="row">
    					<div class="col text-center">
    						<img src="<?= $carteles["Carteles"] ?>" name="btndocumento" border="0" height="1000px" width="800px" id="btndocumento">
    					</div>
					</div>
<?php 				
				}
			}
			mysqli_free_result($q);
?>
		</div>
	</div>
	
