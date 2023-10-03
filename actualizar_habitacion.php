<?php
include 'conexion.php';

if (isset($_GET["id"])) {
    // Recupera el ID de la habitación de la URL
    $id = $_GET["id"];
    
    // Realiza una consulta para obtener los datos del usuario
    $sql = "SELECT * FROM habitacion WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Datos de la habitacion encontrados, recuperarlos
        $row = $result->fetch_assoc();
        $nombre = $row["nombre"];
        $tipo = $row["tipo"];
        $camas = $row["camas"];
        $estado = $row["estado"];
    } else {
        // Habitacion no encontrada o múltiples registros encontrados (error)
        echo "No se pudo encontrar la habitación.";
    }
} else {
    // No se proporcionó un ID válido en la URL
    echo "ID de habitación no válido.";
}

// Aquí puedes mostrar un formulario HTML para que el usuario modifique los datos
?>

<h2>Editar Habitacion</h2>
<form action="procesar_actualizacion_H.php" method="post">
    <!-- Campos del formulario con valores prellenados -->
    <input type="hidden" name="id" value="<?php echo $id; ?>"><br>
    Nombre: <input type="text" name="nombre" value="<?php echo $nombre; ?>" required><br>
    Tipo: <input type="text" name="tipo" value="<?php echo $tipo; ?>" required><br>
    Camas: <input type="number" name="camas" value="<?php echo $camas; ?>" required><br>
    1) Libre <input type="radio" name="estado" value="1" <?php if ($estado === "1") echo "checked"; ?>>
    2) Ocupada <input type="radio" name="estado" value="2" <?php if ($estado === "2") echo "checked"; ?>>
    <input type="submit">
</form>
