<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $passwd = $_POST["passwd"];
    $telefono = $_POST["telefono"];
    $tipo = $_POST["tipo"];

    $sql = "INSERT INTO usuarios (nombre, apellido, email, password, telefono, type) VALUES ('$nombre', '$apellido', '$email', '$passwd', $telefono, '$tipo')";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario creado correctamente.";
    } else {
        echo "Error al crear el usuario: " . $conn->error;
    }
}
?>