<?php
    session_start();
	if (file_exists("../../conf/traduccion.php")){
		require_once("../../conf/traduccion.php");
		require_once("../../conf/conexion.php");
		require_once("../../conf/funciones.php");
		$link=Conectarse();
	}

	$idComunidad = 0;
	if(isset($_POST['idComunidad'])){
	    $idComunidad = $_POST['idComunidad'];
	}
	$idProvincia = 0;
	if(isset($_POST['idProvincia'])){
	    $idProvincia = $_POST['idProvincia'];
	}
	$idMunicipio = 0;
	if(isset($_POST['idMunicipio'])){
	    $idMunicipio = $_POST['idMunicipio'];
	}
	
    $query = "select * from municipios m, provincias pro, comunidades c ";
    $query .= "where m.IdProvincia=pro.IdProvincia and ";
    $query .= "pro.IdComunidad=c.IdComunidad ";
    if ($idComunidad != 0){
        $query.=" and c.IdComunidad = ".$idComunidad." ";
    }
    if ($idProvincia != 0){
        $query.=" and pro.IdProvincia = ".$idProvincia." ";
    }
    if ($idMunicipio != 0){
        $query.=" and m.IdMunicipio = ".$idMunicipio." ";
    }
    
    
    $query .= " order by m.municipio asc";
  
    $municipios=mysqli_query ($link, $query);
    
    if ($idComunidad != 0 || $idProvincia != 0){
?>
<form class="col">
	<div class="row">
		<div class="col" id="municipios">
			<table class="table">
        		<thead class="thead-dark">
            		<tr>
            			<th>Municipio</th>
            			<th>Eliminar</th>
            		</tr>
            	</thead>
<?php 
            while($municipio=mysqli_fetch_array($municipios, MYSQLI_BOTH))
            {
                $desc = $municipio["Municipio"]." (".$municipio["Provincia"].")";
?>			
				<tr>
    				<td><a href="gestionar_municipios.php?idMunicipio=<?= $municipio["IdMunicipio"] ?>&opcion=U&idPagina=1"><?= $desc ?></a></td>
    				<td><a href="resultados.php?idMunicipio=<?= $municipio["IdMunicipio"] ?>&opcion=D&idPagina=1">Eliminar</a></td>
    			</tr>
<?php 
            }
            mysqli_free_result($municipios);
?>
			</table>
		</div>
	</div>
</form>
<?php 
    } //if ($idComunidad != 0 || $idProvincia != 0){
?>