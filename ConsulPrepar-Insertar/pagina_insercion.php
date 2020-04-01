<?php
$cod_articulo=$_GET["c_art"];
$nombre_articulo=$_GET["n_art"];
$seccion=$_GET["seccion"];
$precio=$_GET["precio"];			///DECIMAL     se separa con un punto. Los defini mal, era decimal (10,2)		
$fecha=$_GET["fecha"];   			/// a�os- meses- dias (2020-01-27)


if (isset($_GET['importado'])) {
	$importado=$_GET["importado"];
	if($importado=="si")
		$bool_importado=1;
	 else
		$bool_importado=0;
}
$pais_origen=$_GET["select"];

echo "EL codigo es: $cod_articulo  <br>
El nombre es: $nombre_articulo  <br>  
La seccion es: $seccion <br>
La fecha es:  $fecha  <br>
El precio es: $precio<br>
El producto es importado? : $importado";
echo "El pais de origen es: $pais_origen ";

require("datosConexion.php");


$conexion=mysqli_connect($db_host,$db_usuario,$db_contrasenia);// or die("Error en la conexion con el servidor");

if(mysqli_connect_errno()){//para errores

	echo "Fallo al conectar con la BBDD";
	exit();
}
//Elimina caracteres extraños como (',&,etc) de lo recibido del formulario
//$busqueda=mysqli_real_escape_string($conexion,$_GET["buscar"]);

mysqli_set_charset($conexion,"utf8");//para que respete los acentos y caracteres latinos

mysqli_select_db($conexion,$db_nombreBBDD) or die ("No se encuentra la base de datos");//para comprabar que encuentra la base de datos
//$consulta="select * from datospersonales where nombre like '%$busqueda%'";


//1° paso
if($bool_importado){
	$consulta="insert into articulos (cod_articulo, seccion, nom_articulo,
	precio,fecha,importado,pais_origen) values(?,?,?,?,?,?,?)";
}	
else{
	$consulta="insert into articulos (cod_articulo, seccion, nom_articulo,
	precio,fecha,importado) values(?,?,?,?,?,?)";
}
//2°paso
$resultado=mysqli_prepare($conexion,$consulta);
//3° unir
if($bool_importado){
	$unionResultadoConsulta=mysqli_stmt_bind_param($resultado,"sssdsis",$cod_articulo,$seccion,$nombre_articulo,
	$precio,$fecha,$bool_importado,$pais_origen);
}else{
	$unionResultadoConsulta=mysqli_stmt_bind_param($resultado,"sssdsi",$cod_articulo,$seccion,$nombre_articulo,
	$precio,$fecha,$bool_importado);
}
//4°ejecutar consulta
$ejecucion=mysqli_stmt_execute($resultado);
if($ejecucion==false){
	echo "Error al ejecutar la consulta";
}
else{
	//5°
	//tantos campos como devuelve, en este caso 4 campos
	//hay que respetar el orden que se escribieron arriba
	
	//en este caso no se nececita
	// $asociacion=mysqli_stmt_bind_result($cod_articulo,$seccion,
	// $nombre_articulo,$precio,$fecha,$bool_importado,$pais_origen);
	echo "<br>Articulo agregado <br> <br>";
	// while(mysqli_stmt_fetch($resultado)){
	// 	echo $cod_articulo . " " . $seccion . " " . $nombre_articulo
	// 	. " " . $precio,$fecha . " " . $bool_importado . " " . $pais_origen);
	// }
	mysqli_stmt_close($resultado);
}
echo "$consulta<br><br>";

mysqli_close($conexion);
