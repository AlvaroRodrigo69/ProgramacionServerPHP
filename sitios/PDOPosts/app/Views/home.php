<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <?php foreach ($posts as $post) : ?>

        <h1><?= $post['title'] ?></h1>

        <p><?= $post['body'] ?></p>

    <?php endforeach; ?>
    <br>
    <a href="/www/PDOPosts/index.php/insertar">Crea un nuevo post</a><br>
    <a href="/www/PDOPosts/index.php/cerrar">Cerrar sesion</a>
</body>

</html>