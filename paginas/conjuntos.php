<?php
require_once("../clases/Conjuntos.php");

$resultado = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = array_map('intval', explode(',', $_POST['a']));
    $b = array_map('intval', explode(',', $_POST['b']));

    $conjuntoA = new Conjunto($a);
    $conjuntoB = new Conjunto($b);

    $resultado['union'] = $conjuntoA->union($conjuntoB);
    $resultado['interseccion'] = $conjuntoA->interseccion($conjuntoB);
    $resultado['A-B'] = $conjuntoA->diferencia($conjuntoB);
    $resultado['B-A'] = $conjuntoB->diferencia($conjuntoA);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <title>Ejercicio 4 - Conjuntos</title>
</head>

<body>
    <div class="contenedor">
    <h2>Operaciones entre conjuntos</h2>

    <form method="post">
        Conjunto A (separado por comas): <input type="text" name="a" required><br><br>
        Conjunto B (separado por comas): <input type="text" name="b" required><br><br>
        <button type="submit">Calcular</button>
    </form>

    <?php if (!empty($resultado)): ?>
        <h3>Resultados:</h3>
        <p><strong>Unión:</strong> <?= implode(", ", $resultado['union']) ?></p>
        <p><strong>Intersección:</strong> <?= implode(", ", $resultado['interseccion']) ?></p>
        <p><strong>A-B:</strong> <?= implode(", ", $resultado['A-B']) ?></p>
        <p><strong>B-A:</strong> <?= implode(", ", $resultado['B-A']) ?></p>
    <?php endif; ?>

    <br><a href="../index.php">Volver</a>
    </div>
</body>

</html>