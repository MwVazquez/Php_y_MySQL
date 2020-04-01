<?php
    //require("config.php");
   require ("../../Conexion usando Clases POO/config.php");
    class Conexion{
        protected $conexion_db;

        //constructor
        public function __construct()
        {
            //---------------------------- Usando Mysqli
            // $this->conexion_db=new mysqli(DB_HOST, DB_USUARIO,DB_CONTRA,DB_NOMBRE);
            // if($this->conexion_db->connect_errno){
            //     echo"Fallo al conectar a Mysql: " . $ $this->conexion_db->connect_error;
            //     return;
            // }
            // //seteo de juego de caracteres
            // $this->conexion_db->set_charset(DB_CHARSET);



            //------------------------------Usando PBO
            try{
                //$consulta='select * from articulos where pais_origen="' .  $pais . '"';
                $this->conexion_db=new PDO('mysql:host=localhost; dbname=curso_php',DB_USUARIO,DB_CONTRA );
                //Reporte de errores. Lanza excepciones
                $this->conexion_db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $this->conexion_db->exec("set character set utf8");
                echo "Se construyo CONEXIONPDO<br><br>";
               
            } catch(Exception $e){
                echo "La linea de error es: " . $e->getMessage();

            }
            // finally{
            //     $this->conexion_db=null;//asi se cierra, es una mierda
            // }

        }

        
    }
?>