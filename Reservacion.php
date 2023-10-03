<!DOCTYPE html>
<html>
<head>
    <title>Reservación de Habitación</title>
</head>
<body>
    <h1>Reservación de Habitación</h1>
    <form action="procesar_reserva.php" method="post">
        <label for="usuario_id">Seleccione un Usuario (Cliente)</label>
        <select id="usuario_id" name="usuario_id" required>
            <?php
                // Conexión a la base de datos y consulta de usuarios
                include 'conexion.php';
                $result = $conn->query("SELECT user_ID, nombre, apellido FROM usuarios WHERE type = '2'");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='".$row['user_ID']."'>".$row['nombre']." ".$row['apellido']."</option>";
                }
            ?>
        </select><br><br>

        <label for="fecha_entrada">Fecha de Entrada</label>
        <input type="date" id="fecha_entrada" name="fecha_entrada" required><br><br>

        <label for="fecha_salida">Fecha de Salida</label>
        <input type="date" id="fecha_salida" name="fecha_salida" required><br><br>

        <label for="tipo_habitacion">Tipo de Habitación</label>
        <select id="tipo_habitacion" name="tipo_habitacion" required>
    <?php
        include 'conexion.php';
        $result = $conn->query("SELECT id, tipo FROM habitacion WHERE estado = 1");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='".$row['tipo']."'>".$row['tipo']."</option>";
        }
    ?>
</select><br><br>


        <input type="submit" value="Reservar">
    </form>
</body>
</html>
