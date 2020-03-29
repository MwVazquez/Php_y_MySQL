
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

$busqueda=$_GET['buscar'];//recibo dato del formulario
mysqli_set_charset($conexion,"utf8");//para que respete los acentos y caracteres latinos

mysqli_select_db($conexion,$db_nombreBBDD) or die ("No se encuentra la base de datos");//para comprabar que encuentra la base de datos
$consulta="select * from articulos where nom_articulo like '%$busqueda%'";

$resultado=mysqli_query($conexion,$consulta);



while($fila=mysqli_fetch_array($resultado , MYSQLI_ASSOC)){
	//$fila=mysqli_fetch_array($resultado,MYSQL_ASSOC);//trabaja con arrays asociativos

	
	//crea una nueva tabla, en la que se puede actualizar ALGUNOS datos
	//CUIDADO CON LOS ESPACIOS ENTRE (COMILLAS Y COMILLAS DOBLES)
	echo "<form action='Actualizar.php' method='get'>";
	echo "<input type='text' name='cod_articulo' value='" . $fila['cod_articulo']."' readonly ><br>";
	echo "<input type='text' name='seccion' value='" . $fila['seccion'] . "'><br>";
	echo "<input type='text' name='nom_articulo' value='" . $fila['nom_articulo'] . "'><br>";
	echo "<input type='text' name='precio' value='" . $fila['precio'] . "'><br>";
	echo "<input type='text' name='fecha' value='" . $fila['fecha'] . "'><br>";
	echo "<input type='text' name='importado' value='" . $fila['importado'] . "'><br>";
	echo "<input type='text' name='pais_origen' value='" . $fila['pais_origen'] . "'><br>";
	
	echo "<input type='submit' name='enviando' value='Actualizar'>";
	echo "</form>";
	
}


mysqli_close($conexion);
