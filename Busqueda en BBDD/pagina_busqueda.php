<?php
require("datosConexion.php");

//conexion por procedimientos
$conexion=mysqli_connect($db_host,$db_usuario,$db_contrasenia);// or die("Error en la conexion con el servidor");

if(mysqli_connect_errno()){//para errores

	echo "Fallo al conectar con la BBDD";
	exit();
}
//Elimina caracteres extraños como (',&,etc) de lo recibido del formulario
$busqueda=mysqli_real_escape_string($conexion,$_GET["buscar"]);
mysqli_set_charset($conexion,"utf8");//para que respete los acentos y caracteres latinos

mysqli_select_db($conexion,$db_nombreBBDD) or die ("No se encuentra la base de datos");//para comprabar que encuentra la base de datos
//$consulta="select * from datospersonales where nombre like '%$busqueda%'";


$consulta="select * from datospersonales where nombre = '$busqueda'";
// para sql inyeccion
//SQL INyeccion (' or '1'='1)
//mario' or '1'='1

echo "$consulta<br><br>";

$resultado=mysqli_query($conexion,$consulta);
$afectados=mysqli_num_rows($resultado);
if($afectados>0){


	while($fila=mysqli_fetch_array($resultado,MYSQLI_ASSOC)){

		echo "<table><tr><td>";
		echo $fila['nombre'] . "</td><td> " ;
		echo $fila['edad'] . "</td><td> " ;
		echo $fila['apellido'] . "</td><td> " ;
		echo $fila['dni'] . "</td><td> " ;
		echo "</td><td></table><br>";
	}
}
else{
	echo "No se encontraron resultados";
}

mysqli_close($conexion);
