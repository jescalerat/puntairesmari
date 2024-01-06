<?php
	$idencuentro = $_GET["idencuentro"];

	$query="select * from contactos c, contactos_encuentros ce ";
	$query.="where c.IdContacto=ce.IdContacto and ce.IdEncuentro = ".$idencuentro;
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
    					<?= cambiarAcentos(_SINCONTACTO) ?>
    				</div>
    			</div>
<?php 				
			}
			else
			{
				while($contactos=mysqli_fetch_array($q, MYSQLI_BOTH))
				{
?>
					<div class="row">
    					<div class="col">
    						<?= cambiarAcentos($contactos["Contacto"]) ?>
    					</div>
					</div>
<?php 
				}
			}
			mysqli_free_result($q);
?>
		</div>
	</div>
