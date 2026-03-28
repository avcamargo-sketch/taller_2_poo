<?php
require_once("../clases/arbolBinario.php");

$inordenSalida = [];
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $preorden = array_map('trim', explode(',', $_POST['preorden'] ?? ''));
    $inorden  = array_map('trim', explode(',', $_POST['inorden'] ?? ''));

    try {
        $arbol = new Arbol();
        $arbol->raiz = $arbol->construirDesdePreIn($preorden, $inorden);
        $inordenSalida = $arbol->imprimirInOrden($arbol->raiz);
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 6 - Árbol Binario</title>
</head>

<body>
    <h2>Construcción de Árbol Binario</h2>

    <form method="post">
        <label>Preorden (separado por comas):</label>
        <input type="text" name="preorden" placeholder="Ej: A,B,C,D" required><br><br>

        <label>Inorden (separado por comas):</label>
        <input type="text" name="inorden" placeholder="Ej: C,B,A,D" required><br><br>

        <button type="submit">Construir Árbol</button>
    </form>

    <?php if (!empty($error)): ?>
        <p style="color:red;"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>

    <?php if (!empty($inordenSalida)): ?>
        <h3>Inorden del árbol construido:</h3>
        <p><?= htmlspecialchars(implode(", ", $inordenSalida), ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>

    <br>
    <a href="../index.php">← Volver</a>
</body>

</html>