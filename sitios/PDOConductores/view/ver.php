<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th {
            width: 8rem;
            text-align: left;
            border-bottom: 1px solid black;
        }

        td {
            width: 8rem;
        }
    </style>
</head>

<body>
    <h1>Conductor Seleccionado</h1>
    <table>
        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Puntos</th>
            <th>Ciudad</th>
            <th>Multas</th>
            <th>Estado</th>
        </tr>
        <tr>
            <td><?php echo $row->id ?></td>
            <td><?php echo $row->nombre ?></td>
            <td><?php echo $row->puntos ?></td>
            <td><?php echo $row->ciudad ?></td>
            <td><?php echo $row->multas?></td>
            <td><?php echo $row->estado?></td>
        </tr>
    </table>
</body>

</html>