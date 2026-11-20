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

// Salir: destruye la sesión (único modo de cerrarla además de Reiniciar)
if ($accion === 'salir') {
    $_SESSION = [];
    session_destroy();
    $mensaje = 'Sesión finalizada. Debes iniciar una nueva para navegar.';
}

// Entrar al index con una sesión activa NO la destruye: se puede volver a Inicio libremente
$sesionActiva = isset($_SESSION['inicio']);

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
        <li>Pulsa <strong>Salir</strong> para destruir la sesión con <code>session_destroy()</code>.</li>
    </ol>
    <p>
        <?php if ($sesionActiva): ?>
            <a class="btn" href="web/variables.php">CONTINUAR</a>
            <a class="btn" href="index.php?accion=reiniciar">REINICIAR SESIÓN</a>
        <?php else: ?>
            <a class="btn" href="index.php?accion=iniciar">INICIAR SESIÓN</a>
        <?php endif; ?>
    </p>
</div>
<?php require __DIR__ . '/includes/footer.php'; ?>
