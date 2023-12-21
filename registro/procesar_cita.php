<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    echo '
    <script>
    alert("Por favor, inicia sesión");
    window.location = "../index.php";
    </script>';
    session_destroy();
    die();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Conecta a la base de datos
    $mysqli = new mysqli('localhost', 'root', '', 'citas_optica');

    // Verifica la conexión
    if ($mysqli->connect_error) {
        die("Error de conexión: " . $mysqli->connect_error);
    }

    // Obtiene la fecha y hora de la cita del formulario
    $fecha_cita = $_POST['fecha'];

    // Obtiene el nombre de usuario de la sesión
    $nombre_usuario = $_SESSION['usuario'];

    // Inserta la cita en la base de datos
    $query = "INSERT INTO citas_optica.citas (usuario, fecha_cita) VALUES ('$nombre_usuario', '$fecha_cita')";

    if ($mysqli->query($query) === TRUE) {
        echo "Cita programada exitosamente.";
        // Redirecciona a bienvenido.php después de 2 segundos
        echo '<script>
                setTimeout(function() {
                    window.location = "bienvenido.php";
                }, 2000);
              </script>';
    } else {
        echo "Error al programar la cita: " . $mysqli->error;
    }

    // Cierra la conexión
    $mysqli->close();
}
?>
