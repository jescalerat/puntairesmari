<form class="form-horizontal" role="form" method="post" action="resultados.php">
	<div class="row">
		<div class="col" id="carteles">
			<label>Carteles</label>
			<textarea id="cartel" name="cartel" class="form-control" rows="3" cols="80"></textarea>
		</div>
	</div>

	<br/>
	
	<div class="form-group">
        <div class="col">
            <p class="text-center"><button type="submit" class="btn btn-default">Enviar Mensaje</button></p>
        </div>
    </div>
    
    <br/>
<?php 
        $query="SELECT * ";
        $query.="FROM carteles WHERE ";
        $query.="IdEncuentro=".$idEncuentro;

        $qCarteles=mysqli_query ($link, $query);

?>

	<div class="row">
		<div class="col" id="cartelesList">
			<table class="table">
        		<thead class="thead-dark">
            		<tr>
            			<th>Cartel</th>
            			<th>Eliminar</th>
            		</tr>
            	</thead>
<?php 
            while($cartel=mysqli_fetch_array($qCarteles, MYSQLI_BOTH))
            {
?>			
				<tr>
    				<td><img src="<?= $cartel["Carteles"] ?>" name="btndocumento" border="0" id="btndocumento" height="150px" width="150px"></td>
    				<td><a href="resultados.php?idCartel=<?= $cartel["IdCartel"] ?>&idEncuentro=<?= $idEncuentro ?>&opcion=D&idPagina=4">Eliminar</a></td>
    			</tr>
<?php 
            }
            mysqli_free_result($qCarteles);
?>
			</table>
		</div>
	</div>

	
	<input type="hidden" id="opcion" name="opcion" value="<?= $opcion ?>"/>
	<input type="hidden" id="idEncuentro" name="idEncuentro" value="<?= $idEncuentro ?>"/>
	<input type="hidden" id="idPagina" name="idPagina" value="4"/>

</form>
