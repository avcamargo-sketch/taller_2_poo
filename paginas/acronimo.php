<?php
require_once("../clases/acronimo.php");

$resultado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $frase = $_POST["frase"] ?? "";

    if (!empty($frase)) {
        $obj = new acronimo();
        $resultado = $obj->generar($frase);
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Acrónimo</title>
</head>

<body>

    <h2>Generar Acrónimo</h2>

    <form method="POST">
        <input type="text" name="frase" placeholder="Escribe una frase" required>
        <button type="submit">Generar</button>
    </form>

    <?php if ($resultado): ?>
        <h3>Resultado: <?= htmlspecialchars($resultado, ENT_QUOTES, 'UTF-8') ?></h3>
    <?php endif; ?>

    <br>
    <a href="../index.php">Volver al menú</a>

</body>

</html>