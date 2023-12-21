<?php
session_start();

// Asegúrate de incluir los archivos de configuración y conexión aquí

function agregarAlCarrito($id, $nombre, $precio, $cantidad) {
    // ... (código de la función agregarAlCarrito) ...
}

function eliminarDelCarrito($id) {
    // ... (código de la función eliminarDelCarrito) ...
}

function vaciarCarrito() {
    // ... (código de la función vaciarCarrito) ...
}

function calcularTotalCarrito() {
    // ... (código de la función calcularTotalCarrito) ...
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... (código del encabezado) ... -->
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="/htdocs/">ÓPTICA MINI-GALERÍAS</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="/htdocs/index.php">Inicio</a>
            </li>
        </ul>
    </nav>

    <!-- Content -->
    <div class="container mt-4">
        <!-- ... (resto del contenido) ... -->
    </div>

    <!-- Bootstrap JavaScript and jQuery -->
    <!-- ... (código de los scripts) ... -->
</body>
</html>
