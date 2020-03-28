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

$cod_articulo=$_GET["c_art"];
$nombre_articulo=$_GET["n_art"];
$seccion=$_GET["seccion"];
$precio=$_GET["precio"];			///DECIMAL     se separa con un punto. Los defini mal, era decimal (10,5)		
$fecha=$_GET["fecha"];   			/// años- meses- dias (2020-01-27)
$importado=$_GET["importado"];		/// parece k el tipo booleano no existe, solo hace un  TINYINT(1)			
$pais_origen=$_GET["p_orig"];



mysqli_set_charset($conexion,"utf8");//para que respete los acentos y caracteres latinos

mysqli_select_db($conexion,$db_nombreBBDD) or die ("No se encuentra la base de datos");//para comprabar que encuentra la base de datos
$consulta="insert into articulos(cod_articulo,seccion,nom_articulo,fecha, pais_origen,precio,importado)
values ('$cod_articulo','$seccion','$nombre_articulo','$fecha','$pais_origen',$precio,$importado)";

$resultado=mysqli_query($conexion,$consulta);





if(!$resultado){
	echo "Error en la insercion";}
else{
	echo "Insercion exitosa<br><br>";
	echo "<table><tr><td>$cod_articulo</td></tr>";
	echo "<tr><td>$seccion</td></tr>";
	echo "<tr><td>$nombre_articulo</td></tr>";
	echo "<tr><td>$fecha</td></tr>";
	echo "<tr><td>$pais_origen</td></tr>";
	echo "<tr><td>$precio</td></tr></table>";
}
mysqli_close($conexion);

?>