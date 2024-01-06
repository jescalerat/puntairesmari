<?php
    $mostrarVolver = 0;
    if(isset($_GET['mostrarVolver'])){
        $mostrarVolver = $_GET['mostrarVolver'];
    }

	$idencuentro = $_GET["idencuentro"];

	$query="select * from encuentros where IdEncuentro = ".$idencuentro;
	$qlugar=mysqli_query ($link, $query);
	$rowlugar=mysqli_fetch_array($qlugar, MYSQLI_BOTH);
	
	$query="select * from municipios where IdMunicipio = ".$rowlugar["IdMunicipio"];
	$qmunicipio=mysqli_query ($link, $query);
	$rowmunicipio=mysqli_fetch_array($qmunicipio, MYSQLI_BOTH);
	
	$query="select * from provincias where IdProvincia = ".$rowmunicipio["IdProvincia"];
	$qprovincia=mysqli_query ($link, $query);
	$rowprovincia=mysqli_fetch_array($qprovincia, MYSQLI_BOTH);
	
	$dia = $rowlugar["Dia"];
	$mes = $rowlugar["Mes"];
	$ano = $rowlugar["Anyo"];
	
	mysqli_free_result($qlugar);
	mysqli_free_result($qmunicipio);
	mysqli_free_result($qprovincia);
?>	

	<br/>
    <form class="col">
    	<div class="row">
    		<div class="col" id="municipio">
    			<h1 class="text-center"><?= cambiarAcentos($rowmunicipio["Municipio"]) ?> (<?= cambiarAcentos($rowprovincia["Provincia"]) ?>)</h1>
    		</div>
    	</div>
    	<div class="row">
    		<div class="col" id="descripcion">
    			<h3 class="text-center"><?= cambiarAcentos($rowlugar["Descripcion"]) ?></h3>
    		</div>
    	</div>
    </form>

	<form name="cambiar_boton" method="post">
		<div class="container">
    		<ul class="nav nav-tabs">
        		<li class="nav-item">
        			<a class="nav-link active" href="javascript:llamada_prototype('paginas/carteles.php?idencuentro=<?= $idencuentro ?>&guardar=0','ContTabul');CambiarEstilo('bt1');" id="bt1"><?= _CARTELES ?></a>
        		</li>
        		<li class="nav-item">
        			<a class="nav-link" href="javascript:llamada_prototype('paginas/contactos.php?idencuentro=<?= $idencuentro ?>&guardar=0','ContTabul');CambiarEstilo('bt2');" id="bt2"><?= _CONTACTOS ?></a>
        		</li>
    		</ul>
    	</div>
		<div id="ContTabul">
		<?php
			require_once("../paginas/carteles.php");
		?>
		</div>	
	</form>

	<br/>
	<br/>
	<br/>

<?php 
    if ($mostrarVolver == 1){
?>
        <div class="alert alert-info text-center">
        	<a href="#" class="alert-link" onclick="llamada_prototype('paginas/lista_encuentros.php?dia=<?= $dia ?>&mes=<?= $mes ?>&ano=<?= $ano ?>&mostrarVolver=<?= $mostrarVolver ?>','principal');"><?= cambiarAcentos(_VOLVER) ?></a>
        </div>
<?php 
    }
?>
