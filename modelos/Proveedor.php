<?php

include ("../config/Conexion.php");

Class Proveedor
{
    public function __construct()
    {
        
    }

    public function insertar ($NIT, $Direccion, $Correo, $Telefono)
    {
        $sql = "INSERT INTO proveedor (NIT, Direccion, Correo, Telefono
        VALUES ('$NIT' , '$Direccion', '$Correo', '$Telefono')";
        return ejecutarConsulta($sql);
    }

    public function editar ($IdProveedor, $NIT, $Direccion, $Correo, $Telefono)
    {
        $sql = "UPDATE proveedor 
        SET NIT = '$NIT', Direccion = '$Direccion', Correo = '$Correo', Telefono = '$Telefono'
        WHERE IdProveedor = '$IdProveedor' ";
        return ejecutarConsulta($sql);
    }

    public function listar ()
    {
        $sql = "SELECT *
        FROM proveedor";
        return ejecutarConsulta($sql);
    }

    public function mostrar ($IdProveedor)
    {
        $sql = "SELECT *
        FROM proveedor
        WHERE IdProveedor= '$IdProveedor' ";
        return consultarUnaFila($sql);
    }

    public function eliminar ($IdProveedor)
    {
        $sql = "DELETE FROM proveedor
        WHERE IdProveedor = '$IdProveedor' ";
        return ejecutarConsulta($sql);
    }
}


?>