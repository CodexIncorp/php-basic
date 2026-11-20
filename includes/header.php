<?php
// includes/header.php: se incluye al inicio de TODAS las páginas
date_default_timezone_set('America/Mexico_City');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$esIndex      = $esIndex ?? false;
$titulo       = $titulo ?? 'Proyecto PHP';
$paginaActual = basename($_SERVER['PHP_SELF']);

// Ruta base del sitio: '' en la raíz, o '/subcarpeta' si el proyecto está dentro de una
$base = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
if (basename($base) === 'web') {
    $base = dirname($base);
}
$base = rtrim(str_replace('\\', '/', $base), '/');

// Sin sesión activa solo se puede ver index.php
if (!$esIndex && !isset($_SESSION['inicio'])) {
    header('Location: ' . $base . '/index.php');
    exit;
}

// Historial de páginas visitadas (se muestra en sesiones.php)
if (!$esIndex) {
    $_SESSION['historial'][] = [
        'pagina' => $paginaActual,
        'hora'   => date('H:i:s'),
    ];
}

// Cálculo del tiempo de sesión
$haySesion = isset($_SESSION['inicio']);
if ($haySesion) {
    $inicio     = $_SESSION['inicio'];
    $ahora      = time();
    $segTotales = $ahora - $inicio;          // hora actual - hora de inicio
    $minutos    = intdiv($segTotales, 60);
    $segundos   = $segTotales % 60;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $titulo ?> | Fundamentos de PHP</title>
    <link rel="stylesheet" href="<?= $base ?>/css/styles.css">
</head>
<body>
<header class="encabezado">
    <div class="titulo">
        <h1>Fundamentos de PHP</h1>
    </div>

    <?php if ($haySesion): ?>
    <div class="sesion">
        <div class="sesion-datos">
            <p>Hora inicio sesión: <strong><?= date('H:i:s', $inicio) ?></strong></p>
            <p>Hora actual: <strong><?= date('H:i:s', $ahora) ?></strong></p>
            <p>Tiempo activo: <strong><?= $minutos ?> minutos <?= $segundos ?> segundos</strong></p>
        </div>
        <div class="sesion-acciones">
            <a class="btn-mini" href="<?= $base ?>/index.php?accion=reiniciar">⟳ Reiniciar</a>
            <a class="btn-mini btn-salir" href="<?= $base ?>/index.php?accion=salir">Salir</a>
        </div>
    </div>
    <?php endif; ?>
</header>
