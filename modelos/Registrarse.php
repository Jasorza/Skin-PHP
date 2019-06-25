<?php
 include ("../config/Conexion.php");

//  $message = '';

//  if  (!empty($_POST['Nombres']) && !empty($_POST['Apellidos']) &&  !empty($_POST['Email']) && !empty($_POST['Contraseña']) ) {
//    $sql = "INSERT INTO usuario (Nombres, Apellidos, Email, Contraseña) 
//             VALUES ( :Nombres, :Apellidos, :Email, :Contraseña)";
//    $stmt = $conn->prepare($sql);
//    $stmt->bindParam(':Nombres', $_POST['Nombres']);
//    $stmt->bindParam(':Apellidos', $_POST['Apellidos']);
//    $stmt->bindParam(':Email', $_POST['Email']);
//    $Password = password_hash($_POST['Password'], PASSWORD_BCRYPT);
//    $stmt->bindParam(':Password', $Password);

//    if ($stmt->execute()) {
//      $message = 'Successfully created new user';
//    } else {
//      $message = 'Sorry there must have been an issue creating your account';
//    }
// }

Class Registrar
{
    public function __construct()
    {

    }

    public function insertar($Nombres, $Apellidos, $Email, $Contraseña)
    {
        $sql = "INSERT INTO usuario (Nombres, Apellidos, Email, Contraseña)
        VALUES ('$Nombres', '$Apellidos' , '$Email', '$Contraseña')";
        return ejecutarConsulta($sql);
    }
}

?>