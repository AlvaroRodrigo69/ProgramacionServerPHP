<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Crea un nuevo post</h1>
    <form action="" method="post">
        <label for="autor">AUTOR</label><br>
        <input type="text" name="idusu"  value="<?= htmlspecialchars($_SESSION['nombre']?? '') ?>" readonly><br>
        <label>Titulo</label><br>
        <input type="text" id="titulo" name="titulo" required><br>
        <label>Cuerpo</label><br>
        <input type="textarea" id="cuerpo" name="cuerpo" required><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>