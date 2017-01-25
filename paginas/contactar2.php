<?
	session_start();
	require_once($_SESSION["ruta"]."conf/traduccion.php");

  $nombre=$_POST['nombre'];
  $email=$_POST['email'];
  $mensaje=$_POST['mensaje'];

	//Por si hay errores con el mail enviarlo a la base de datos
  if (!isset($link))
	{
		require_once($_SESSION["ruta"]."conf/conexion.php");
		$link=Conectarse();
	}
	require_once($_SESSION["ruta"]."conf/funciones.php");

	$query="insert into correo (Nombre,Email,Mensaje,IP) values (\"".$nombre."\",\"".$email."\",\"".$mensaje."\",\"".getRealIP()."\")";
  mysql_query($query,$link);

	//Mando el mensaje a mi dirección de email
	//En el campo De aparecerá javi@calendario
    $email2="hospitauro@gmail.com";
    $asunto="Sugerencias";
    $cuerpo="Nombre: ".$nombre."<br>Email: ".$email."<br>Mensaje: ".$mensaje;
	  mail($email2,$asunto,$cuerpo,"From: Contacta Hospi Tauro");

    print ("<table border=\"0\" width=\"100%\">");
		print ("<tr>");
			print ("<td align=\"center\">");
            print (cambiarAcentos(_RESPUESTA1)."<br>".cambiarAcentos(_RESPUESTA2));
        print ("<tr>");
            print ("<td align=\"center\">");
            	print ("<form method=POST action=javascript:llamada_prototype('".$_SESSION["rutaservidor"]."paginas/contactar.php','principal')>");
 		        		print ("<button type=submit name=borrar>"._OTRACONSULTA."</button>");
              print ("<form>");
    print ("</table>");

	if (!isset($_SESSION["admin_web"]))
	{
   	//Query para insertar los valores en la base de datos
    $query="insert into paginas_vistas (IP,Hora,Fecha,Pagina,Observaciones) values (\"".getRealIP()."\",\"".date("H:i:s")."\",\"".date("Y-m-d")."\",".$_SESSION["pagina"].",2)";
		mysql_query($query,$link);
	}
?>

<form name="buscapagina">
	<input type="hidden" name="paginaactual" id="paginaactual" value="<?print ($_SESSION["pagina"]);?>">
</form>