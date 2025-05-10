<?php
include "bd/db.php";
if (!isset($_SESSION['usuario_id'])) header("Location: login.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $stmt = $conn->prepare("INSERT INTO tareas (id_usuario, titulo, descripcion) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $_SESSION['usuario_id'], $titulo, $descripcion);
    $stmt->execute();
    header("Location: dashboard.php");
}
?>
<link rel="stylesheet" href="css/estilos.css">
<?php include "header.php"; ?>
<div class="form-container">
    <h2>Nueva tarea</h2>
    <form method="POST">
        <input name="titulo" placeholder="Título" required>
        <textarea name="descripcion" placeholder="Descripción" required></textarea>
        <button type="submit">Guardar tarea</button>
    </form>
</div>