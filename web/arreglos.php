<?php
$titulo = 'Arreglos';
require __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/menu.php';

$colores = ['Rojo', 'Verde', 'Azul', 'Amarillo'];

$persona = ['nombre' => 'Carlos', 'edad' => 28, 'ciudad' => 'Tuxtla Gutiérrez', 'activo' => true];

$estudiantes = [
    ['nombre' => 'Ana',   'carrera' => 'Sistemas', 'promedio' => 9.4],
    ['nombre' => 'Luis',  'carrera' => 'Civil',    'promedio' => 7.1],
    ['nombre' => 'Marta', 'carrera' => 'Sistemas', 'promedio' => 5.8],
];

$colores[] = 'Negro';             // agrega al final
sort($colores);                   // ordena alfabéticamente
?>
<h2>Arreglos (arrays)</h2>
<p>Un arreglo guarda <strong>varios valores en una sola variable</strong>. Es la base para manejar listas, registros y datos de tablas.</p>

<div class="tarjeta">
    <h3>1. Indexado</h3>
    <p>Total: <?= count($colores) ?> colores. Primero: <?= $colores[0] ?>.
       ¿Existe "Azul"? <?= in_array('Azul', $colores) ? 'Sí' : 'No' ?></p>
    <ul>
        <?php foreach ($colores as $indice => $color): ?>
            <li>[<?= $indice ?>] <?= $color ?><?= ($color === 'Azul') ? ' ← encontrado con if' : '' ?></li>
        <?php endforeach; ?>
    </ul>
</div>

<div class="tarjeta">
    <h3>2. Asociativo</h3>
    <table>
        <tr><th>Clave</th><th>Valor</th></tr>
        <?php foreach ($persona as $clave => $valor): ?>
        <tr>
            <td><?= $clave ?></td>
            <td><?= is_bool($valor) ? ($valor ? 'Sí' : 'No') : $valor ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <p>Acceso directo: <code>$persona['ciudad']</code> → <?= $persona['ciudad'] ?></p>
</div>

<div class="tarjeta">
    <h3>3. Multidimensional con condicionales</h3>
    <table>
        <tr><th>Nombre</th><th>Carrera</th><th>Promedio</th><th>Estado</th></tr>
        <?php $suma = 0; foreach ($estudiantes as $e): $suma += $e['promedio']; ?>
        <tr class="<?= $e['promedio'] >= 6 ? 'fila-ok' : 'fila-mal' ?>">
            <td><?= $e['nombre'] ?></td>
            <td><?= $e['carrera'] ?></td>
            <td><?= $e['promedio'] ?></td>
            <td><?php
                if ($e['promedio'] >= 9)      echo 'Excelente';
                elseif ($e['promedio'] >= 6)  echo 'Aprobado';
                else                          echo 'Reprobado';
            ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <p>Promedio general: <strong><?= round($suma / count($estudiantes), 2) ?></strong></p>
</div>

<div class="tarjeta">
    <h3>Funciones de arreglos usadas</h3>
    <ul>
        <li><code>count()</code>, <code>in_array()</code>, <code>sort()</code>, <code>$arr[] = valor</code></li>
        <li><code>array_keys($persona)</code> → <?= implode(', ', array_keys($persona)) ?></li>
        <li><code>array_column($estudiantes, 'nombre')</code> → <?= implode(', ', array_column($estudiantes, 'nombre')) ?></li>
    </ul>
</div>
<?php require __DIR__ . '/../includes/footer.php'; ?>
