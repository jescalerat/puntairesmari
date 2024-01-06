<?php 
    $municipio = "";
    if ($idMunicipio != "" && $idMunicipio != "undefined"){
        $query="select * from municipios where idMunicipio = ".$idMunicipio;
        $municipio=mysqli_query ($link, $query);
        $rowmunicipio=mysqli_fetch_array($municipio);
        
        $municipio = $rowmunicipio['Municipio'];
    }
    
?>

<form class="form-horizontal" role="form" method="post" action="resultados.php">
	<div class="row">
		<div class="col-6" id="comunidades">
			<label>Comunidades</label>
			<select name="comunidadSelect" id="comunidadSelect" class="form-control"></select>
		</div>
		<div class="col-6" id="provincias">
			<label>Provincias</label>
			<select name="provinciaSelect" id="provinciaSelect" class="form-control"></select>
		</div>
		
	</div>
	<div class="row">
		<div class="col" id="municipioI">
			<label>Municipio</label>
			<input class="form-control" type="text" name="municipio" id="municipio" value="<?= $municipio ?>">
		</div>
	</div>
	
	<br/>
	
	<div class="form-group">
        <div class="col">
            <p class="text-center"><button type="submit" class="btn btn-default">Enviar Mensaje</button></p>
        </div>
    </div>
	
	<input type="hidden" id="opcion" name="opcion" value="<?= $opcion ?>"/>
	<input type="hidden" id="idMunicipio" name="idMunicipio" value="<?= $idMunicipio ?>"/>
	<input type="hidden" id="idPagina" name="idPagina" value="1"/>

	<div id="recargaEncuentros"></div>

	<input type="hidden" id="idComunidadH" name="idComunidadH"/>
	<input type="hidden" id="idProvinciaH" name="idProvinciaH"/>
	<input type="hidden" id="idMunicipioH" name="idMunicipioH"/>
</form>
