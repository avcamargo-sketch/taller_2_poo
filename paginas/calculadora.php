<?php
require_once("../clases/Calculadora.php");

$calc = new Calculadora();
$resultado = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['borrar'])) {
        $calc->borrarHistorial();
    } else {
        $num1 = floatval($_POST['num1']);
        $num2 = floatval($_POST['num2']);
        $op = $_POST['oper'];
        $resultado = $calc->operar($num1, $op, $num2);
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <title>Ejercicio 7 - Calculadora</title>
</head>

<body>
    <div class="contenedor">
    <h2>Calculadora</h2>

    <form method="post">
        Número 1: <input type="number" step="any" name="num1" required><br><br>
        Operación:
        <select name="oper">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
            <option value="%">%</option>
        </select><br><br>
        Número 2: <input type="number" step="any" name="num2" required><br><br>
        <button type="submit">Calcular</button>
        <button type="submit" name="borrar">Borrar Historial</button>
    </form>

    <?php if ($resultado !== null): ?>
        <p>Resultado: <?= $resultado ?></p>
    <?php endif; ?>

    <h3>Historial:</h3>
    <ul>
        <?php foreach ($calc->getHistorial() as $h): ?>
            <li><?= $h ?></li>
        <?php endforeach; ?>
    </ul>

    <br><a href="../index.php">Volver</a>
    </div>
</body>

</html>