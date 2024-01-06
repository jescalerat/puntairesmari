<?php
    session_start();
	if (file_exists("../conf/traduccion.php")){
		require_once("../conf/traduccion.php");
		require_once("../conf/conexion.php");
		require_once("../conf/funciones.php");
		$link=Conectarse();
	}
	
	$mostrarVolver = 0;
	if(isset($_GET['mostrarVolver'])){
	    $mostrarVolver = $_GET['mostrarVolver'];
	}

	$anyo = 0;
	if(isset($_POST['anyo'])){
	    $anyo = $_POST['anyo'];
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
	
	$titulo = "";
	$tipofiesta = ""; 
	$lugar = "";
	$buscador = false;
    $dia = date('d');
    $mes = date('n');
    $any = date('Y');
    if(isset($_GET['dia'])){
        $dia = $_GET['dia'];
    }
    if(isset($_GET['mes'])){
        $mes = $_GET['mes'];
    }
    if(isset($_GET['anyo'])){
        $any = $_GET['anyo'];
    }
    $query = "select * from encuentros e, municipios m, provincias pro, comunidades c ";
    $query .= "where e.IdMunicipio=m.IdMunicipio and ";
    $query .= "m.IdProvincia=pro.IdProvincia and ";
    $query .= "pro.IdComunidad=c.IdComunidad ";
    if ($anyo != 0){
        $query .= " and e.anyo = ".$anyo;
        
        $tipofiesta=cambiarAcentos(_ENCUENTROSDIA);
        $lugar = $anyo;
        
        $buscador = true;
    } 
    if ($idComunidad != 0){
        $query.=" and c.IdComunidad = ".$idComunidad." ";
        
        $tipofiesta=cambiarAcentos(_ENCUENTROSCOMUNIDAD);
                
        $querycomunidad="select * from comunidades where IdComunidad=".$idComunidad;
        $q=mysqli_query ($link, $querycomunidad);
        $rowcomunidad=mysqli_fetch_array($q, MYSQLI_BOTH);
        $lugar=cambiarAcentos($rowcomunidad["Comunidad"]);
        mysqli_free_result($q);
        
        $buscador = true;
    }
    if ($idProvincia != 0){
        $query.=" and pro.IdProvincia = ".$idProvincia." ";
        
        $tipofiesta=cambiarAcentos(_ENCUENTROSPROVINCIA);
        
        $queryprovincia="select * from provincias where IdProvincia=".$idProvincia;
        $q=mysqli_query ($link, $queryprovincia);
        $rowprovincia=mysqli_fetch_array($q, MYSQLI_BOTH);
        $lugar=cambiarAcentos($rowprovincia["Provincia"]);
        mysqli_free_result($q);
        
        $buscador = true;
    }
    if ($idMunicipio != 0){
        $query.=" and m.IdMunicipio = ".$idMunicipio." ";
        
        $tipofiesta=cambiarAcentos(_ENCUENTROSMUNICIPIO);
        
        $querymunicipio="select * from municipios where IdMunicipio=".$idMunicipio;
        $q=mysqli_query ($link, $querymunicipio);
        $rowmunicipio=mysqli_fetch_array($q, MYSQLI_BOTH);
        $lugar=cambiarAcentos($rowmunicipio["Municipio"]);
        mysqli_free_result($q);
        
        $buscador = true;
    }
    
    if (!$buscador){
        $query .= " and e.dia= ".$dia;
        $query .= " and e.mes = ".$mes;
        $query .= " and e.anyo = ".$any;
        
        $tipofiesta=cambiarAcentos(_ENCUENTROSDIA);
        $diaTemp = $dia + 0;
        $lugar = fecha($diaTemp, $mes, $any);
    }
    $titulo = $tipofiesta.$lugar;
    
    $query .= " order by e.anyo asc, e.mes asc, e.dia asc, m.municipio asc";
  
    $encuentros=mysqli_query ($link, $query);
	$total=mysqli_num_rows($encuentros);
?>
<br/>
<form class="col">
	<div class="row">
		<div class="col" id="titulo">
			<h1 class="text-center"><?= $titulo ?></h1>
		</div>
	</div>
	<div class="row">
		<div class="col" id="total">
			<h5 class="text-center"><?= cambiarAcentos(_TOTAL) ?>: <?= $total ?></h5>
		</div>
	</div>
	<div class="row">
		<div class="col" id="encuentros">
			
<?php 
            while($encuentro=mysqli_fetch_array($encuentros, MYSQLI_BOTH))
            {
                $desc = $encuentro["Municipio"]." (".$encuentro["Provincia"].")";
                if ($encuentro["Descripcion"] != null){
                    $desc .= " --- ".$encuentro["Descripcion"];
                }
                if ($buscador){
                    $desc .= " --- ".fecha($encuentro["Dia"], $encuentro["Mes"], $encuentro["Anyo"]);
                }
?>			
				<a href="#" class="list-group-item" onclick="llamada_prototype('paginas/encuentros.php?idencuentro=<?= $encuentro["IdEncuentro"] ?>&mostrarVolver=<?= $mostrarVolver ?>','principal');"><?= cambiarAcentos($desc) ?></a>
<?php 
            }
            mysqli_free_result($encuentros);
?>
		</div>
	</div>
</form>

<br/>
<br/>

<?php 
    if ($mostrarVolver == 1){
?>
        <div class="alert alert-info text-center">
        	<a href="#" class="alert-link" onclick="llamada_prototype('paginas/calendario.php?dia=<?= $dia ?>&mes=<?= $mes ?>&ano=<?= $any ?>','principal');"><?= cambiarAcentos(_VOLVER) ?></a>
        </div>
<?php 
    }
?>

<?php
    
    if (!isset($_SESSION["admin_web"]))
    {
        $observaciones = "Dia: ".$dia."<br>Mes: ".$mes."<br>Año: ".$any."<br>Año buscador: ".$anyo."<br>Comunidad: ".$idComunidad."<br>Provincia: ".$idProvincia."<br>Municipio: ".$idMunicipio;
        //Query para insertar los valores en la base de datos
        $query="insert into paginas_vistas (IP,Hora,Fecha,Pagina,Observaciones) values (\"".getRealIP()."\",\"".date("H:i:s")."\",\"".date("Y-m-d")."\",".$_SESSION["pagina"].",\"".$observaciones."\")";
        mysqli_query($link, $query);
    }
?>	