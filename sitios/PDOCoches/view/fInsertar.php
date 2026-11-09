<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <!--<form action="../insertar.php" method="GET">-->
  <form action="" method="POST">
    <input type="hidden" name="action_method" value="insertar">
    <div>
      <label for="marca">Marca1:</label>
      <input type="text" name="marca" id="marca" placeholder="Marca..." autofocus>
    </div>
    <div>
      <label for="modelo">Modelo:</label>
      <input type="text" name="modelo" id="modelo" placeholder="Modelo...">
    </div>
    <div>
      <label for="modelo">Color:</label>
      <input type="text" name="color" id="color" placeholder="Color...">
    </div>
    <div>
      <label for="modelo">Propietario:</label>
      <input type="text" name="propietario" id="propietario" placeholder="Propietario...">
    </div>
    <div>
      <label for="modelo">ColorPrecio:</label>
      <input type="text" name="precio" id="precio" placeholder="Precio...">
    </div>
    <div>
      <button type="submit" name="btnGuardar" value="ok">Guardar</button>
    </div>
  </form>
</body>

</html>