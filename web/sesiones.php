<?php
$titulo = 'Sesiones';
require __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/menu.php';

// Contador que persiste entre páginas mientras dure la sesión
$_SESSION['visitas_sesiones'] = ($_SESSION['visitas_sesiones'] ?? 0) + 1;

// Elementos agregados con enlaces
if (isset($_GET['agregar'])) {
    $_SESSION['lista'][] = htmlspecialchars($_GET['agregar']);
    header('Location: ../web/sesiones.php');
    exit;
}
$lista = $_SESSION['lista'] ?? [];
?>
<h2>Manejo de sesiones</h2>
<p>HTTP no recuerda nada entre una petición y otra. Una <strong>sesión</strong> guarda datos <strong>en memoria del servidor</strong>, asociados a un identificador (cookie <code>PHPSESSID</code>) de cada visitante. Sirve para recordar al usuario, su carrito, sus preferencias o cuánto tiempo lleva conectado.</p>

<div class="tarjeta">
    <h3>Funciones clave</h3>
    <ul>
        <li><code>session_start()</code>: abre o reanuda la sesión (antes de cualquier salida HTML).</li>
        <li><code>$_SESSION['clave'] = valor</code>: guarda datos.</li>
        <li><code>time()</code>: marca de tiempo actual (se usó para la hora de inicio).</li>
        <li><code>session_destroy()</code>: elimina los datos de la sesión (botón "Reiniciar sesión").</li>
    </ul>
</div>

<div class="tarjeta">
    <h3>Datos de tu sesión actual</h3>
    <ul>
        <li>ID de sesión: <code><?= session_id() ?></code></li>
        <li>Valor de <code>$_SESSION['inicio']</code> (timestamp): <?= $_SESSION['inicio'] ?></li>
        <li>Veces que cargaste esta página en esta sesión: <strong><?= $_SESSION['visitas_sesiones'] ?></strong></li>
    </ul>
</div>

<div class="tarjeta">
    <h3>Guardar datos en la sesión (con enlaces)</h3>
    <p>
        <a class="btn" href="sesiones.php?agregar=Manzana">Agregar Manzana</a>
        <a class="btn" href="sesiones.php?agregar=Pera">Agregar Pera</a>
        <a class="btn" href="sesiones.php?agregar=Uva">Agregar Uva</a>
    </p>
    <?php if (count($lista) > 0): ?>
        <ul><?php foreach ($lista as $item): ?><li><?= $item ?></li><?php endforeach; ?></ul>
        <p>Cambia de página y regresa: la lista sigue ahí.</p>
    <?php else: ?>
        <p>Aún no has agregado nada.</p>
    <?php endif; ?>
</div>

<div class="tarjeta">
    <h3>Historial de páginas visitadas (guardado en <code>$_SESSION</code>)</h3>
    <table>
        <tr><th>#</th><th>Página</th><th>Hora</th></tr>
        <?php foreach ($_SESSION['historial'] as $i => $h): ?>
        <tr><td><?= $i + 1 ?></td><td><?= $h['pagina'] ?></td><td><?= $h['hora'] ?></td></tr>
        <?php endforeach; ?>
    </table>
</div>

<div class="tarjeta">
    <h3>Contenido completo de $_SESSION</h3>
    <pre><?php print_r($_SESSION); ?></pre>
</div>
<?php require __DIR__ . '/../includes/footer.php'; ?>
