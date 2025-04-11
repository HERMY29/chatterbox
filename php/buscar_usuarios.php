<?php
require_once '../conexion.php';

$busqueda = $_GET['q'] ?? '';

$sql = "SELECT id_Usuario, nombre, nom_usuario FROM Usuarios
        WHERE nombre LIKE ? OR nom_usuario LIKE ?";

$searchTerm = "%" . $busqueda . "%";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $searchTerm, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

$usuarios = [];

while ($row = $result->fetch_assoc()) {
    $usuarios[] = $row;
}

echo json_encode($usuarios);

$stmt->close();
$conn->close();
?>
