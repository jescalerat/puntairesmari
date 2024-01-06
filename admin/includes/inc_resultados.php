<?php
	//1 - Insertar municipio
	//2 - Rutas
	//3 - Comentarios
	//4 - Fotos
	//5 - Rutas Municipios
	//6 - Rutas Comentarios
	//7 - Rutas Dias
	$idPagina = 0;
	$opcion = 0;

	if (isset($_POST['idPagina'])){
		$idPagina = $_POST['idPagina'];
	} else if (isset($_GET['idPagina'])){
		$idPagina = $_GET['idPagina'];
	}

	if (isset($_POST['opcion'])){
		$opcion = $_POST['opcion'];
	} else if (isset($_GET['opcion'])){
		$opcion = $_GET['opcion'];
	}
	
	$volver = "";

	if ($idPagina == 1){
		$municipio = isset($_POST['municipio'])?$_POST['municipio']:"";
		$idProvincia = isset($_POST['provinciaSelect'])?$_POST['provinciaSelect']:"";
		$idMunicipio = "";
		if (isset($_GET['idMunicipio'])){
		    $idMunicipio = $_GET['idMunicipio'];
		}
		if (isset($_POST['idMunicipio'])){
		    $idMunicipio = $_POST['idMunicipio'];
		}

		if ($opcion == "N"){
		    $query="select max(IdMunicipio) as IdMunicipio  ";
		    $query.="from municipios  ";
		    
		    $municipiosBBDD=mysqli_query ($link, $query);
		    $rowmaxid=mysqli_fetch_array($municipiosBBDD);
		    $idMunicipio = $rowmaxid["IdMunicipio"] + 1;
		    
		    $query="insert into municipios (IdMunicipio, IdProvincia, Municipio) values (".$idMunicipio.", ".$idProvincia.", '".$municipio."')";
			mysqli_query ($link, $query);
			print("Insert: ".$query);
			mysqli_free_result($municipiosBBDD);
		} else if ($opcion == "U"){
			$query="update municipios set Municipio='".$municipio."' where IdMunicipio=".$idMunicipio;
			mysqli_query ($link, $query);
			print("Update: ".$query);
		} else if ($opcion == "D"){
			$query="delete from municipios where IdMunicipio=".$idMunicipio;
			mysqli_query ($link, $query);
			print("Delete: ".$query);
		}

		$volver = "gestionar_municipios.php";
	} else if ($idPagina == 2){
	    $descripcion = isset($_POST['descripcion'])?$_POST['descripcion']:"";
	    $dia = isset($_POST['dia'])?$_POST['dia']:"";
	    $mes = isset($_POST['mes'])?$_POST['mes']:"";
	    $any = isset($_POST['any'])?$_POST['any']:"";
	    $idMunicipio = isset($_POST['municipioSelect'])?$_POST['municipioSelect']:"";
	    $idEncuentro = "";
	    if (isset($_GET['idEncuentro'])){
	        $idEncuentro = $_GET['idEncuentro'];
	    }
	    if (isset($_POST['idEncuentro'])){
	        $idEncuentro = $_POST['idEncuentro'];
	    }
	    $duplicar = isset($_POST['duplicar'])?1:0;

	    if ($duplicar == 1){
	        $opcion = "N";
	        
	        $query="select IdMunicipio  ";
	        $query.="from encuentros  ";
	        $query.="where IdEncuentro=".$idEncuentro;

	        $encuentroBBDD=mysqli_query ($link, $query);
	        $rowMunicipio=mysqli_fetch_array($encuentroBBDD);
	        $idMunicipio = $rowMunicipio["IdMunicipio"];
	        mysqli_free_result($encuentroBBDD);
	    }

		if ($opcion == "N"){
		    $query="select max(IdEncuentro) as IdEncuentro  ";
		    $query.="from encuentros  ";
		    
		    $encuentrosBBDD=mysqli_query ($link, $query);
		    $rowmaxid=mysqli_fetch_array($encuentrosBBDD);
		    $idEncuentro = $rowmaxid["IdEncuentro"] + 1;
		    
		    $query="insert into encuentros (IdEncuentro, IdMunicipio, Descripcion, Dia, Mes, Anyo) values (".$idEncuentro.", ".$idMunicipio.", '".$descripcion."', ".$dia.", ".$mes.", ".$any.")";
		    mysqli_query ($link, $query);
		    print("Insert: ".$query);
		    mysqli_free_result($encuentrosBBDD);
		} else if ($opcion == "U"){
			$query="update encuentros set Descripcion='".$descripcion."', Dia=".$dia.", Mes=".$mes.", Anyo=".$any." where IdEncuentro=".$idEncuentro;
			mysqli_query ($link, $query);
			print("Update: ".$query);
		} else if ($opcion == "D"){
			$query="delete from encuentros where IdEncuentro=".$idEncuentro;
			mysqli_query ($link, $query);
			print("Delete: ".$query);
		}

		$volver = "gestionar_encuentros.php";
	} else if ($idPagina == 3){
	    $idEncuentro = 0;
	    if (isset($_POST['idEncuentro'])){
	        $idEncuentro = $_POST['idEncuentro'];
	    }
	    if (isset($_GET['idEncuentro'])){
	        $idEncuentro = $_GET['idEncuentro'];
	    }
	    $idContacto = 0;
	    if (isset($_POST['idContacto'])){
	        $idContacto = $_POST['idContacto'];
	    }
	    if (isset($_GET['idContacto'])){
	        $idContacto = $_GET['idContacto'];
	    }
		$contacto = str_replace("'", "''", isset($_POST['contacto'])?$_POST['contacto']:"");
		
		if ($opcion == "N"){
		    if (isset($_POST['contacto'])  && $_POST['contacto'] != ""){
		        $contacto=$_POST['contacto'];
		        
		        print ("Encuentro: ".$idEncuentro);
		        print ("<br>Contacto: ".$contacto);
		        
		        $query="select idcontacto from contactos order by idcontacto desc limit 1";
		        $qIdContacto=mysqli_query ($link, $query);
		        $rowIdContacto=mysqli_fetch_array($qIdContacto, MYSQLI_BOTH);
		        $idcontacto = $rowIdContacto["idcontacto"] + 1;
		        
		        $query="insert into contactos (IdContacto,Contacto) values (".$idcontacto.",\"".$contacto."\")";
		        $qresultado=mysqli_query ($link, $query);
		        
		        if ($qresultado<>1)
		        {
		            $error=1;
		            print ("<p>Query error: ".$query."<br>");
		        }
		        print ("<br>Insert: ".$query.";<br>");
		        
		        $query="insert into contactos_encuentros (IdContacto,IdEncuentro) values (".$idcontacto.",".$idEncuentro.")";
		        $qresultado=mysqli_query ($link, $query);
		        
		        if ($qresultado<>1)
		        {
		            $error=1;
		            print ("<p>Query error: ".$query."<br>");
		        }
		        print ("<br>Insert: ".$query.";<br>");
		    }
			
		    if (isset($_POST['idsContactos'])){
    			foreach($_POST['idsContactos'] as $idContacto){
    			    $query="insert into contactos_encuentros (IdContacto,IdEncuentro) values (".$idContacto.",".$idEncuentro.")";
    			    $qresultado=mysqli_query ($link, $query);
    			    
    			    if ($qresultado<>1)
    			    {
    			        $error=1;
    			        print ("<p>Query error: ".$query."<br>");
    			    }
    			    print ("<br>Insert: ".$query.";<br>");
    			}
		    }
		} else if ($opcion == "U"){
			$query="update contactos set Contacto='".$contacto."' where IdContacto=".$idContacto;
			mysqli_query ($link, $query);
			print("Update: ".$query);
		} else if ($opcion == "D"){
			$query="delete from contactos_encuentros where IdContacto=".$idContacto." and IdEncuentro=".$idEncuentro;
			mysqli_query ($link, $query);
			print("Delete: ".$query);
		}

		$volver = "insertar_contactos.php?idEncuentro=".$idEncuentro;
	} else if ($idPagina == 4){
		$cartel = isset($_POST['cartel'])?$_POST['cartel']:"";
		$idCartel = 0;
		if (isset($_POST['idCartel'])){
		    $idCartel = $_POST['idCartel'];
		} else if (isset($_GET['idCartel'])){
		    $idCartel = $_GET['idCartel'];
		}
		$idEncuentro = 0;
		if (isset($_POST['idEncuentro'])){
		    $idEncuentro = $_POST['idEncuentro'];
		} else if (isset($_GET['idEncuentro'])){
		    $idEncuentro = $_GET['idEncuentro'];
		}
		
		if ($opcion == "N"){
		    $query="select IdCartel from carteles order by IdCartel desc limit 1";
		    $qIdCartel=mysqli_query ($link, $query);
		    $rowIdCartel=mysqli_fetch_array($qIdCartel, MYSQLI_BOTH);
		    $idCartel = $rowIdCartel["IdCartel"] + 1;
		    
			$cartelesArray = explode(';', $cartel);
			print("Insert: ");
			foreach ($cartelesArray as $nuevaFoto) {
				if ($nuevaFoto != ""){
					$query="insert into carteles (IdCartel, IdEncuentro, Carteles) values (".$idCartel.", ".$idEncuentro.", '".trim($nuevaFoto)."')";
					mysqli_query ($link, $query);
					print("<br>".$query.";");
					$idCartel++;
				}
			}
			mysqli_free_result($qIdCartel);
		} else if ($opcion == "D"){
			$query="delete from carteles where IdCartel=".$idCartel;
			mysqli_query ($link, $query);
			print("Delete: ".$query);
		}

		$volver = "insertar_carteles.php?idEncuentro=".$idEncuentro;
	}

?>
<p/>
<a href="<?= $volver ?>">Volver</a>
<p/>
<a href="insertar_contactos.php?idEncuentro=<?= $idEncuentro ?>">Insertar contactos</a>
<p/>
<a href="insertar_carteles.php?idEncuentro=<?= $idEncuentro ?>">Insertar carteles</a>