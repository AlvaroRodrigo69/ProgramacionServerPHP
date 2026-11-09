<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Editar post</h1>
    <form action="" method="post">
        <label for="id">ID</label><br>
        <input type="text" name="id"  value="<?= htmlspecialchars($post['id']?? '') ?>" readonly><br>
        <label for="titulo">Titulo</label><br>
        <input type="text" name="titulo"  value="<?= htmlspecialchars($post['title']?? '') ?>" required><br>
        <label for="cuerpo">Cuerpo</label><br>
        <input type="text" name="cuerpo"  value="<?= htmlspecialchars($post['body']?? '') ?>" required><br>
        <input type="submit" value="enviar">
    </form>
</body>
</html>