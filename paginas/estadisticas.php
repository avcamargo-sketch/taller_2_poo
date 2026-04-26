<?php
require_once(__DIR__ . "/../clases/estadisticas.php");

$resultadoProm = "";
$resultadoMedia = "";
$resultadoModa = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $input = $_POST["numeros"];
    $array = array_map('intval', explode(",", $input));

    $obj = new Estadisticas();

    $resultadoProm = $obj->promedio($array);
    $resultadoMedia = $obj->media($array);
    $resultadoModa = $obj->moda($array);
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../css/style.css">
    <title>Estadísticas</title>
</head>

<body>
<div class="contenedor">
    <h2>Promedio, Media y Moda</h2>

    <form method="POST">
        <input type="text" name="numeros" placeholder="Ej: 1,2,2,3,4" required>
        <button type="submit">Calcular</button>
    </form>

    <?php if ($resultadoProm !== ""): ?>
        <h3>Promedio:</h3>
        <p><?= $resultadoProm ?></p>

        <h3>Media:</h3>
        <p><?= $resultadoMedia ?></p>

        <h3>Moda:</h3>
        <p><?= $resultadoModa ?></p>
    <?php endif; ?>

    <br>
    <a href="../index.php">Volver</a>
</div>
</body>

</html>