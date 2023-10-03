<?php
include 'conexion.php';
$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

echo '<h2>Leer Usuarios</h2>';

if ($result->num_rows > 0) {
    echo '<table style="width:100%; border-collapse: collapse; text-align: left;">';
    echo '<thead style="background-color: #f2f2f2;">';
    echo '<tr><th style="padding: 10px;">ID</th><th style="padding: 10px;">Nombre</th><th style="padding: 10px;">Apellido</th><th style="padding: 10px;">Email</th><th style="padding: 10px;">Telefono</th><th style="padding: 10px;">Tipo</th></tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td style="padding: 10px; border-bottom: 1px solid #ddd;">' . $row["user_ID"] . '</td>';
        echo '<td style="padding: 10px; border-bottom: 1px solid #ddd;">' . $row["nombre"] . '</td>';
        echo '<td style="padding: 10px; border-bottom: 1px solid #ddd;">' . $row["apellido"] . '</td>';
        echo '<td style="padding: 10px; border-bottom: 1px solid #ddd;">' . $row["email"] . '</td>';
        echo '<td style="padding: 10px; border-bottom: 1px solid #ddd;">' . $row["telefono"] . '</td>';
        echo '<td style="padding: 10px; border-bottom: 1px solid #ddd;">' . $row["type"] . '</td>';
        echo '<td style="padding: 10px; border-bottom: 1px solid #ddd;"><a href="actualizar_usuario.php?id=' . $row["user_ID"] . '">Editar</a></td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo "No se encontraron usuarios.";
}

?>
