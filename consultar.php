<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Consultar Registros</title>
<style type="text/css">
body,td,th {
    font-size: 20px;
}
</style>
</head>
<body>
    <h2>Consultar Registros</h2>

    <?php
    // Establecer la conexión a la base de datos (reemplaza los valores con los de tu conexión)
    $conexion = new mysqli("localhost", "root", "", "la tiendita");

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    // Consulta SQL
    $sql = "SELECT * FROM `clientes la tiendita`";

    // Ejecutar la consulta
    $result = $conexion->query($sql);

    // Verificar si hay resultados
    if ($result->num_rows > 0) {
        // Mostrar los resultados en una tabla HTML
        echo "<table border='1'>";
        echo "<tr><th>Nombre</th><th>Apellido</th><th>Correo</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["nombre"]."</td><td>".$row["apellido"]."</td><td>".$row["correo"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron registros.";
    }

    // Cerrar la conexión
    $conexion->close();
    ?>
    <br>
    <a href="micuenta.html">
    <input type="button" name="button" id="button" value="Insertar Nuevo Registro">
    </a>
	 <footer style="font-style: 20; font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;">
        Jorge May &copy;2024 Todos los Derechos Reservados
    </footer>
</body>
</html>