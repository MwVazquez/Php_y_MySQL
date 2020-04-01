<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO</title>
</head>
<body>
    <h1>Conexion a cualquier base de datos</h1>
    <h3>Busca codigo de producto</h3>
    <?php
        $busqueda_sec=$_GET['seccion'];
        $busqueda_pai=$_GET['pais'];
        try{
            $base= new PDO('mysql:host=localhost; dbname=curso_php' , 'root','');
            //Reporte de errores. Lanza excepciones
            $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $base->exec("set character set utf8");
            echo "Conexion exitosa";
            $consulta="select cod_articulo,nom_articulo,seccion,pais_origen from articulos where seccion=:secc and pais_origen=:porig";
            $resultado=$base->prepare($consulta);
            $resultado->execute(array(":secc"=>$busqueda_sec, ":porig"=>$busqueda_pai));

            while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                echo"Codigo de Articulo" . $registro['cod_articulo'] . "<br>";
                echo"Nombre Articulo" . $registro['nom_articulo'] . "<br>";
                echo" Seccion " . $registro['seccion'] . "<br>";
                echo"Pais de origen" . $registro['pais_origen'] . "<br>";
            }

            $resultado->closeCursor();
        } catch(Exception $e){
            die('Error: ' . $e->getMessage());
        } finally{
            $base=null;//asi se cierra, es una mierda
        }
    ?>
    
</body>
</html>