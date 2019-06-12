<?php
    include ("../modelos/Usuario.php");
    $acceso= new Usuario(); //instancia 
    session_start();
    switch ($_GET["op"])
    {
        case 'validaracceso':
            $usuario=$_POST["usuario"];
            $password=$_POST["password"];

            $resultado=$acceso->validarusuario($usuario,$clave);
            if($fila=$resultado->fetch_object())
            {
                $_SESSION["nombre"]=$fila->nombre;
            }

            echo json_encode($fila);
        break;

        case 'salir':
            session_destroy();
            header("location:../vistas/login.html");
        break;
    }
?>