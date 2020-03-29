<?php
$db_host="localhost";			//direccion de la base de datos
$db_nombreBBDD="curso_php";		//nombre de la base de datos
$db_usuario="root";				// nombre del usuario
$db_contrasenia="";				//contrase�a


//conexion por procedimientos
$conexion=mysqli_connect($db_host,$db_usuario,$db_contrasenia);// or die("Error en la conexion con el servidor");

if(mysqli_connect_errno()){//para errores

	echo "Fallo al conectar con la BBDD";
	exit();
}

$cod_articulo=$_GET["cod_articulo"];
$nombre_articulo=$_GET["nom_articulo"];
$seccion=$_GET["seccion"];
$precio=$_GET["precio"];			///DECIMAL     se separa con un punto. Los defini mal, era decimal (10,5)		
$fecha=$_GET["fecha"];   			/// a�os- meses- dias (2020-01-27)
$importado=$_GET["importado"];		/// parece k el tipo booleano no existe, solo hace un  TINYINT(1)			
$pais_origen=$_GET["pais_origen"];


echo "$cod_articulo   ,$nombre_articulo   ,$seccion ,$precio ,$fecha ,$importado ,$pais_origen";


mysqli_set_charset($conexion,"utf8");//para que respete los acentos y caracteres latinos

mysqli_select_db($conexion,$db_nombreBBDD) or die ("No se encuentra la base de datos");//para comprabar que encuentra la base de datos

$consulta="update articulos set seccion='$seccion',nom_articulo='$nombre_articulo',
fecha='$fecha', pais_origen='$pais_origen',precio=$precio, importado=$importado where cod_articulo ='$cod_articulo'";

//update articulos set seccion='pepe',nom_articulo='naranja',
//fecha='2020-01-01', pais_origen='pais_origen',precio=precio, importado=45 where cod_articulo ='AAAA09';


$resultado=mysqli_query($conexion,$consulta);


if(!$resultado){
	echo "Error en la actualizacion";
}
else{
	$borrados=mysqli_affected_rows($conexion);
	if(!$borrados){
		echo "	no hay registros que actualizar con ese criterio";
	}
	else{
		echo ($borrados>1?"Se actualizaron $borrados registros ":" Se actualizo un registro");
		
		echo "<table><tr><td>$cod_articulo</td></tr>";
		echo "<tr><td>$seccion</td></tr>";
		echo "<tr><td>$nombre_articulo</td></tr>";
		echo "<tr><td>$fecha</td></tr>";
		echo "<tr><td>$pais_origen</td></tr>";
		echo "<tr><td>$precio</td></tr></table>";
	}

}





mysqli_close($conexion);

?>