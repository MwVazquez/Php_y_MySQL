<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO</title>
</head>
<body>
    <h1>Conexion a cualquier base de datos</h1>
    <h3>inserta en la tabla articulos</h3>
    <?php
        $busqueda_sec=$_POST['seccion'];
        $busqueda_pai=$_POST['p_orig'];
        $busqueda_car=$_POST['c_art'];
        $busqueda_nar=$_POST['n_art'];
        $busqueda_pre=$_POST['precio'];
        $busqueda_imp=$_POST['importado'];
        $busqueda_fec=$_POST['fecha'];
        try{
            $base= new PDO('mysql:host=localhost; dbname=curso_php' , 'root','');
            //Reporte de errores. Lanza excepciones
            $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $base->exec("set character set utf8");
            echo "Conexion exitosa";
            $consulta="insert into articulos (cod_articulo,seccion,nom_articulo,precio,fecha,importado,pais_origen)
            values (:car, :sec, :nar, :pre, :fec, :imp, :por)";
            $resultado=$base->prepare($consulta);
            //notar que si elimino los dos puntos iniciales, sigue funcionando
            $resultado->execute(array(":car"=>$busqueda_car, ":sec"=>$busqueda_sec, ":nar"=>$busqueda_nar, ":pre"=>$busqueda_pre,
            "fec"=>$busqueda_fec, ":imp"=>$busqueda_imp, ":por"=>$busqueda_pai));

            $afectados=$resultado->rowCount();
            if($afectados==0)
                echo"no se inserto nada";
            if($afectados==1){
                echo "Se inserto un registro";
            }
            if($afectados==1){
                echo "Se insertarom: $afectados registros";
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