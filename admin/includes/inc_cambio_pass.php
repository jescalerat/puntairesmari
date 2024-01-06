<?php
    $error = 0;
    
    if (isset($_POST['pass_actual']) && isset($_POST['pass_nueva']) && isset($_POST['pass_nueva_r']))
    {
        $query="select * from usuarios where Usuario='".$_SESSION['usuario']."'";
        $qUsuario=mysqli_query ($link, $query);
        $rowUsuario=mysqli_fetch_array($qUsuario);

        $pass_bbdd = $rowUsuario["Password"];
		
  		$mensaje = "";
  		if ($_POST['pass_nueva'] != $_POST['pass_nueva_r'])
  		{
  			$error = 1;
  			$mensaje = "<p class=\"text-center text-danger\">No coinciden la contraseña nueva con la repetición</p>";
  		}
  		else if ($_POST['pass_actual'] != $pass_bbdd)
  		{
  			$error = 1;
  			$mensaje = "<p class=\"text-center text-danger\">La contraseña actual no coincide con la contraseña que tiene en base de datos</p>";
  		}
  		else
  		{
  			$query="update usuarios set Password='".$_POST['pass_nueva']."'";
  			$query.=" where Usuario='".$_SESSION['usuario']."'";
  			$qresultado=mysqli_query ($link, $query);
  			
  			if ($qresultado<>1)
            {
                $error=1;
                $mensaje = "<p class=\"text-center text-danger\">Pruebe otra vez. Ha habido un error en la conexión</p>";
            }
			else
			{
				$error=1;
				$mensaje = "<p class=\"text-center text-info\">Cambio realizado correctamente</p>";
            }
        }
    }

?>
<h1 class="text-center">CAMBIO CONTRASE&Ntilde;A</h1>
<form role="form" id="cambio_pass" method="post" action="cambio_pass.php">
	<table class="table">
   		<tr class="d-flex">
			<td class="col-4 text-right">Contrase&ntilde;a actual:</td>
       		<td class="col-8 text-center"><input class="form-control" type="password" name="pass_actual" id="pass_actual" required="required"></td>
       	</tr>
       	
       	<tr class="d-flex">
			<td class="col-4 text-right">Nueva contrase&ntilde;a:</td>
       		<td class="col-8 text-center"><input class="form-control" type="password" name="pass_nueva" id="pass_nueva" required="required"></td>
       	</tr>
       	
       	<tr class="d-flex">
			<td class="col-4 text-right">Repita contrase&ntilde;a:</td>
       		<td class="col-8 text-center"><input class="form-control" type="password" name="pass_nueva_r" id="pass_nueva_r" required="required"></td>
       	</tr>
	
		<tr class="d-flex">
       		<td class="col-12 text-center">
       			<button type="submit" class="btn btn-default"><?= cambiarAcentos(_ENVIAR) ?></button>
       		</td>
       	</tr>
	</table>
	
<?php
	
    if ($error == 1)
    {
        print(cambiarAcentos($mensaje));
    }
?>
</form>	