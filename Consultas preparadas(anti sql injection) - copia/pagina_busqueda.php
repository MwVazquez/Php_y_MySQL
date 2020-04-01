<?php
require("datosConexion.php");


$conexion=mysqli_connect($db_host,$db_usuario,$db_contrasenia);// or die("Error en la conexion con el servidor");

if(mysqli_connect_errno()){//para errores

	echo "Fallo al conectar con la BBDD";
	exit();
}
//Elimina caracteres extraños como (',&,etc) de lo recibido del formulario
//$busqueda=mysqli_real_escape_string($conexion,$_GET["buscar"]);
$busqueda=$_GET["buscar"];
mysqli_set_charset($conexion,"utf8");//para que respete los acentos y caracteres latinos

mysqli_select_db($conexion,$db_nombreBBDD) or die ("No se encuentra la base de datos");//para comprabar que encuentra la base de datos
//$consulta="select * from datospersonales where nombre like '%$busqueda%'";


//1° paso
$consulta="select cod_articulo, seccion, precio,pais_origen from articulos where pais_origen = ?";
//2°paso
$resultado=mysqli_prepare($conexion,$consulta);
//3° unir
$unionResultadoConsulta=mysqli_stmt_bind_param($resultado,"s",$busqueda);
//4°ejecutar consulta
$ejecucion=mysqli_stmt_execute($resultado);
if($ejecucion==false){
	echo "Error al ejecutar la consulta";
}
else{
	//5°
	//tantos campos como devuelve, en este caso 4 campos
	//hay que respetar el orden que se escribieron arriba
	$asociacion=mysqli_stmt_bind_result($resultado,$codigo,$seccion,$precio,$pais);
	echo "Articulos encontrados <br> <br>";
	while(mysqli_stmt_fetch($resultado)){
		echo $codigo . " " . $seccion . " " . $precio . " " . $pais . "<br>" ;
	}
	mysqli_stmt_close($resultado);
	
	mysqli_stmt_close($resultado);
}
echo "$consulta<br><br>";

mysqli_close($conexion);
