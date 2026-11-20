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
    <?php foreach ($paginas as $archivo => $texto):
        $bloqueado = (!$haySesion && $archivo !== 'index.php');
        $clases = trim(
            (($archivo === $paginaActual) ? 'activo ' : '') .
            ($bloqueado ? 'sin-sesion' : '')
        );
    ?>
        <a href="<?= $base . ($archivo === 'index.php' ? '' : '/web') . '/' . $archivo ?>"
           class="<?= $clases ?>"
           <?= $bloqueado ? 'title="Inicia sesión para acceder"' : '' ?>>
            <?= $texto ?>
        </a>
    <?php endforeach; ?>
</nav>

<main class="contenido">
<?php if (!$haySesion && !empty($avisoLogin)): ?>
    <div class="aviso">
        <strong>Sesión requerida:</strong> <?= htmlspecialchars($avisoLogin, ENT_QUOTES, 'UTF-8') ?>
    </div>
<?php endif; ?>