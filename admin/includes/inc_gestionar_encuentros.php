<?php 
    $descripcion = "";
    $dia = "";
    $mes = "";
    $any = "";
    if ($idEncuentro != "" && $idEncuentro != "undefined"){
        $query="select * from encuentros where idEncuentro = ".$idEncuentro;
        $encuentro=mysqli_query ($link, $query);
        $rowencuentro=mysqli_fetch_array($encuentro);
        
        $descripcion = $rowencuentro['Descripcion'];
        $dia = $rowencuentro['Dia'];
        $mes = $rowencuentro['Mes'];
        $any = $rowencuentro['Anyo'];
        
        mysqli_free_result($encuentro);
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
		<div class="col" id="municipios">
			<label>Municipios</label>
			<select name="municipioSelect" id="municipioSelect" class="form-control"></select>
		</div>
	</div>
	<div class="row">
		<div class="col" id="descripcion">
			<label>Descripci&oacute;n</label>
			<input class="form-control" type="text" name="descripcion" id="descripcion" value="<?= $descripcion ?>">
		</div>
	</div>
	<div class="row">
		<div class="col-4" id="dia">
			<label>Dia</label>
	            <select class="form-control" name="dia" id="dia">
	                <option value="0">Dia</option>
<?php                
                        $seleccionDia = "";
	                    for ($x=1;$x<=31;$x++)
	                    {
	                        $seleccionDia = "";
	                        if ($x == $dia){
	                            $seleccionDia = "selected";
	                        }
?>                            
                        	<option value="<?= $x ?>" <?= $seleccionDia ?>><?= $x ?>
<?php                                
                    	}
?>                        
            	</select>

		</div>

		<div class="col-4" id="mes">
			<label>Mes</label>
	            <select class="form-control" name="mes" id="mes">
	                <option value="0">Mes</option>
<?php                
                        $seleccionMes = "";
	                    for ($x=1;$x<=12;$x++)
	                    {
	                        $seleccionMes = "";
	                        if ($x == $mes){
	                            $seleccionMes = "selected";
	                        }
?>                            
                        	<option value="<?= $x ?>" <?= $seleccionMes ?>><?= $x ?>
<?php                                
                    	}
?>                        
            	</select>

		</div>

		<div class="col-4" id="anyo">
			<label>A&ntilde;o</label>
			<input class="form-control" type="text" name="any" id="any" value="<?= $any ?>">
		</div>
	</div>
	
	<div class="checkbox"> 
		<label><input type="checkbox" name="duplicar" id="duplicar">Duplicar</label>
	</div>
	
	<br/>
	
	<div class="form-group">
        <div class="col">
            <p class="text-center"><button type="submit" class="btn btn-default">Enviar Mensaje</button></p>
        </div>
    </div>
	
	<input type="hidden" id="opcion" name="opcion" value="<?= $opcion ?>"/>
	<input type="hidden" id="idEncuentro" name="idEncuentro" value="<?= $idEncuentro ?>"/>
	<input type="hidden" id="idPagina" name="idPagina" value="2"/>

	<div id="recargaEncuentros"></div>

	<input type="hidden" id="idComunidadH" name="idComunidadH"/>
	<input type="hidden" id="idProvinciaH" name="idProvinciaH"/>
	<input type="hidden" id="idMunicipioH" name="idMunicipioH"/>
</form>
