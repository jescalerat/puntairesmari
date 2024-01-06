<?php
	

	if (isset($_GET['ideliminar']))
	{
		$query="delete from paginas_vistas where IdPaginasVistas=".$_GET['ideliminar'];
		mysqli_query($link,$query);
	}

	$titulo = "";
	$parametros = "";
	if (isset($_GET['IP']))
	{
	    $query="select * from paginas_vistas where IP=\"".$_GET['IP']."\" and Fecha=\"".$_GET['fecha']."\" order by Fecha desc, Hora, IP";
	    $titulo = "Fecha: ".$_GET['fecha']." IP: ".$_GET['IP'];
	    $parametros .= "&IP=".$_GET['IP']."&fecha=".$_GET['fecha'];
	}
	else if (isset($_GET['fecha']))
	{
	    $query="select * from paginas_vistas where Fecha=\"".$_GET['fecha']."\" order by Fecha desc, Hora, IP";
	    $titulo = "Fecha: ".devolverFechaBBDD($_GET['fecha']);
	    $parametros .= "&fecha=".$_GET['fecha'];
	}
	else
	{
	    $query="select * from paginas_vistas order by Fecha desc, Hora, IP limit 500";
	}
	
	//Query para comprobar las visitas que tengo
	$query_paginas_vistas=mysqli_query($link, $query);
?>

	<h1 class="text-center">Paginas vistas en Puntaires Mari</h1>
<?php 
    if ($titulo != ""){
?>
		<h3 class="text-center"><?= $titulo ?></h3>
<?php
    }
?>	
	
	<table class="table table-bordered">
   		<thead class="thead-dark">
	   		<tr class="d-flex">
				<th class="col-2 text-center">Eliminar</th>
	       		<th class="col-2 text-center">IP</th>
	       		<th class="col-2 text-center">Hora</th>
	       		<th class="col-2 text-center">Fecha</th>
	       		<th class="col-2 text-center">Pagina</th>
	       		<th class="col-2 text-center">Observaciones</th>
	       	</tr>
		</thead>
		
<?php 
        //Mostrar los valores de la base de datos
        while($paginas=mysqli_fetch_array($query_paginas_vistas, MYSQLI_BOTH))
        {
            //Query para mostrar el nombre en lugar de la IP
            $query="select * from usuarios where IP=\"".$paginas["IP"]."\"";
            $query_IP=mysqli_query ($link, $query);
            $rowIP=mysqli_fetch_array($query_IP);
            
            //Obtener el numero de filas devuelto
            $filas_IP=mysqli_num_rows($query_IP);
            mysqli_free_result($query_IP);
            
            if ($filas_IP>0)
            {
                $ip_usuario=$rowIP["Usuario"];
            }
            else
            {
                $ip_usuario=$paginas["IP"];
            }
            
            $pagina_vista="";
            $estilo = "";
            $jornada_equipo = "0";
            if ($paginas["Pagina"]==1)
            {
                $pagina_vista="Inicio";
            }
            else if ($paginas["Pagina"]==2)
            {
                $pagina_vista="Calendario";
            }
            else if ($paginas["Pagina"]==3)
            {
                $pagina_vista="Buscador";
            }
            else if ($paginas["Pagina"]==4)
            {
                $pagina_vista="Encuentro";
            }
            else if ($paginas["Pagina"]==5)
            {
                $pagina_vista="Paginas amigas";
            }
            else if ($paginas["Pagina"]==6)
            {
                $pagina_vista="Contactar";
                $estilo = "bgcolor=\"red\"";
            }
            else if ($paginas["Pagina"]==62)
            {
                $pagina_vista="Contactar enviado";
                $estilo = "bgcolor=\"red\"";
            }
            
            $observaciones = "";
              //Comprobar la pagina amiga que se ha consultado
            if ($paginas["Pagina"]==5){
                if ($paginas["Observaciones"]==1){
                    $observaciones = "Hospitalense";
                }
            }
            //Comprobar la busqueda que se ha consultado
            else
            {
                $observaciones=$paginas["Observaciones"];
            }
?>
			<tr class="d-flex" <?php if ($estilo!="") {print($estilo);} ?>>
				<td class="col-2"><a href="comprobar_paginas_vistas.php?ideliminar=<?= $paginas["IdPaginasVistas"].$parametros ?>">Eliminar</a></td>
	       		<td class="col-2 text-center"><?= $ip_usuario ?></td>
	       		<td class="col-2 text-center"><?= $paginas["Hora"] ?></td>
	       		<td class="col-2 text-center"><?= devolverFechaBBDD($paginas["Fecha"]) ?></td>
	       		<td class="col-2 text-center"><?= $pagina_vista ?></td>
	       		<td class="col-2 text-center"><?= $observaciones ?></td>
	       	</tr>

<?php             
        }

        mysqli_free_result($query_paginas_vistas);
?>
	</table>