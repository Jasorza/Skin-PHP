<?php
    include("../config/Conexion.php");

    class Usuario{
        public function __construct()
        {

        }

        public function validarusuario($Email, $Password){
            $sql="SELECT Nombre
                  FROM usuario 
                  WHERE Email='$Email' AND Password='$Password' AND Estado='1'";
            return ejecutarConsulta($sql);
        }
    }
?>