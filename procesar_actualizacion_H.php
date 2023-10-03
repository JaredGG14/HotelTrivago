<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $tipo = $_POST["tipo"];
    $camas = $_POST["camas"];
    $estado = $_POST["estado"];

    $sql = "UPDATE habitacion SET nombre='$nombre', tipo='$tipo', camas='$camas', estado='$estado' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Habitación actualizada correctamente.";
    } else {
        echo "Error al actualizar la habitación: " . $conn->error;
    }
}
?>
