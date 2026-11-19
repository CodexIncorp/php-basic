<?php
$esIndex = true;
$titulo  = 'Inicio';
session_start();

$accion  = $_GET['accion'] ?? '';
$mensaje = '';

// Iniciar sesión: guarda la hora de inicio con time()
if ($accion === 'iniciar') {
    $_SESSION = [];
    session_regenerate_id(true);
    $_SESSION['inicio'] = time();
    header('Location: web/variables.php');
    exit;
}

// Reiniciar: destruye la sesión y crea una nueva hora inicial
if ($accion === 'reiniciar') {
    $_SESSION = [];
    session_destroy();          // destruye la sesión actual
    session_start();            // abre una nueva
    session_regenerate_id(true);
    $_SESSION['inicio'] = time();
    header('Location: web/sesiones.php');
    exit;
}

// Si se entra al index con una sesión existente, se destruye
if (isset($_SESSION['inicio'])) {
    $_SESSION = [];
    session_destroy();
    $mensaje = 'La sesión anterior fue destruida. Debes iniciar una nueva.';
}

require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/menu.php';
?>
<h2>Bienvenido</h2>
<p>Este sitio demuestra los fundamentos de PHP con ejemplos que se ejecutan en el servidor.</p>

<?php if ($mensaje !== ''): ?>
    <p class="aviso"><?= $mensaje ?></p>
<?php endif; ?>

<div class="tarjeta">
    <h3>¿Cómo funciona?</h3>
    <ol>
        <li>Pulsa <strong>Iniciar sesión</strong>: PHP guarda la hora con <code>time()</code> en <code>$_SESSION</code>.</li>
        <li>Navega por las páginas; arriba verás la hora de inicio, la hora actual y el tiempo activo.</li>
        <li>Al volver a esta página la sesión se destruye con <code>session_destroy()</code>.</li>
    </ol>
    <p><a class="btn" href="index.php?accion=iniciar">INICIAR SESIÓN</a></p>
</div>
<?php require __DIR__ . '/includes/footer.php'; ?>
