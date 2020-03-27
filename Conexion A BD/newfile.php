<?php

$db_host="localhost";			//direccion de la base de datos
$db_nombreBBDD="curso_php";		//nombre de la base de datos
$db_usuario="root";				// nombre del usuario
$db_contrasenia="";				//contraseña


//conexion por procedimientos
$conexion=mysqli_connect($db_host,$db_usuario,$db_contrasenia);// or die("Error en la conexion con el servidor");

if(mysqli_connect_errno()){//para errores
	
	echo "Fallo al conectar con la BBDD";
	exit();
}

mysqli_set_charset($conexion,"utf8");//para que respete los acentos y caracteres latinos

mysqli_select_db($conexion,$db_nombreBBDD) or die ("No se encuentra la base de datos");//para comprabar que encuentra la base de datos
$consulta="select * from datospersonales";

$resultado=mysqli_query($conexion,$consulta);

while($fila=mysqli_fetch_row($resultado)){
//$fila=mysqli_fetch_row($resultado);//trae una sola linea o registro, en cada llamada trae una nueva.

	for($i=0; $i<count($fila); $i++){
		echo "$fila[$i] " ;
	}
	echo "<br>";
}

mysqli_close($conexion);