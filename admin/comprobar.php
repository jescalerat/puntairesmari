<?php
	session_start();
	//Conexión a base de datos
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
	require_once($ruta."conf/conexion.php");
	$link=Conectarse();

	//En principio suponemos que el usuario no esta registrado
	$registrado=0;

	//Cogemos los datos que nos envian del indice y comprobamos si el usuario esta registrado
	if (!empty($_POST['usuario'])&&!empty($_POST['password']))
	{
		$usuario=$_POST['usuario'];
		$password=$_POST['password'];
		
		$query="select * from usuarios where Usuario=\"".$usuario."\" and  Password=\"".$password."\"";
		$q=mysqli_query($link, $query);
		$rowusuario=mysqli_fetch_array($q, MYSQLI_BOTH);
		$registrado=mysqli_num_rows($q);
		
		$_SESSION["registrado"]=$registrado;
		$_SESSION["usuario"]=$usuario;
		if ($registrado != 0)
		{
			$_SESSION["nombre"]=$rowusuario["Nombre"];
		}
	}
	else
	{
		session_destroy();
		header("Location:login.php");	
	}

	//Si no esta registrado se volverá a la página index y aparecerá el error.
	//En caso de que este registrado iremos a la página principal.
print("registrado: ".$registrado);	
	if ($registrado != 0)
	{
		header("Location:index.php");
	}
	else
	{
		session_destroy();
		header("Location:login.php");	
	}
?>
