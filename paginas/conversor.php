<?php
require_once("../clases/Conversor.php");

$binario = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = intval($_POST["numero"] ?? 0);
    $obj = new Convertidor();
    $binario = $obj->aBinario($numero);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Ejercicio 5 - Binario</title>
    
</head>
<body>
<h2>Convertir número a binario</h2>

<form method="post">
    Número: <input type="number" name="numero" required>
    <button type="submit">Convertir</button>
</form>

<?php if($binario !== ""): ?>
    <p>Binario: <?= $binario ?></p>
<?php endif; ?>

<br><a href="../index.php">Volver</a>
</body>
</html>