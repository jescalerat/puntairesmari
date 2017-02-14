<?php
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
  	mysqli_query($link, $query);

	//Mando el mensaje a mi direcci�n de email
	//En el campo De aparecer� javi@calendario
    $email2="puntairesmari@gmail.com";
    $asunto="Sugerencias";
    $cuerpo="Nombre: ".$nombre."<br>Email: ".$email."<br>Mensaje: ".$mensaje;
	mail($email2,$asunto,$cuerpo,"From: Contacta Puntaires Mari");
?>
    <table border="0" width="100%">
		<tr>
			<td align="center">
            	<?= cambiarAcentos(_RESPUESTA1) ?><br><?= cambiarAcentos(_RESPUESTA2) ?>
            </td>
        </tr>
        <tr>
            <td align="center">
				<form method="POST" action="javascript:llamada_prototype('<?= $_SESSION["rutaservidor"] ?>paginas/contactar.php','principal')">
 		        		<button type="submit" name="borrar"><?= _OTRACONSULTA ?></button>
              	</form>
              </td>
		</tr>
    </table>

<?php     
	if (!isset($_SESSION["admin_web"]))
	{
	   	//Query para insertar los valores en la base de datos
	    $query="insert into paginas_vistas (IP,Hora,Fecha,Pagina,Observaciones) values (\"".getRealIP()."\",\"".date("H:i:s")."\",\"".date("Y-m-d")."\",".$_SESSION["pagina"].",2)";
		mysqli_query($link, $query);
	}
?>

<form name="buscapagina">
	<input type="hidden" name="paginaactual" id="paginaactual" value="<?= $_SESSION["pagina"] ?>">
</form>