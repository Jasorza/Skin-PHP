<?php
    include ("../modelos/Usuario.php");
    $acceso= new Usuario(); //instancia 
    session_start();
    switch ($_GET["op"])
    {
        case 'validaracceso':
            $Email=$_POST["Email"];
            $Password=$_POST["Password"];

            $resultado=$acceso->validarusuario($Email,$Password);
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