<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $telefono = $_POST["telefono"];
    $tipo = $_POST["tipo"];

    $sql = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', email='$email', type=$tipo, telefono=$telefono WHERE user_ID=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario actualizado correctamente.";
    } else {
        echo "Error al actualizar el usuario: " . $conn->error;
    }
}
?>
