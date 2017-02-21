<?php
	session_start();
	$esAdmin = strripos($_SESSION["ruta"], "admin");
	
	$ruta = $_SESSION["ruta"];
	
	if ($esAdmin){
		$arrRura = explode("/", $_SESSION["ruta"]);
	
		$cuentaArray = count($arrRura) - 2;
	
		$ruta = "";
		for ($i = 0; $i < $cuentaArray; $i++) {
			$ruta .= $arrRura[$i]."/";
		}
	}
	
  	$nombre=$_POST['nombre'];
  	$email=$_POST['email'];
  	$mensaje=$_POST['mensaje'];

	//Por si hay errores con el mail enviarlo a la base de datos
  	if (!isset($link))
	{
		require_once($ruta."conf/conexion.php");
		$link=Conectarse();
	}
	require_once($ruta."conf/traduccion.php");
	require_once($ruta."conf/funciones.php");

	$query="insert into correo (Nombre,Email,Mensaje,IP) values (\"".$nombre."\",\"".$email."\",\"".$mensaje."\",\"".getRealIP()."\")";
  	mysqli_query($link, $query);

	//Mando el mensaje a mi dirección de email
	//En el campo De aparecerá javi@calendario
    $email2="puntairesmari@gmail.com";
    $asunto="Sugerencias";
    $cuerpo="Nombre: ".$nombre."<br> Email: ".$email."<br> Mensaje: ".$mensaje;
	//mail($email2,$asunto,$cuerpo,"From: Contacta Puntaires Mari");
	
    //incluimos la clase PHPMailer
   /* require_once('../conf/PHPMailer/PHPMailerAutoload.php');
    
    //instancio un objeto de la clase PHPMailer
	$correo = new PHPMailer();
	
	//$correo->SMTPDebug = 1;
	
	$correo->IsSMTP();
	
	$correo->SMTPAuth = true;
	
	$correo->SMTPSecure = 'tls';
	
	$correo->Host = "smtp.gmail.com";
	
	$correo->Port = 587;
	
	$correo->Username = "puntairesmari@gmail.com";
	
	$correo->Password   = "torres2008";
	
	$correo->SMTPOptions = array(
			'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
			)
	);
	
	$correo->IsHTML(true);
	$correo->CharSet = 'UTF-8';
	
	//$correo->SetFrom("puntairesmari@gmail.com", "Mi Codigo PHP");
	$correo->SetFrom($email, $nombre);
	
	//$correo->AddReplyTo("puntairesmari@gmail.com","Mi Codigo PHP");
	//$correo->AddReplyTo($email2, "Sugerencias");
	
	//$correo->AddAddress("destino@correo.com", "Jorge");
	$correo->AddAddress($email2, "Sugerencias");
	
	//$correo->Subject = "Mi primero correo con PHPMailer";
	$correo->Subject = $asunto;
	
	//$correo->MsgHTML("Mi Mensaje en <strong>HTML</strong>");
	$correo->MsgHTML($cuerpo);
	
	//$correo->AddAttachment("images/phpmailer.gif");
	
	$correo->Send();*/
	/*if(!$correo->Send()) {
	  echo "Hubo un error: " . $correo->ErrorInfo;
	} else {
	  echo "Mensaje enviado con exito.";
	}*/

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