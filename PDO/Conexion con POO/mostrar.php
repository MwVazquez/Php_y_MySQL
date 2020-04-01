<?php
    require("devuelve.php");
    $pais=$_POST['pais'];
    echo $pais;
    $productos=new DevuelveProductos();
    $array_productos=$productos->get_productos($pais);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        
        foreach($array_productos as $elemento){
            echo "<table><tr><td>";
            echo $elemento['cod_articulo'] . "</td><td>";
            echo $elemento['fecha'] . "</td><td>";
            echo $elemento['importado'] . "</td><td>";
            echo $elemento['nom_articulo'] . "</td><td>";
            echo $elemento['pais_origen'] . "</td><td>";
            echo $elemento['precio'] . "</td><td>";
            echo $elemento['seccion'] . "</td><tr></table>";
            
            echo "<br><br>";
        
        }
        // no puedo usar la con PDO
        //$productos->cerrar_conexion();

        
    ?>
</body>
</html>