<?php
$titulo = 'Bucles';
require __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/menu.php';

$frutas = ['Manzana', 'Mango', 'Plátano', 'Uva'];
$productos = [
    ['nombre' => 'Cuaderno', 'precio' => 35.50, 'cantidad' => 4],
    ['nombre' => 'Lápiz',    'precio' => 8.00,  'cantidad' => 10],
    ['nombre' => 'Mochila',  'precio' => 420.0, 'cantidad' => 1],
];
?>
<h2>Bucles (ciclos)</h2>
<p>Sirven para <strong>repetir</strong> instrucciones sin escribirlas varias veces. Se usan para recorrer listas, generar tablas y hacer cálculos repetitivos.</p>

<div class="tarjeta">
    <h3>for: tabla de multiplicar del 7 (se conoce el número de repeticiones)</h3>
    <ul>
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <li>7 × <?= $i ?> = <?= 7 * $i ?></li>
        <?php endfor; ?>
    </ul>
</div>

<div class="tarjeta">
    <h3>while: se repite mientras la condición sea verdadera</h3>
    <?php
    $contador = 5;
    $suma = 0;
    while ($contador > 0) {
        echo "<p>Cuenta regresiva: $contador</p>";
        $suma += $contador;
        $contador--;
    }
    echo "<p><strong>Suma de los valores: $suma</strong></p>";
    ?>
</div>

<div class="tarjeta">
    <h3>foreach: recorre un arreglo de frutas (<?= count($frutas) ?> elementos)</h3>
    <ol>
        <?php foreach ($frutas as $fruta): ?>
            <li><?= $fruta ?></li>
        <?php endforeach; ?>
    </ol>
</div>

<div class="tarjeta">
    <h3>Tabla dinámica con foreach</h3>
    <table>
        <tr><th>Producto</th><th>Precio</th><th>Cantidad</th><th>Subtotal</th></tr>
        <?php $total = 0; foreach ($productos as $p):
            $subtotal = $p['precio'] * $p['cantidad'];
            $total += $subtotal; ?>
        <tr>
            <td><?= $p['nombre'] ?></td>
            <td>$<?= number_format($p['precio'], 2) ?></td>
            <td><?= $p['cantidad'] ?></td>
            <td>$<?= number_format($subtotal, 2) ?></td>
        </tr>
        <?php endforeach; ?>
        <tr><th colspan="3">Total</th><th>$<?= number_format($total, 2) ?></th></tr>
    </table>
</div>
<?php require __DIR__ . '/../includes/footer.php'; ?>
