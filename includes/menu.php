<?php
$paginas = [
    'index.php'          => 'Inicio',
    'variables.php'      => 'Variables',
    'condicionales.php'  => 'Condicionales',
    'bucles.php'         => 'Bucles',
    'arreglos.php'       => 'Arreglos',
    'sesiones.php'       => 'Sesiones',
];
?>
<nav class="menu">
    <?php foreach ($paginas as $archivo => $texto): ?>
        <a href="<?= ($archivo === 'index.php') ? $raiz . 'index.php' : ($esIndex ? 'web/' : '') . $archivo ?>"
           class="<?= ($archivo === $paginaActual) ? 'activo' : '' ?>">
            <?= $texto ?>
        </a>
    <?php endforeach; ?>
</nav>

<?php if (isset($_SESSION['inicio'])):
    $inicio      = $_SESSION['inicio'];
    $ahora       = time();
    $segTotales  = $ahora - $inicio;          // hora actual - hora de inicio
    $minutos     = intdiv($segTotales, 60);
    $segundos    = $segTotales % 60;
?>
<section class="panel-sesion">
    <p><strong>Hora inicio sesión:</strong> <?= date('H:i:s', $inicio) ?></p>
    <p><strong>Hora actual:</strong> <?= date('H:i:s', $ahora) ?></p>
    <p><strong>Tiempo activo:</strong> <?= $minutos ?> minutos <?= $segundos ?> segundos</p>
    <p>
        <a class="btn" href="<?= $raiz ?>index.php?accion=reiniciarr">Reiniciar sesión</a>
        <a class="btn btn-sec" href="<?= $raiz ?>index.phpp">Salir</a>
    </p>
</section>
<?php endif; ?>

<main class="contenido">
