<?php
include "bd/db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($res->num_rows > 0) {
        $usuario = $res->fetch_assoc();
        if (password_verify($password, $usuario['password'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nombre'] = $usuario['nombre'];
            header("Location: dashboard.php");
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "Usuario no encontrado.";
    }
}
?>
<link rel="stylesheet" href="css/estilos.css">
<header class="main-header">
    <div class="logo">Mi Gestor</div>
    <nav>
        <a href="#">¿Quiénes somos?</a>
        <a href="login.php">Iniciar sesión</a>
    </nav>
</header>
<div class="form-container">
    <h2>Iniciar Sesión</h2>
    <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
    <form method="POST">
        <input name="email" type="email" placeholder="Correo" required>
        <input name="password" type="password" placeholder="Contraseña" required>
        <button type="submit">Entrar</button>
    </form>
    <div class="form-links">
        <a href="registro.php">¿No tienes cuenta? Regístrate</a><br>
        <a href="recuperar.php">¿Olvidaste tu contraseña?</a>
    </div>
</div>