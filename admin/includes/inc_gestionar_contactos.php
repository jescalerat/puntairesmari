<form class="form-horizontal" role="form">
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
		<div class="col" id="municipios">
			<label>Municipios</label>
			<select name="municipioSelect" id="municipioSelect" class="form-control"></select>
		</div>
	</div>
	
	<br/>
	
	<div id="recargaEncuentros"></div>

	<input type="hidden" id="idComunidadH" name="idComunidadH"/>
	<input type="hidden" id="idProvinciaH" name="idProvinciaH"/>
	<input type="hidden" id="idMunicipioH" name="idMunicipioH"/>
</form>
