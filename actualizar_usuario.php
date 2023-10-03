<?php
include 'conexion.php';

if (isset($_GET["id"])) {
    // Recupera el ID del usuario de la URL
    $id = $_GET["id"];
    
    // Realiza una consulta para obtener los datos del usuario
    $sql = "SELECT * FROM usuarios WHERE user_ID = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Datos del usuario encontrados, recuperarlos
        $row = $result->fetch_assoc();
        $nombre = $row["nombre"];
        $apellido = $row["apellido"];
        $email = $row["email"];
        $telefono = $row["telefono"];
        $password = $row["password"];
        $type = $row["type"];
    } else {
        // Usuario no encontrado o múltiples registros encontrados (error)
        echo "No se pudo encontrar el usuario.";
    }
} else {
    // No se proporcionó un ID válido en la URL
    echo "ID de usuario no válido.";
}

// Aquí puedes mostrar un formulario HTML para que el usuario modifique los datos
?>

<h2>Editar Usuario</h2>
<form action="procesar_actualizacion.php" method="post">
    <!-- Campos del formulario con valores prellenados -->
    <input type="hidden" name="id" value="<?php echo $id; ?>"><br>
    Nombre: <input type="text" name="nombre" value="<?php echo $nombre; ?>" required><br>
    Apellido: <input type="text" name="apellido" value="<?php echo $apellido; ?>" required><br>
    Email: <input type="email" name="email" value="<?php echo $email; ?>" required><br>
    Password: <input type="password" name="password" value="<?php echo $password ?>" required><br>
    Teléfono: <input type="text" name="telefono" value="<?php echo $telefono; ?>"><br>
    1) Personal <input type="radio" name="tipo" value="1" <?php if ($type === "1") echo "checked"; ?>>
    2) Cliente<input type="radio" name="tipo" value="2" <?php if ($type === "2") echo "checked"; ?>>
    <input type="submit">
</form>
