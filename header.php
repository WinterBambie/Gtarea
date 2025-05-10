<?php if (isset($_SESSION['usuario_nombre'])): ?>
<header class="main-header">
    <div class="logo">Mi Gestor</div>
    <div class="welcome">Hola, <?= $_SESSION['usuario_nombre'] ?> | <a href="logout.php">Cerrar sesión</a></div>
</header>
<?php endif; ?>