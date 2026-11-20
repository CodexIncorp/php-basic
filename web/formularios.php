<?php
$titulo = 'Formularios';
require __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/menu.php';

$nombre  = '';
$correo  = '';
$edad    = '';
$carrera = 'Sistemas';
$errores = [];
$enviado = false;

$carrerasPermitidas = ['Sistemas', 'Civil', 'Industrial', 'Electrónica'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre  = trim($_POST['nombre'] ?? '');
    $correo  = trim($_POST['correo'] ?? '');
    $edad    = trim($_POST['edad'] ?? '');
    $carrera = $_POST['carrera'] ?? '';

    if ($nombre === '' || mb_strlen($nombre, 'UTF-8') < 3) {
        $errores[] = 'El nombre es obligatorio y debe tener al menos 3 caracteres.';
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores[] = 'Ingresa un correo electrónico válido.';
    }

    $edadValida = filter_var($edad, FILTER_VALIDATE_INT, [
        'options' => ['min_range' => 15, 'max_range' => 99]
    ]);
    if ($edadValida === false) {
        $errores[] = 'La edad debe ser un número entero entre 15 y 99.';
    }

    if (!in_array($carrera, $carrerasPermitidas, true)) {
        $errores[] = 'Selecciona una carrera válida.';
    }

    if (count($errores) === 0) {
        $enviado = true;
    }
}
?>
<h2>Formularios y validación con <code>$_POST</code></h2>
<p>Los formularios envían datos del navegador al servidor. Con <code>POST</code> los datos viajan en el cuerpo de la petición HTTP y se leen desde la superglobal <code>$_POST</code>.</p>

<?php if (count($errores) > 0): ?>
<div class="tarjeta alerta-error">
    <h3>Corrige los siguientes errores:</h3>
    <ul>
        <?php foreach ($errores as $err): ?>
            <li><?= htmlspecialchars($err, ENT_QUOTES, 'UTF-8') ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>

<?php if ($enviado): ?>
<div class="tarjeta alerta-ok">
    <h3>Datos recibidos y validados correctamente</h3>
    <table>
        <tr><th>Campo</th><th>Valor</th></tr>
        <tr><td>Nombre</td><td><?= htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8') ?></td></tr>
        <tr><td>Correo</td><td><?= htmlspecialchars($correo, ENT_QUOTES, 'UTF-8') ?></td></tr>
        <tr><td>Edad</td><td><?= htmlspecialchars($edad, ENT_QUOTES, 'UTF-8') ?> años</td></tr>
        <tr><td>Carrera</td><td><?= htmlspecialchars($carrera, ENT_QUOTES, 'UTF-8') ?></td></tr>
    </table>
</div>
<?php endif; ?>

<div class="tarjeta">
    <h3>Registro de estudiante</h3>
    <form class="formulario" method="POST" action="formularios.php" novalidate>
        <div class="campo">
            <label for="nombre">Nombre completo</label>
            <input type="text" id="nombre" name="nombre"
                   value="<?= htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8') ?>"
                   placeholder="Ej. Ana López">
        </div>

        <div class="campo">
            <label for="correo">Correo electrónico</label>
            <input type="email" id="correo" name="correo"
                   value="<?= htmlspecialchars($correo, ENT_QUOTES, 'UTF-8') ?>"
                   placeholder="ana@ejemplo.com">
        </div>

        <div class="campo">
            <label for="edad">Edad</label>
            <input type="number" id="edad" name="edad"
                   value="<?= htmlspecialchars($edad, ENT_QUOTES, 'UTF-8') ?>"
                   placeholder="21">
        </div>

        <div class="campo">
            <label for="carrera">Carrera</label>
            <select id="carrera" name="carrera">
                <?php foreach ($carrerasPermitidas as $c): ?>
                    <option value="<?= $c ?>" <?= $carrera === $c ? 'selected' : '' ?>>
                        <?= $c ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn">Enviar datos</button>
    </form>
</div>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
<div class="tarjeta">
    <h3>Contenido crudo de <code>$_POST</code></h3>
    <pre><?= htmlspecialchars(print_r($_POST, true), ENT_QUOTES, 'UTF-8') ?></pre>
</div>
<?php endif; ?>

<?php require __DIR__ . '/../includes/footer.php'; ?>