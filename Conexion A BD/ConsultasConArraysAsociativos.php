<?php

$db_host="localhost";			//direccion de la base de datos
$db_nombreBBDD="curso_php";		//nombre de la base de datos
$db_usuario="root";				// nombre del usuario
$db_contrasenia="";				//contrase�a


//------------------------------conexion por procedimientos




$conexion=mysqli_connect($db_host,$db_usuario,$db_contrasenia);// or die("Error en la conexion con el servidor");
//saco el nombre de la base de datos, para hacer otra validacion con ella


//solo sucede si no se pudo conectar a la base de datos
if(mysqli_connect_errno()){//para errores
	
	echo "Fallo al conectar con la BBDD";
	exit();// sale de la base de datos
}

mysqli_set_charset($conexion,"utf8");//para que respete los acentos y caracteres latinos

mysqli_select_db($conexion,$db_nombreBBDD) or die ("No se encuentra la base de datos");//para comprabar que encuentra la base de datos

$consulta="select * from datospersonales";//consulta

$resultado=mysqli_query($conexion,$consulta);//ejecuta consulra

		//una forma de mostrar los resultados
// while($fila=mysqli_fetch_row($resultado)){
// 	//cada vez es llamada trae la primer fila
// 	//$fila es un array indexados
// 	echo $fila[0] . " ";
// 	echo $fila[1] . " ";
// 	echo $fila[2] . " ";
// 	echo $fila[3] . " ";
// 	echo "<br>";
// }


while($fila=mysqli_fetch_array($resultado , MYSQLI_ASSOC)){
	//trabaja con arrays asociativos por la parametro opcional(Seria lo mismo que MYSQLI_ASSOC)
	//podria usar css
	echo "<table><tr><td>";
	
	echo $fila['nombre'] . "</td><td> " ;
	echo $fila['edad'] . "</td><td> " ;
	echo $fila['apellido'] . "</td><td> " ;
	echo $fila['dni'] . "</td><td> " ;
	echo "</td><td></table><br>";
}

mysqli_close($conexion);
