<?php
include ("../modelos/Facturainsumos.php");

$facturainsumos = new FacturaInsumos();

$IdFacturaInsumos="";
$IdProveedor="";
$IdMaterial="";
$Cantidad="";
$Costo="";

if (isset($_POST["IdFacturaInsumos"])) {
    $IdFacturaInsumos=$_POST["IdFacturaInsumos"];
}
if (isset($_POST["IdProveedor"])) {
    $IdProveedor=$_POST["IdProveedor"];
}
if (isset($_POST["IdMaterial"])) {
    $IdMaterial=$_POST["IdMaterial"];
}
if (isset($_POST["Cantidad"])) {
    $Cantidad=$_POST["Cantidad"];
}
if (isset($_POST["Costo"])) {
    $Costo=$_POST["Costo"];
}


switch ($_GET["op"]){
    case 'guardaryeditar':
        if (empty($IdFacturaInsumos)) {
            $rspta=$facturainsumos->insertar($IdProveedor, $IdMaterial, $Cantidad, $Costo);
            echo $rspta ? "Factura de insumos registrada " : "Factura de insumos no se pudo registrar";
        }
        else {
            $rspta=$proveedor->editar($IdFacturaInsumos, $IdProveedor, $IdMaterial, $Cantidad, $Costo);
            echo $rspta ? "Factura de insumos actualizada" : "Factura de insumos no se pudo actualizar";
        }
    break; 

    case 'mostrar':
        $rspta=$facturainsumos->mostrar($IdFacturaInsumos);
        echo json_encode($rspta);
    break;  

    case 'listar':
        $rspta = $facturainsumos->listar();
        $data= Array();

    while ($reg=$rspta->fetch_object()) {
         $data[]=array(
            "0"=>$reg->IdFacturaInsumos,
            "1"=>$reg->Proveedor,
            "2"=>$reg->Material,
            "3"=>$reg->Cantidad,
            "4"=>$reg->Costo,
        );
    }
    $results = array(
        "sEcho"=>1,
        "iTotalRecords"=>count($data),
        "iTotalDisplayRecords"=>count($data),
        "aaData"=>$data);

        echo json_encode($results);

        break;
    
    case 'eliminar':
        $rspta = $facturainsumos->eliminar($IdFacturaInsumos);
        echo $rspta ? "Factura de insumos eliminada" : "factura de insumos no se pudo eliminar";
    break;

    }

