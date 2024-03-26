<style type="text/css">
body,td,th {
    font-family: Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 20px;
}
</style>
<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos (reemplaza los valores con los de tu conexión)
    $conexion = new mysqli("localhost", "root", "", "la tiendita");

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $password = $_POST["password"];
    // Otros campos aquí

    // Preparar la consulta SQL para insertar el registro
    $sql = "INSERT INTO `clientes la tiendita` (nombre,apellido, correo, password) VALUES ('$nombre','$apellido', '$correo', '$password')"; // Modifica la consulta según tu estructura de tabla

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        // Redireccionar al usuario después de la inserción exitosa
        header("Location: micuenta.html");
        exit(); // Asegúrate de detener la ejecución del script después de la redirección
    } else {
        // Mostrar mensaje de error en caso de fallo en la inserción (opcional)
        echo "Error al insertar el registro: " . $conexion->error;
    }

    // Cerrar la conexión
    $conexion->close();
}
?>