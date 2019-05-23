<?php
include ("../modelos/Proveedor.php");

$proveedor = new Proveedor();

$IdProveedor="";
$NIT="";
$Direccion="";
$Correo="";
$Telefono="";

if (isset($_POST["IdProveedor"])) {
    $IdProveedor=$_POST["IdProveedor"];
}
if (isset($_POST["NIT"])) {
    $NIT=$_POST["NIT"];
}
if (isset($_POST["Direccion"])) {
    $Direccion=$_POST["Direccion"];
}
if (isset($_POST["Correo"])) {
    $Correo=$_POST["Correo"];
}
if (isset($_POST["Telefono"])) {
    $Telefono=$_POST["Telefono"];
}

switch ($_GET["op"]){
    case 'guardaryeditar':
        if (empty($IdProveedor)) {
            $rspta=$proveedor->insertar($NIT, $Direccion, $Correo, $Telefono);
            echo $rspta ? "Proveedor Registrado " : "Proveedor no se pudo registrar";
        }
        else {
            $rspta=$proveedor->editar($IdProveedor,$NIT,$Direccion, $Correo, $Telefono);
            echo $rspta ? "Proveedor Actualizado" : "Proveedor no se pudo actualizar";
        }
    break; 

    case 'mostrar':
        $rspta=$proveedor->mostrar($IdProveedor);
        echo json_encode($rspta);
    break;  

    case 'listar':
        $rspta = $proveedor->listar();
        $data= Array();

    while ($reg=$rspta->fetch_object()) {
         $data[]=array(
            "0"=>$reg->IdProveedor,
            "1"=>$reg->NIT,
            "2"=>$reg->Direccion,
            "3"=>$reg->Correo,
            "4"=>$reg->Telefono,
        );
    }
    $results = array(
        "sEcho"=>1,
        "iTotalRecords"=>count($data),
        "iTotalDisplayRecords"=>count($data),
        "aaData"=>$data);

        echo json_encode($results);

        break;
    }

?>