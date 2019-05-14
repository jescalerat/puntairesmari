<?php
    $idEncuentroBusqueda = null;
    if ($idEncuentroInsert != "" || isset($idencuentro)){
        if ($idEncuentroInsert != ""){
            $idEncuentroBusqueda = $idEncuentroInsert;
        } else {
            $idEncuentroBusqueda = $idencuentro;
        }
        
        $query="select IdMunicipio from encuentros where IdEncuentro=".$idEncuentroBusqueda;
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

		<table border="1" width="100%">
			<tr>
				<th align="center" width="5%">&nbsp;</th>
				<th align="center">Contacto</th>
				<th align="center">Municipio</th>
				<th align="center">Descripci&oacute;n</th>
			</tr>

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
?>
        </table>
        
<?php         
        mysqli_free_result($qIdMunicipio);
        mysqli_free_result($qContactos);
    }
    
?>