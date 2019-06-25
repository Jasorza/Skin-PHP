<?php
include("../modelos/Registrarse.php");

$registrar = new Registrar();

$IdUser="";
$Nombres="";
$Apellidos="";
$Email="";
$Contraseña="";

if (isset($_POST["IdUser"])) {
    $IdProveedor=$_POST["IdUser"];
}
if(isset($_POST["Nombres"])){
    $Nombre=$_POST["Nombres"];
}
if (isset($_POST["Apellidos"])) {
    $NIT=$_POST["Apellidos"];
}
if (isset($_POST["Email"])) {
    $Direccion=$_POST["Email"];
}
if (isset($_POST["Contraseña"])) {
    $Correo=$_POST["Contraseña"];
}



switch ($_GET["op"]){
    case 'guardaryeditar':
        if (empty($IdUser)) {
            $rspta=$registrar->insertar($Nombres, $Apellidos, $Email, $Contraseña);
            echo $rspta ? " Registrado Correctamente " : " No se pudo registrar";
    break;
        }
}