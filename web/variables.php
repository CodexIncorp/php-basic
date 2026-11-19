<?php
$titulo = 'Variables';
require __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/menu.php';

$nombre   = "Ana López";
$edad     = 21;
$promedio = 9.35;
$aprobado = true;
$materias = ["PHP", "HTML", "CSS", "SQL"];
$nada     = null;

$ejemplos = [
    'string'  => $nombre,
    'int'     => $edad,
    'float'   => $promedio,
    'boolean' => $aprobado ? 'true' : 'false',
    'array'   => implode(', ', $materias),
    'null'    => 'null',
];
$variables = ['$nombre' => $nombre, '$edad' => $edad, '$promedio' => $promedio,
              '$aprobado' => $aprobado, '$materias' => $materias, '$nada' => $nada];
?>
<h2>Variables y tipos de datos</h2>
<p>Una variable es un espacio en memoria con nombre. En PHP se crea al asignarle un valor con <code>=</code>; no hace falta declarar su tipo, PHP lo deduce (tipado dinámico).</p>

<div class="tarjeta">
    <h3>Variables creadas y su tipo real (<code>gettype()</code>)</h3>
    <table>
        <tr><th>Variable</th><th>Valor mostrado con echo</th><th>Tipo</th></tr>
        <?php foreach ($variables as $nom => $valor): ?>
        <tr>
            <td><code><?= $nom ?></code></td>
            <td><?php
                if (is_array($valor))      echo implode(', ', $valor);
                elseif (is_bool($valor))   echo $valor ? 'true' : 'false';
                elseif (is_null($valor))   echo 'null';
                else                       echo $valor;
            ?></td>
            <td><?= gettype($valor) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<div class="tarjeta">
    <h3>Mostrar contenido con echo</h3>
    <?php
    echo "<p>Nombre: <strong>$nombre</strong> (interpolación con comillas dobles)</p>";
    echo '<p>Edad: ' . $edad . ' años (concatenación con punto)</p>';
    echo "<p>Promedio redondeado: " . round($promedio, 1) . "</p>";
    ?>
</div>

<div class="tarjeta">
    <h3>Funciones útiles</h3>
    <ul>
        <li><code>date('d/m/Y H:i:s')</code> → <?= date('d/m/Y H:i:s') ?></li>
        <li><code>count($materias)</code> → <?= count($materias) ?> materias</li>
        <li><code>strlen($nombre)</code> → <?= strlen($nombre) ?> caracteres</li>
        <li><code>strtoupper($nombre)</code> → <?= strtoupper($nombre) ?></li>
        <li><code>$edad + $promedio</code> → <?= $edad + $promedio ?> (PHP convierte int a float)</li>
        <li><code>isset($nada)</code> → <?= isset($nada) ? 'existe' : 'es null o no existe' ?></li>
    </ul>
</div>

<div class="tarjeta">
    <h3>var_dump()</h3>
    <pre><?php var_dump($nombre, $edad, $promedio, $aprobado); ?></pre>
</div>
<?php require __DIR__ . '/../includes/footer.php'; ?>
