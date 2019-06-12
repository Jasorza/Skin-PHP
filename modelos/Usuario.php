<?php
    include("../config/Conexion.php");

    class Usuario{
        public function __construct()
        {

        }

        public function validarusuario($usuario, $clave){
            $sql="SELECT nombre FROM usuario WHERE login='$usuario' AND clave='$clave' AND condicion='1'";
            return ejecutarConsulta($sql);
        }
    }
?>