<?php
//NO NOS SIRVE
// Definición de las credenciales de conexión
// Host: localhost
// Usuario: root
// Contraseña: "" (cadena vacía)
// Base de Datos: liga (Adaptado del concepto db name)
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'liga';
$tabla = 'equipos';
$query_sql = "SELECT * FROM {$tabla}"; // Consulta para traer todos los registros

// 1. Establecer la conexión usando mysqli (orientado a objetos)
$conexion = new mysqli($host, $user, $password, $dbname);

// 2. Verificar si hubo un error de conexión
if ($conexion->connect_error) {
    // Si hay un error, se detiene la ejecución y se muestra el mensaje
    die("Error de conexión: " . $conexion->connect_error);
}

// 3. Ejecutar la consulta a la base de datos
$resultado = $conexion->query($query_sql);

// 4. Procesar y mostrar los resultados
if ($resultado) {

    // NOTA SOBRE OBJETOS:
    // Los métodos de fetching demostrados en las fuentes (fetch_assoc y fetch_all con MYSQLI_ASSOC)
    // retornan los datos como arrays asociativos.
    // Para cumplir con la solicitud de obtener *todos* los equipos (fetch all),
    // se utiliza fetch_all(MYSQLI_ASSOC), que devuelve un array de arrays asociativos.
    // Para tratar los datos obtenidos como objetos, se podría utilizar el método fetch_object,
    // pero este no fue el método principal detallado en las fuentes para recuperar conjuntos completos.

    // Recuperar todos los registros como un array de arrays asociativos
    $equipos = $resultado->fetch_all(MYSQLI_ASSOC);

    echo "<h1>Equipos de la base de datos '{$dbname}':</h1>";

    if (!empty($equipos)) {
        echo "<pre>";
        // Iterar sobre el array de resultados
        foreach ($equipos as $equipo_array) {
            // Se muestra cada registro. Si se desea usar la notación de objeto
            // para mostrar los datos, se podría convertir el array a objeto (lo cual va más allá de lo simple
            // que se extrae directamente de las fuentes), o se debe acceder mediante la clave:
            // Ejemplo: echo "ID: " . $equipo_array['id'] . ", Nombre: " . $equipo_array['nombre'] . "\n";

            // Para mostrar la estructura completa de los datos recuperados:
            print_r($equipo_array);
        }
        echo "</pre>";
    } else {
        echo "No se encontraron registros en la tabla {$tabla}.";
    }

    // 5. Cerrar el objeto resultado
    $resultado->close();
} else {
    echo "Error al ejecutar la consulta: " . $conexion->error;
}

// 6. Cerrar la conexión
$conexion->close();

?>