<?php
function getDatos()
{
    // Conectar a la base de datos
    $conn = new mysqli('localhost', 'u461106059_deloryum','362514CJt', 'u461106059_falundafa_db');

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Consulta para obtener los datos
    $sql = "SELECT * FROM eventos";

    $result = $conn->query($sql);

    // Obtener los datos como un array asociativo
    $data = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    $conn->close();

    // Devolver los datos en formato JSON
    return $data;
}

?>