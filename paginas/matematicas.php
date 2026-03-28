<?php
require_once("../clases/Matematicas.php");

$resultadoFibo = [];
$resultadoFact = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $numero = $_POST["numero"] ?? 0;

    if ($numero > 0) {
        $obj = new matematicas();

        $resultadoFibo = $obj->fibonacci($numero);
        $resultadoFact = $obj->factorial($numero);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Fibonacci y Factorial</title>
</head>

<body>

    <h2>Fibonacci y Factorial</h2>

    <form method="POST">
        <input type="number" name="numero" placeholder="Ingrese un número" required>
        <button type="submit">Calcular</button>
    </form>

    <?php if (!empty($resultadoFibo)): ?>
        <h3>Fibonacci:</h3>
        <p><?= implode(", ", $resultadoFibo) ?></p>

        <h3>Factorial:</h3>
        <p><?= $resultadoFact ?></p>
    <?php endif; ?>

    <br>
    <a href="../index.php">Volver</a>

</body>

</html>