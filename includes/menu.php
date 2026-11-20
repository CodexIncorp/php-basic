<?php
// includes/menu.php: menú de navegación común
$paginas = [
    'index.php'          => 'Inicio',
    'variables.php'      => 'Variables',
    'condicionales.php'  => 'Condicionales',
    'bucles.php'         => 'Bucles',
    'arreglos.php'       => 'Arreglos',
    'formularios.php'    => 'Formularios',
    'sesiones.php'       => 'Sesiones',
];
?>
<nav class="menu">
    <?php foreach ($paginas as $archivo => $texto): ?>
        <a href="<?= $base . ($archivo === 'index.php' ? '' : '/web') . '/' . $archivo ?>"
           class="<?= ($archivo === $paginaActual) ? 'activo' : '' ?>">
            <?= $texto ?>
        </a>
    <?php endforeach; ?>
</nav>

<main class="contenido">
