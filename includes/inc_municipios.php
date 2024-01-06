<?php
		$query="select distinct Anyo from encuentros ";
		$query.="order by Anyo desc";
		
		$q=mysqli_query ($link, $query);
?>		

<br/>
<br/>
<form class="col">
	<div class="row">
		<div class="col" id="anyo">
			<select name="anyoSelect" id="anyoSelect" class="form-control">
				<option value="0"><?= cambiarAcentos(_MUNIANYOS) ?></option>
<?php	
				while($anos=mysqli_fetch_array($q, MYSQLI_BOTH))
				{
?>				    
					<option value="<?= $anos["Anyo"] ?>"><?= $anos["Anyo"] ?></option>		
<?php 
				}
?>					
			</select>

		</div>
	</div>
	<div class="row">
		<div class="col" id="comunidades">
			<label><?= cambiarAcentos(_MUNICOMUNIDADES) ?></label>
			<select name="comunidadSelect" id="comunidadSelect" class="form-control"></select>
		</div>
	</div>
	<div class="row">
		<div class="col" id="provincias">
			<label><?= cambiarAcentos(_MUNIPROVINCIAS) ?></label>
			<select name="provinciaSelect" id="provinciaSelect" class="form-control"></select>
		</div>
	</div>
	<div class="row">
		<div class="col" id="municipios">
			<label><?= cambiarAcentos(_MUNIMUNICIPIOS) ?></label>
			<select name="municipioSelect" id="municipioSelect" class="form-control"></select>
		</div>
	</div>

	<input type="hidden" id="idAnyoH" name="idAnyoH"/>
	<input type="hidden" id="idComunidadH" name="idComunidadH"/>
	<input type="hidden" id="idProvinciaH" name="idProvinciaH"/>
	<input type="hidden" id="idMunicipioH" name="idMunicipioH"/>
</form>