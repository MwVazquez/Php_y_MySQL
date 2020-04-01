<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>BBDD con POO</title>
</head>
<body>
    <?php
        require("datosConexion.php");
        $conexion= new mysqli($db_host,$db_usuario,$db_contrasenia,$db_nombreBBDD);
        
        //veo si la conexion falla, muestra el codigo del error
        if($conexion->connect_errno){
            echo "Fallo la conexion " . $conexion->connect_errno;
        }
        $conexion->set_charset("utf8");//agrega simbolos
        
        $consulta="select * from articulos";
        $resultado=$conexion->query($consulta);
        if($conexion->errno){
            die($conexion->error);
        }

        while($fila=$resultado->fetch_assoc()){
            echo "<table><tr><td>";
		    echo $fila['cod_articulo'] . "</td><td> " ;
		    echo $fila['seccion'] . "</td><td> " ;
		    echo $fila['nom_articulo'] . "</td><td> " ;
            echo $fila['precio'] . "</td><td> " ;
            echo $fila['fecha'] . "</td><td> " ;
            echo $fila['importado'] . "</td><td> " ;
            echo $fila['pais_origen'] . "</td><td> " ;
            echo "</td><td></table><br>";
            
            echo "<br><br>";
        }
        $conexion->close();
    ?>
</body>
</html>