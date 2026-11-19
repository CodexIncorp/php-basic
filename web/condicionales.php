<?php
$titulo = 'Condicionales';
require __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/menu.php';

$calificacion = 85;
$hora = (int) date('G');          // 0 a 23
$diaNumero = (int) date('N');     // 1 (lunes) a 7 (domingo)
$alumnos = ['Ana' => 95, 'Luis' => 72, 'Marta' => 55];
?>
<h2>Estructuras condicionales</h2>
<p>Permiten que el programa <strong>tome decisiones</strong>: ejecuta un bloque u otro según si una condición es verdadera o falsa.</p>

<div class="tarjeta">
    <h3>if / elseif / else con una variable</h3>
    <p>Calificación evaluada: <strong><?= $calificacion ?></strong></p>
    <?php
    if ($calificacion >= 90) {
        echo "<p class='ok'>Excelente</p>";
    } elseif ($calificacion >= 70) {
        echo "<p class='ok'>Aprobado</p>";
    } else {
        echo "<p class='mal'>Reprobado</p>";
    }
    ?>
</div>

<div class="tarjeta">
    <h3>if / elseif / else con la hora real del servidor</h3>
    <p>Hora actual: <strong><?= date('H:i') ?></strong></p>
    <?php
    if ($hora < 12)      echo "<p>Buenos días</p>";
    elseif ($hora < 19)  echo "<p>Buenas tardes</p>";
    else                 echo "<p>Buenas noches</p>";
    ?>
</div>

<div class="tarjeta">
    <h3>switch con el día de la semana</h3>
    <?php
    switch ($diaNumero) {
        case 1: $dia = 'Lunes'; break;
        case 2: $dia = 'Martes'; break;
        case 3: $dia = 'Miércoles'; break;
        case 4: $dia = 'Jueves'; break;
        case 5: $dia = 'Viernes'; break;
        case 6: $dia = 'Sábado'; break;
        default: $dia = 'Domingo';
    }
    echo "<p>Hoy es <strong>$dia</strong>.</p>";

    switch ($diaNumero) {
        case 6:
        case 7:
            echo "<p>Es fin de semana.</p>";
            break;
        default:
            echo "<p>Es día laborable.</p>";
    }
    ?>
</div>

<div class="tarjeta">
    <h3>Condicionales evaluando un arreglo</h3>
    <table>
        <tr><th>Alumno</th><th>Nota</th><th>Resultado</th></tr>
        <?php foreach ($alumnos as $nombre => $nota): ?>
        <tr>
            <td><?= $nombre ?></td>
            <td><?= $nota ?></td>
            <td><?php
                if ($nota >= 90)      echo 'Sobresaliente';
                elseif ($nota >= 60)  echo 'Aprobado';
                else                  echo 'Reprobado';
            ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <p>Operador ternario: Luis <?= $alumnos['Luis'] >= 60 ? 'aprobó' : 'reprobó' ?>.</p>
</div>
<?php require __DIR__ . '/../includes/footer.php'; ?>
