<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Editar Coche</h1>
    <form action="" method="post">
        <input type="hidden" name="action_method" value="actualizar">
        
        <label>Marca:</label>
        <input type="text" name="marca" value="<?= htmlspecialchars($coche->getMarca()) ?>" required></input>

        <label>Modelo:</label>
        <input type="text" name="modelo" value="<?= htmlspecialchars($coche->getModelo()) ?>" required></input>

        <label>Color:</label>
        <input type="text" name="color" value="<?= htmlspecialchars($coche->getColor()) ?>" required></input>

        <label>Propietario:</label>
        <input type="text" name="popietario" value="<?= htmlspecialchars($coche->getPropietario()) ?>" required></input>

        <label>Precio:</label>
        <input type="number" name="precio" value="<?= htmlspecialchars($coche->getPrecio()) ?>" required></input>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>