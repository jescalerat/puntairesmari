<?php
	session_start();
	require_once("../conf/conexion.php");
	$link = Conectarse();

	//En principio suponemos que el usuario no esta registrado
	$registrado=0;

	//Cogemos los datos que nos envian del indice y comprobamos si el usuario esta registrado
	if (!empty($_POST['usuario'])&&!empty($_POST['password']))
	{
		$usuario=$_POST['usuario'];
		$password=$_POST['password'];
		
		$query="select * from usuarios where Usuario=\"".$usuario."\" and  Password=\"".$password."\"";
		$q=mysqli_query($link, $query);
		$rowUsuario=mysqli_fetch_array($q);
		$registrado=mysqli_num_rows($q);
	
		$_SESSION["registrado"]=$registrado;
		$_SESSION["usuario"]=$usuario;

		if ($registrado != 0)
		{
		    $_SESSION["tipo_usuario"]=$rowUsuario["Tipo"];
		    $_SESSION["nombre"]=$rowUsuario["Nombre"];
		}
		mysqli_free_result($q);
	}
	else
	{
		session_destroy();
		header("Location:login.php");	
	}
	
	//Si no esta registrado se volvera a la pagina index y aparecera el error.
	//En caso de que este registrado iremos a la pagina principal.
	if ($registrado != 0)
	{
	    $pagina = $_POST['abrirpagina'];
	    if ($pagina == 1){
	        header("Location:index.php");
	    } else if ($pagina == 2){
	        header("Location:paginas/bbdd.php");
	    } else if ($pagina == 3){
	        header("Location:comprobar_visitas.php");
	    } else if ($pagina == 4){
	        header("Location:comprobar_paginas_vistas.php");
	    } else {
	        header("Location:index.php");
	    }
	    
	}
	else
	{
	    session_destroy();
	    header("Location:login.php?error=1");
	}
?>
