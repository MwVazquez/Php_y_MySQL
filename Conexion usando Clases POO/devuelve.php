<?php
    require("conexion.php");

    class DevuelveProductos extends Conexion{

        //constructor
        public function __construct (){
            //llamo a constructor del padre
            parent::__construct();
        }

        //devuelve e resultado en un array asociativo
        public function get_productos(){
            $resultado=$this->conexion_db->query('select * from articulos');
            $productos=$resultado->fetch_all(MYSQLI_ASSOC);
            return $productos;
        }
        public function cerrar_conexion()
        {
            //parent::cerrar_conexion();
            $this->conexion_db->close();
        }

    }
?>