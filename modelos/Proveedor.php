<?php

include ("../config/Conexion.php");

Class Proveedor
{
    public function __construct()
    {

    }

    public function insertar($Nombre, $NIT, $Direccion, $Correo, $Telefono)
    {
        $sql = "INSERT INTO proveedor (Nombre, NIT, Direccion, Correo, Telefono)
        VALUES ('$Nombre', '$NIT' , '$Direccion', '$Correo', '$Telefono')";
        return ejecutarConsulta($sql);
    }

    public function editar($IdProveedor, $Nombre, $NIT, $Direccion, $Correo, $Telefono)
    {
        $sql = "UPDATE proveedor
        SET Nombre = $Nombre, NIT = '$NIT', Direccion = '$Direccion', Correo = '$Correo', Telefono = '$Telefono'
        WHERE IdProveedor = '$IdProveedor'";
        return ejecutarConsulta($sql);
    }

    public function eliminar($IdProveedor)
    {
        $sql = "DELETE FROM proveedor
        WHERE IdProveedor = '$IdProveedor'";
        return ejecutarConsulta($sql);
    }

   

    public function mostrar($IdProveedor)
    {
        $sql = "SELECT *
        FROM proveedor
        WHERE IdProveedor= '$IdProveedor'";
        return consultarUnaFila($sql);
    }
    public function listar()
    {
        $sql = "SELECT *
        FROM proveedor p";
        return ejecutarConsulta($sql);
    }

    public function select()
	{
		$sql="SELECT *
			  FROM proveedor
			  WHERE condicion='1'";
		return ejecutarConsulta($sql);		
    }
}
?>