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

	if ($idProvincia != 0){
        $query = "select * from encuentros e, municipios m, provincias pro, comunidades c ";
        $query .= "where e.IdMunicipio=m.IdMunicipio and ";
        $query .= "m.IdProvincia=pro.IdProvincia and ";
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
        
        
        $query .= " order by m.municipio asc, e.anyo desc";
      
        $encuentros=mysqli_query ($link, $query);
?>
<form class="col">
	<div class="row">
		<div class="col" id="encuentros">
			<table class="table">
        		<thead class="thead-dark">
            		<tr>
            			<th>Encuentro</th>
            			<th>Eliminar</th>
            		</tr>
            	</thead>
			
<?php 
            while($encuentro=mysqli_fetch_array($encuentros, MYSQLI_BOTH))
            {
                $desc = $encuentro["Municipio"]." (".$encuentro["Provincia"].")";
                if ($encuentro["Descripcion"] != null){
                    $desc .= " --- ".$encuentro["Descripcion"];
                }
                $desc .= " --- ".fecha($encuentro["Dia"], $encuentro["Mes"], $encuentro["Anyo"]);
                
                if ($_SESSION['paginaLlamada'] == 'encuentros'){
                    
?>			
				<tr>
    				<td><a href="gestionar_encuentros.php?idEncuentro=<?= $encuentro["IdEncuentro"] ?>&opcion=U&idPagina=2"><?= cambiarAcentos($desc) ?></a></td>
    				<td><a href="resultados.php?idEncuentro=<?= $encuentro["IdEncuentro"] ?>&opcion=D&idPagina=2">Eliminar</a></td>
    			</tr>
<?php 
                } else if ($_SESSION['paginaLlamada'] == 'contactos'){
                    ?>
				<tr>
    				<td><a href="insertar_contactos.php?idEncuentro=<?= $encuentro["IdEncuentro"] ?>"><?= cambiarAcentos($desc) ?></a></td>
    				<td>&nbsp;</td>
    			</tr>
<?php 

                } else if ($_SESSION['paginaLlamada'] == 'carteles'){
                    ?>
				<tr>
    				<td><a href="insertar_carteles.php?idEncuentro=<?= $encuentro["IdEncuentro"] ?>"><?= cambiarAcentos($desc) ?></a></td>
    				<td>&nbsp;</td>
    			</tr>
<?php 

                }
            }
            mysqli_free_result($encuentros);
?>
			</table>
<?php 
	} //if ($idProvincia != 0){
?>
		</div>
	</div>
</form>