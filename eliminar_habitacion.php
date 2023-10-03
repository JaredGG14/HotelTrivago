<?php
include 'conexion.php';  // Asegúrate de incluir tu archivo de conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id_habitacion = $_GET["id"];

    // SQL para eliminar la habitación con el ID proporcionado
    $sql = "DELETE FROM habitacion WHERE id = $id_habitacion";

    if ($conn->query($sql) === TRUE) {
        echo "Habitación eliminada correctamente.";
    } else {
        echo "Error al eliminar la habitación: " . $conn->error;
    }
}
?>
