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
        
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?= htmlspecialchars($conductor->getNombre()) ?>" required></input>

        <label>Puntos:</label>
        <input type="number" name="puntos" value="<?= htmlspecialchars($conductor->getPuntos()) ?>" required></input>

        <label>Ciudad:</label>
        <input type="text" name="ciudad" value="<?= htmlspecialchars($conductor->getCiudad()) ?>" required></input>

        <label>Multas:</label>
        <input type="number" name="multas" value="<?= htmlspecialchars($conductor->getMultas()) ?>" required></input>

        <label>Estado:</label>
        <input type="text" name="estado" value="<?= htmlspecialchars($conductor->getEstado()) ?>" required></input>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>