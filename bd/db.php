<?php
$conn = new mysqli("localhost", "root", "", "gestor_tareas");
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
session_start();
?>