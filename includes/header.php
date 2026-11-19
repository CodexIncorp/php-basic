<?php
date_default_timezone_set('America/Mexico_City');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$esIndex      = $esIndex ?? false;
$raiz         = $esIndex ? '' : '../';
$titulo       = $titulo ?? 'Proyecto PHP';
$paginaActual = basename($_SERVER['PHP_SELF']);

// Sin sesión activa solo se puede ver index.php
if (!$esIndex && !isset($_SESSION['inicio'])) {
    header('Location:' . $raiz . 'index.php');
    exit;
}

// Guardamos en la sesión cada página visitada (se usa en sesiones.php)
if (!$esIndex) {
    $_SESSION['historial'][] = [
        'pagina' => $paginaActual,
        'hora'   => date('H:i:s'),
    ];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $titulo ?> | Fundamentos de PHP</title>
    <link rel="stylesheet" href="<?= $raiz ?>css/styles.css">
</head>
<body>
<header class="encabezado">
    <h1>Fundamentos de PHP</h1>
    <p>Variables · Condicionales · Bucles · Arreglos · Sesiones</p>
</header>
