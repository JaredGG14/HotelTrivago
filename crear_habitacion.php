<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $tipo = $_POST["tipo"];
    $camas = $_POST["camas"];
    $estado = $_POST["estado"];

    $sql = "INSERT INTO habitacion (nombre, tipo, camas, estado) VALUES ('$nombre', '$tipo', '$camas', '$estado')";

    if ($conn->query($sql) === TRUE) {
        echo "Habitación creada correctamente.";
    } else {
        echo "Error al crear la habitación: " . $conn->error;
    }
}
?>