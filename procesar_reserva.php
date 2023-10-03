<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_id = $_POST["usuario_id"];
    $fecha_entrada = $_POST["fecha_entrada"];
    $fecha_salida = $_POST["fecha_salida"];
    $tipo_habitacion = $_POST["tipo_habitacion"];  // Cambiado a tipo_habitacion

    // Calcular el costo según el tipo de habitación y las noches
    $costo = 0;
    switch ($tipo_habitacion) {  // Usamos el tipo de habitación en lugar del id
        case 'basica':
            $costo = 100;
            break;
        case 'matrimonial':
            $costo = 350;
            break;
        case 'suite':
            $costo = 600;
            break;
    }

    // Calcular el número de noches
    $fecha_entrada_obj = new DateTime($fecha_entrada);
    $fecha_salida_obj = new DateTime($fecha_salida);
    $diferencia = $fecha_entrada_obj->diff($fecha_salida_obj);
    $noches = $diferencia->days;

    // Calcular el costo total
    $costo_total = $costo * $noches;

    // Insertar la reserva en la base de datos
    $sql = "INSERT INTO reservas (id_usuario, tipo_habitacion, fecha_entrada, fecha_salida, costo)
            VALUES ('$usuario_id', '$tipo_habitacion', '$fecha_entrada', '$fecha_salida', '$costo_total')";

    if ($conn->query($sql) === TRUE) {
        echo "Reserva creada correctamente. Costo total: $".$costo_total;
    } else {
        echo "Error al crear la reserva: " . $conn->error;
    }
}
?>
