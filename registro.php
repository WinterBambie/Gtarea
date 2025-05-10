<?php
include "bd/db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $email, $password);
    if ($stmt->execute()) {
        header("Location: login.php");
    } else {
        $error = "Error al registrar.";
    }
}
?>
<link rel="stylesheet" href="css/estilos.css">
<div class="form-container">
    <h2>Registro</h2>
    <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
    <form method="POST">
        <input name="nombre" placeholder="Nombre" required>
        <input name="email" type="email" placeholder="Correo" required>
        <input name="password" type="password" placeholder="Contraseña" required>
        <button type="submit">Registrarse</button>
    </form>
    <div class="form-links">
        <a href="login.php">¿Ya tienes cuenta? Inicia sesión</a>
    </div>
</div>