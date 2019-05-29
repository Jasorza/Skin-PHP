<?php

include ("../config/Conexion.php");

Class FacturaInsumos
{
    public function __construct()
    {

    }

    public function insertar ($IdMaterial, $Cantidad, $Costo)
    {
        $sql = "INSERT INTO facturainsumos (IdMaterial, Cantidad, Costo
        VALUES ('$IdMaterial' , '$Cantidad', '$Costo')";
        return ejecutarConsulta($sql);
    }

    public function editar ($IdFacturaInsumos, $IdProveedor, $IdMaterial, $Cantidad, $Costo)
    {
        $sql = "UPDATE facturainsumos
        SET IdProveedor = '$IdProveedor', IdMaterial = '$IdMaterial', Cantidad = '$Cantidad', Costo = '$Costo'
        WHERE IdFacturaInsumos = '$IdFacturaInsumos' ";
        return ejecutarConsulta($sql);
    }

    public function listar ()
    {
        $sql = "SELECT p.NIT, m.IdMaterial, f.Cantidad, f.Costo
                FROM facturainsumos f, proveedor p, material m
                WHERE f.IdProveedor = p.IdProveedor AND f.IdMaterial = m.IdMaterial";
        return ejecutarConsulta($sql);
    }

    public function mostrar ($IdFacturaInsumos)
    {
        $sql = "SELECT *
        FROM facturainsumos
        WHERE IdFacturaInsumos= '$IdFacturaInsumos' ";
        return consultarUnaFila($sql);
    }
    public function eliminar ($IdFacturaInsumos)
    {
        $sql = "DELETE *
        FROM facturainsumos
        WHERE IdFacturainsumos = '$IdFacturaInsumos' ";
        return ejecutarConsulta($sql);

    }
}
?>