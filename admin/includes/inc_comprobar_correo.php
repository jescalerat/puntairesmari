<?php
	if (isset($_GET['ideliminar']))
	{
		$query="delete from correo where IdCorreo=".$_GET['ideliminar'];
		mysqli_query($link, $query);
		header("Location:comprobar_correo.php");
	}
	else
	{
		//Query para comprobar el correo que tengo
		$query="select * from correo";
		$qcorreo=mysqli_query($link, $query);
		
?>
		<h1 class="text-center">Correo en Puntaires Mari</h1>
		
		<table class="table table-bordered">
       		<thead class="thead-dark">
    	   		<tr class="d-flex">
    				<th class="col-2 text-center">Eliminar</th>
    	       		<th class="col-2 text-center">Nombre</th>
    	       		<th class="col-2 text-center">Email</th>
    	       		<th class="col-5 text-center">Mensaje</th>
    	       		<th class="col-1 text-center">IP</th>
    	       	</tr>
    		</thead>
    		
<?php 				
				while($correos=mysqli_fetch_array($qcorreo, MYSQLI_BOTH))
				{
?>
					<tr class="d-flex">
        				<td class="col-2"><a href="comprobar_correo.php?ideliminar=<?= $correos["IdCorreo"] ?>">Eliminar</a></td>
        	       		<td class="col-2"><?= $correos["Nombre"] ?></td>
        	       		<td class="col-2"><?= $correos["Email"] ?></td>
        	       		<td class="col-5"><?= $correos["Mensaje"] ?></td>
        	       		<td class="col-1"><?= $correos["IP"] ?></td>
        	       	</tr>
<?php 
				}
?>
		</table>
<?php		
	}
?>