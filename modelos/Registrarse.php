<?php
 include("../config/Conexion.php");

 $message = '';

 if (!empty($_POST['email']) && !empty($_POST['password'])) {
   $sql = "INSERT INTO usuario (IdCiudad, Tipo,Nombres, Apellidos, Documento, Telefono, Direccion, Email, Contraseña, Fecha, Estado) 
            VALUES (:IdCiudad, :Tipo, :Nombres, :Apellidos, :Documento, :Telefono, :Direccion, :Email, :Contraseña)";
   $stmt = $conn->prepare($sql);
   $stmt->bindParam(':IdCiudad', $_POST['IdCiudad']);
   $stmt->bindParam(':Tipo', $_POST['Tipo']);
   $stmt->bindParam(':Nombre', $_POST['Nombres']);
   $stmt->bindParam(':Apellidos', $_POST['Apellidos']);
   $stmt->bindParam(':Documento', $_POST['Documento']);
   $stmt->bindParam(':Telefono', $_POST['Telefono']);
   $stmt->bindParam(':Direccion', $_POST['Direccion']);
   $stmt->bindParam(':Email', $_POST['Email']);
   $Password = password_hash($_POST['Password'], PASSWORD_BCRYPT);
   $stmt->bindParam(':Password', $Password);

   if ($stmt->execute()) {
     $message = 'Successfully created new user';
   } else {
     $message = 'Sorry there must have been an issue creating your account';
   }
}

?>