<?php
    require("config.php");
    class Conexion{
        protected $conexion_db;

        //constructor
        public function __construct()
        {
            $this->conexion_db=new mysqli(DB_HOST, DB_USUARIO,DB_CONTRA,DB_NOMBRE);
            if($this->conexion_db->connect_errno){
                echo"Fallo al conectar a Mysql: " . $ $this->conexion_db->connect_error;
                return;
            }
            //seteo de juego de caracteres
            $this->conexion_db->set_charset(DB_CHARSET);
        }

        // protected function cerrar_conexion(){
        //     $this->conexion_db->close();
        // }
    }
?>