<?php
include("../modelos/Proveedor.php");

$proveedor = new Proveedor();

$IdProveedor="";
$Nombre="";
$NIT="";
$Direccion="";
$Correo="";
$Telefono="";

if (isset($_POST["IdProveedor"])) {
    $IdProveedor=$_POST["IdProveedor"];
}
if(isset($_POST["Nombre"])){
    $Nombre=$_POST["Nombre"];
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
            $rspta=$proveedor->insertar($Nombre, $NIT, $Direccion, $Correo, $Telefono);
            echo $rspta ? "Proveedor Registrado " : "El Proveedor no se pudo registrar";
        }
        else {
            $rspta=$proveedor->editar($IdProveedor, $Nombre, $NIT, $Direccion, $Correo, $Telefono);
            echo $rspta ? "Proveedor Actualizado" : "El Proveedor no se pudo actualizar";
        }
    break;

    case 'eliminar':
        $rspta=$proveedor->eliminar($IdProveedor);
        echo $rspta ? "Proveedor eliminado" : "Proveedor no se pudo eliminar";
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
                "0"=>'<button class="btn btn-danger" onclick="eliminar('.$reg->IdProveedor.')"><i class="far fa-trash-alt"></i></button>'.
                    ' <button class="btn btn-warning" onclick="mostrar('.$reg->IdProveedor.')"><i class="fas fa-edit"></i></button>',
                "1"=>$reg->Nombre,
                "2"=>$reg->NIT,
                "3"=>$reg->Direccion,
                "4"=>$reg->Correo,
                "5"=>$reg->Telefono,
            );
        }
        $results = array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data
        );
        echo json_encode($results);
    break;

    // case 'selectProveedor':
	// 	//require_once "../modelos/Proveedor.php";
	// 	//$proveedor = new Proveedor();
	// 	//$rspta = $proveedor->select();
	// 	while ($reg = $rspta->fetch_object())
	// 	{
	// 	echo '<option value=' . $reg->IdProveedor . '>' . $reg->Nombre . '</option>';			
	// 	}
	// break;

    }
?>