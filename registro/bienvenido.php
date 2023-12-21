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

$nombre_usuario = $_SESSION['usuario']; // asumiendo que 'usuario' es la clave para el nombre de usuario en la sesión

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido - ÓPTICA MINI-GALERÍA</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container-hero">
            <div class="container hero">
                <div class="customer-support">
                    <i class="fa-solid fa-headset"></i>
                    <div class="content-customer-support">
                        <span class="text">Soporte al cliente</span>
                        <span class="number">5575852090</span>
                    </div>
                </div>

                <div class="container-logo">
                    <i class="fa-solid fa-eye"></i>
                    <h1 class="logo"><a href="/">ÓPTICA MINI-GALERÍA</a></h1>
                </div>

                <div class="container-user">
                    <i class="fa-solid fa-user"></i>
                    <i class="fa-solid fa-cart-shopping"></i>
                    <div class="content-shopping-cart">
                        <span class="text">Mi carrito</span>
                        <span class="number">(0)</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <h1>Bienvenido a la óptica, <?php echo $nombre_usuario; ?></h1>
        <a href="../../Inicio/index.php">Cerrar sesión</a>

        <form action="procesar_cita.php" method="post">
            <label for="fecha">Fecha y hora de la cita:</label>
            <input type="datetime-local" id="fecha" name="fecha" required>
            <input type="submit" value="Programar Cita">
        </form>

        <!-- Agrega el enlace de descarga -->
        <p>Descargar el documento: <a href="/LuisaPalacios.pdf" download>Descargar PDF</a></p>
    </main>

    <script src="./script.js"></script>
    <script src="https://kit.fontawesome.com/7ceb81746d.js" crossorigin="anonymous"></script>
</body>
</html>
