
<?php

	if (!isset($_SESSION["admin_web"]))
	{
		//Query para insertar los valores en la base de datos
		//$query="insert into visitas (IP,Hora,Fecha,Idioma) values (\"".getRealIP()."\",\"".date("H:i:s")."\",\"".date("Y-m-d")."\",\"".$idiomas[0]."\")";
		$query="insert into visitas (IP,Hora,Fecha,Idioma) values (\"".getRealIP()."\",\"".date("H:i:s")."\",\"".date("Y-m-d")."\",\"".$_SESSION["idiomapagina"]."\")";
		mysqli_query($link, $query);
	}

	//Contador de visitas
	$query="select * from contador";
	$qcontador=mysqli_query ($link, $query);
	$rowcontador=mysqli_fetch_array($qcontador);
  
	$contador = $rowcontador["Contador"];
  
	//Insertar visitas únicas
	$query="select * from visitas where IP=\"".getRealIP()."\" and Fecha=\"".date("Y-m-d")."\" and Idioma=".$_SESSION["idiomapagina"];
	$qvisitas=mysqli_query($link, $query);
	
	//Obtener el numero de filas devuelto
	$total_registros=mysqli_num_rows($qvisitas);
	if ($total_registros==1)
	{
		$contador++;
		$query="update contador set contador=".$contador." where IdContador=1";
		mysqli_query ($link, $query);
	}
	mysqli_free_result($qcontador);
	mysqli_free_result($qvisitas);
?>	
        <div class="row">
            <div class="col-5">
                &nbsp;
            </div>
            <div class="col-2">
                <h5 class="text-center"><?=$contador?></h5>
            </div>
            <div class="col-5">
                &nbsp;
            </div>
        </div>
        
        <input type="hidden" id="cargandotexto" name="cargandotexto" value="<?= cambiarAcentos(_CARGANDO) ?>"/>
        
        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/funciones.js"></script>
        <script type="text/javascript" src="js/jquery.jCombo.min.js"></script>
	<script type="text/javascript" src="js/lugares.js"></script>
        
        
    </body>
  </html>