<?php
	if (isset($_GET['ideliminar']))
	{
		$query="delete from visitas where IdVisitas=".$_GET['ideliminar'];
		mysqli_query($link,$query);
	}

	$query="select * from visitas order by Fecha desc, Hora, IP limit 1";
	$query_fecha_actual=mysqli_query ($link, $query);
	$rowFechaActual=mysqli_fetch_array($query_fecha_actual);
	$fecha_actual=$rowFechaActual["Fecha"];
	mysqli_free_result($query_fecha_actual);
	
	//Query para comprobar las visitas que tengo
	$query="select * from visitas order by Fecha desc, Hora, IP limit 500";
	$query_visitas=mysqli_query($link, $query);
?>

	<h1 class="text-center">Visitas en Puntaires Mari</h1>
	
	<table class="table table-bordered">
   		<thead class="thead-dark">
	   		<tr class="d-flex">
				<th class="col-3 text-center">Eliminar</th>
	       		<th class="col-3 text-center">IP</th>
	       		<th class="col-2 text-center">Hora</th>
	       		<th class="col-2 text-center">Fecha</th>
	       		<th class="col-2 text-center">Idioma</th>
	       	</tr>
		</thead>
		
<?php 
        //Mostrar los valores de la base de datos
        while($visitas=mysqli_fetch_array($query_visitas, MYSQLI_BOTH))
        {
            //Query para mostrar el nombre en lugar de la IP
            $query="select * from usuarios where IP=\"".$visitas["IP"]."\"";
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
                $ip_usuario=$visitas["IP"];
            }
            
            $fecha_futura=$visitas["Fecha"];
            if (strcmp($fecha_actual,$fecha_futura)!=0)
            {
                //Query para contar las visitas que tengo al dia
                $query="select count(Fecha) as visitas_dia from visitas where Fecha=\"".$fecha_actual."\"";
                $query_visitas_dia=mysqli_query ($link, $query);
                $rowVsisitasDia=mysqli_fetch_array($query_visitas_dia);
                
                //Query para contar las visitas distintas que tengo al dia
                $query="select count(distinct IP) as visitas_dia_distintas from visitas where Fecha=\"".$fecha_actual."\"";
                $query_visitas_dis_dia=mysqli_query ($link, $query);
                $rowVsisitaDisDia=mysqli_fetch_array($query_visitas_dis_dia);

?>                
    				<tr class="d-flex" bgcolor="green">
        				<td class="col-4"><a href="comprobar_paginas_vistas.php?fecha=<?= $fecha_actual ?>"><?= $fecha_actual ?></a></td>
        	       		<td class="col-3 text-right">Visitas dia:</td>
        	       		<td class="col-1 text-center"><?= $rowVsisitasDia["visitas_dia"] ?></td>
        	       		<td class="col-3 text-right">Visitas dia distintas:</td>
        	       		<td class="col-1 text-center"><?= $rowVsisitaDisDia["visitas_dia_distintas"] ?></td>
        	       	</tr>
<?php 
					$fecha_actual=$visitas["Fecha"];                
            }
?>
			<tr class="d-flex">
				<td class="col-3"><a href="comprobar_visitas.php?ideliminar=<?= $visitas["IdVisitas"] ?>">Eliminar</a></td>
	       		<td class="col-3 text-center"><a href="comprobar_paginas_vistas.php?fecha=<?= $visitas["Fecha"] ?>&IP=<?= $visitas["IP"] ?>"><?= $ip_usuario ?></a></td>
	       		<td class="col-2 text-center"><?= $visitas["Hora"] ?></td>
	       		<td class="col-2 text-center"><?= $visitas["Fecha"] ?></td>
	       		<td class="col-2 text-center"><?= $visitas["Idioma"] ?></td>
	       	</tr>

<?php             
        }

        //Query para contar las visitas que tengo al dia
        $query="select count(Fecha) as visitas_dia from visitas where Fecha=\"".$fecha_actual."\"";
        $query_visitas_dia=mysqli_query ($link, $query);
        $rowVsisitasDia=mysqli_fetch_array($query_visitas_dia);
        
        //Query para contar las visitas distintas que tengo al dia
        $query="select count(distinct IP) as visitas_dia_distintas from visitas where Fecha=\"".$fecha_actual."\"";
        $query_visitas_dis_dia=mysqli_query ($link, $query);
        $rowVsisitaDisDia=mysqli_fetch_array($query_visitas_dis_dia);
        
?>
		<tr class="d-flex" bgcolor="green">
			<td class="col-3"><a href="comprobar_paginas_vistas.php?fecha=<?= $fecha_actual ?>" target="_top"><?= $fecha_actual ?></a></td>
       		<td class="col-3">Visitas dia:</td>
       		<td class="col-1 text-center"><?= $rowVsisitasDia["visitas_dia"] ?></td>
       		<td class="col-3">Visitas dia distintas:</td>
       		<td class="col-2 text-center"><?= $rowVsisitaDisDia["visitas_dia_distintas"] ?></td>
       	</tr>
	</table>

<?php 
    mysqli_free_result($query_visitas);
    mysqli_free_result($query_visitas_dia);
    mysqli_free_result($query_visitas_dis_dia);
?>
