<?php 
    $contacto = "";
    if ($idContacto != "" && $idContacto != "undefined"){
        $query="select * from contactos where idContacto = ".$idContacto;
        $qContacto=mysqli_query ($link, $query);
        $rowcontacto=mysqli_fetch_array($qContacto);
        
        $contacto = $rowcontacto['Contacto'];
        
        mysqli_free_result($qContacto);
    }
    
    $query="select IdMunicipio from encuentros where IdEncuentro=".$idEncuentro;
    $qIdMunicipio=mysqli_query ($link, $query);
    $rowIdMunicipio=mysqli_fetch_array($qIdMunicipio, MYSQLI_BOTH);
    
    $query="SELECT cont.IdContacto, cont.Contacto, mun.Municipio, enc.Descripcion ";
    $query.="FROM contactos cont, encuentros enc, contactos_encuentros contEnc, municipios mun WHERE ";
    $query.="enc.IdEncuentro=contEnc.IdEncuentro and ";
    $query.="cont.IdContacto=contEnc.IdContacto and ";
    $query.="enc.IdMunicipio=mun.IdMunicipio and ";
    $query.="mun.IdMunicipio=".$rowIdMunicipio["IdMunicipio"];
    $qContactos=mysqli_query ($link, $query);
    
?>

<form class="form-horizontal" role="form" method="post" action="resultados.php">
	<div class="row"> 
		<table class="table">
        		<thead class="thead-dark">
            		<tr>
            			<th width="5%">&nbsp;</th>
            			<th>Contacto</th>
            			<th>Municipio</th>
            			<th>Descripci&oacute;n</th>
            		</tr>
            	</thead>
<?php         
                while($contactos=mysqli_fetch_array($qContactos, MYSQLI_BOTH))
                {
?>
    				<tr>
    					<td><input type="checkbox" name="idsContactos[]" id="idsContactos[]" value="<?= $contactos["IdContacto"] ?>"></td>
    					<td><?= $contactos["Contacto"] ?></td>
    					<td><?= $contactos["Municipio"] ?></td>
    					<td><?= $contactos["Descripcion"] ?></td>
    				</tr>
<?php 
			     }
		     mysqli_free_result($qIdMunicipio);
		     mysqli_free_result($qContactos);
		     
?>
        </table>
	</div>
	<div class="row">
		<div class="col" id="contacto">
			<label>Contacto</label>
			<input class="form-control" type="text" name="contacto" id="contacto" value="<?= $contacto ?>">
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
        $query.="FROM contactos cont, contactos_encuentros contEnc WHERE ";
        $query.="cont.IdContacto=contEnc.IdContacto and ";
        $query.="IdEncuentro=".$idEncuentro;

        $qContactos=mysqli_query ($link, $query);

?>

	<div class="row">
		<div class="col" id="contactos">
			<table class="table">
        		<thead class="thead-dark">
            		<tr>
            			<th>Contacto</th>
            			<th>Eliminar</th>
            		</tr>
            	</thead>
<?php 
            while($contacto=mysqli_fetch_array($qContactos, MYSQLI_BOTH))
            {
?>			
				<tr>
    				<td><a href="insertar_contactos.php?idContacto=<?= $contacto["IdContacto"] ?>&idEncuentro=<?= $idEncuentro ?>&opcion=U&idPagina=3"><?= $contacto["Contacto"] ?></a></td>
    				<td><a href="resultados.php?idContacto=<?= $contacto["IdContacto"] ?>&idEncuentro=<?= $idEncuentro ?>&opcion=D&idPagina=3">Eliminar</a></td>
    			</tr>
<?php 
            }
            mysqli_free_result($qContactos);
?>
			</table>
		</div>
	</div>

	
	<input type="hidden" id="opcion" name="opcion" value="<?= $opcion ?>"/>
	<input type="hidden" id="idContacto" name="idContacto" value="<?= $idContacto ?>"/>
	<input type="hidden" id="idEncuentro" name="idEncuentro" value="<?= $idEncuentro ?>"/>
	<input type="hidden" id="idPagina" name="idPagina" value="3"/>

</form>
