<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "Select * from formulario";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["nombre"] . "</td>
                <td>" . $row["fecha"] . "</td>
                <td>" . $row["contenido"] . "</td>
                <td><img src='" . $row["foto"] . "'></td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='3'>No se encontraron datos.</td></tr>";
}
$conn->close();
?>
</table>
</body>
</html>
