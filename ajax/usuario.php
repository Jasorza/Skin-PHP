<?php
    include ("../modelos/Usuario.php");
    $acceso= new Usuario(); //instancia 
    session_start();
    switch ($_GET["op"])
    {
        case 'validaracceso':
            $Email=$_POST["Email"];
            $Contrasena=$_POST["Contrasena"];

            $resultado=$acceso->validarusuario($Email,$Contrasena);
            if($fila=$resultado->fetch_object())
            {
                $_SESSION["Nombre"]=$fila->Nombre;
            }

            echo json_encode($fila);
        break;

        case 'salir':
            session_destroy();
            header("location:../vistas/login.html");
        break;
    }
?>