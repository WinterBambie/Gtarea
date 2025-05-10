<?php
include "bd/db.php";
if (!isset($_SESSION['usuario_id'])) header("Location: login.php");
$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM tareas WHERE id = ? AND id_usuario = ?");
$stmt->bind_param("ii", $id, $_SESSION['usuario_id']);
$stmt->execute();
header("Location: dashboard.php");
?>