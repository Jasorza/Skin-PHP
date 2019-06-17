<?php
    include("../config/Conexion.php");

    class Usuario{
        public function __construct()
        {

        }

        public function validarusuario($Email, $Contrasena){
            $sql="SELECT Nombres
                  FROM usuario 
                  WHERE Email='$Email' AND Contrasena='$Contrasena' AND Estado='1'";
            return ejecutarConsulta($sql);
        }
    }
?>