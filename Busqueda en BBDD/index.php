<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <!-- SUPUESTA EN UN SERVIDOR REAL NO FIGURA ESE ERROR AL NO TENER NADA LA PAGINA
    lo mismo que hize en los archivos, pero solo usando uno solo -->
    <?php
        //conexion por procedimientos
        function conectarYBuscar($buscado){

            require("datosConexion.php");
            $conexion=mysqli_connect($db_host,$db_usuario,$db_contrasenia);// or die("Error en la conexion con el servidor");
        
            if(mysqli_connect_errno()){//para errores
        
                echo "Fallo al conectar con la BBDD";
                exit();
            }
        
            mysqli_set_charset($conexion,"utf8");//para que respete los acentos y caracteres latinos
        
            mysqli_select_db($conexion,$db_nombreBBDD) or die ("No se encuentra la base de datos");//para comprabar que encuentra la base de datos
            $consulta="select * from datospersonales where nombre like '%$buscado%'";
        
            $resultado=mysqli_query($conexion,$consulta);
        
            while($fila=mysqli_fetch_row($resultado)){
                //$fila=mysqli_fetch_row($resultado);//trae una sola linea o registro, en cada llamada trae una nueva.
        
                for($i=0; $i<count($fila); $i++){
                    echo "$fila[$i] " ;
                }
                echo "<br>";
            }
        
            mysqli_close($conexion);
        }
    ?>

    
</head>
<body>
    <h1>Mañaná </h1>

    <?php 
        // el formulario se envia a la misma pagina
        $mibusqueda=$_GET["buscar"];
        $mipag=$_SERVER["PHP_SELF"];//se llama asi misma
        if($mibusqueda!=NULL){
            conectarYBuscar($mibusqueda);
        }
        else{
            echo ("<form action='" . $mipag . "' method='get'>
            <label>Buscar: <input type='texto' name='buscar'></label>	
            <input type='submit' name='enviando' value='Dale!'>
            </form>");
        }
	?>

</body>
</html>