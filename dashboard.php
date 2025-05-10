<?php
include "bd/db.php";
if (!isset($_SESSION['usuario_id'])) header("Location: login.php");
$id_usuario = $_SESSION['usuario_id'];
$tareas = $conn->query("SELECT * FROM tareas WHERE id_usuario = $id_usuario ORDER BY fecha_creacion DESC");
?>
<link rel="stylesheet" href="css/estilos.css">
<?php include "header.php"; ?>
<div class="dashboard">
    <h2>Mis tareas</h2>
    <a class="btn-agregar" href="agregar_tarea.php">+ Nueva tarea</a>
    <ul class="lista-tareas">
    <?php while ($tarea = $tareas->fetch_assoc()): ?>
        <li>
            <strong><?= $tarea['titulo'] ?></strong>: <?= $tarea['descripcion'] ?>
            <div class="acciones">
                <a href="editar_tarea.php?id=<?= $tarea['id'] ?>">Editar</a>
                <a href="eliminar_tarea.php?id=<?= $tarea['id'] ?>">Eliminar</a>
            </div>
        </li>
    <?php endwhile; ?>
    </ul>
</div>