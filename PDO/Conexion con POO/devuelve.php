<?php
    require("conexionPDO.php");
    

    //para lo comentado
    //require ("../../Conexion usando Clases POO/conexion.php");

    class DevuelveProductos extends Conexion{

        //constructor
        public function __construct (){
            //llamo a constructor del padre
            parent::__construct();
        }

        // esta es para consulta hardcodeada
        // public function get_productos(){
        //     $resultado=$this->conexion_db->query('select * from articulos');
        //     $productos=$resultado->fetch_all(MYSQLI_ASSOC);
        //     return $productos;
        // }

        // no puedo usar esta con PDO, debo asignarla a null, una mierda
        public function cerrar_conexion()
        {
            $this->conexion_db->close();
        }


        //---------------------------------usando mysqli
        //devuelve e resultado en un array asociativo
        // public function get_productos($pais){
        //     $resultado=$this->conexion_db->query('select * from articulos where pais_origen="' . $pais . '"');
        //     $productos=$resultado->fetch_all(MYSQLI_ASSOC);
        //     return $productos;
        // }

        //-------------------------------------usando PDO
        public function get_productos($pais){
            $consulta='select * from articulos where pais_origen="' .  $pais . '"';
            echo "<br><br><br>";
            echo $consulta;
            $sentencia=$this->conexion_db->prepare($consulta);
            $sentencia->execute(array());
            $resultado= $sentencia->fetchAll(PDO::FETCH_ASSOC);
            $sentencia->closeCursor();
            $this->conexion_db=null; // cierro conexion
            return $resultado;
        }

    }
?>