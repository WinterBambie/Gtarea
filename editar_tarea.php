<?php
include "bd/db.php";
if (!isset($_SESSION['usuario_id'])) header("Location: login.php");
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM tareas WHERE id = ? AND id_usuario = ?");
$stmt->bind_param("ii", $id, $_SESSION['usuario_id']);
$stmt->execute();
$tarea = $stmt->get_result()->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $stmt = $conn->prepare("UPDATE tareas SET titulo = ?, descripcion = ? WHERE id = ? AND id_usuario = ?");
    $stmt->bind_param("ssii", $titulo, $descripcion, $id, $_SESSION['usuario_id']);
    $stmt->execute();
    header("Location: dashboard.php");
}
?>
<link rel="stylesheet" href="css/estilos.css">
<?php include "header.php"; ?>
<div class="form-container">
    <h2>Editar tarea</h2>
    <form method="POST">
        <input name="titulo" value="<?= $tarea['titulo'] ?>" required>
        <textarea name="descripcion" required><?= $tarea['descripcion'] ?></textarea>
        <button type="submit">Actualizar tarea</button>
    </form>
</div>