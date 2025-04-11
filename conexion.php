<?php
$servidor = "localhost";
$usuario = "root";
$contrasena = "admin";
$bd = "chatterbox";

$conn = new mysqli($servidor, $usuario, $contrasena, $bd);

if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

?>
