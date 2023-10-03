<?php
include 'conexion.php';
$sql = "SELECT * FROM habitacion";
$result = $conn->query($sql);

echo '<h2>Ver Habitaciones</h2>';

if ($result->num_rows > 0) {
    echo '<table style="width:100%; border-collapse: collapse; text-align: left;">';
    echo '<thead style="background-color: #f2f2f2;">';
    echo '<tr><th style="padding: 10px;">ID</th><th style="padding: 10px;">Nombre</th>
            <th style="padding: 10px;">Tipo</th><th style="padding: 10px;">Camas</th>
            <th style="padding: 10px;">Estado</th></tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td style="padding: 10px; border-bottom: 1px solid #ddd;">' . $row["id"] . '</td>';
        echo '<td style="padding: 10px; border-bottom: 1px solid #ddd;">' . $row["nombre"] . '</td>';
        echo '<td style="padding: 10px; border-bottom: 1px solid #ddd;">' . $row["tipo"] . '</td>';
        echo '<td style="padding: 10px; border-bottom: 1px solid #ddd;">' . $row["camas"] . '</td>';
        echo '<td style="padding: 10px; border-bottom: 1px solid #ddd;">' . $row["estado"] . '</td>';
        echo '<td style="padding: 10px; border-bottom: 1px solid #ddd;"><a href="actualizar_habitacion.php?id=' . $row["id"] . '">Editar</a></td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo "No se encontraron habitaciones.";
}

?>
