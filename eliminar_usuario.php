<?php
include 'conexion.php';  // Asegúrate de incluir tu archivo de conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id_usuario = $_GET["id"];

    // SQL para eliminar la habitación con el ID proporcionado
    $sql = "DELETE FROM usuarios WHERE user_ID = $id_usuario";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario eliminado correctamente.";
    } else {
        echo "Error al eliminar al usuario: " . $conn->error;
    }
}

?>
