<?php
include_once 'config.php';
include_once 'conexion.php';
include_once 'carrito.php';

// Tu código para obtener y mostrar productos desde la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['btnAccion'])) {
        switch ($_POST['btnAccion']) {
            case 'Agregar':
                // Obtener información del producto desde la base de datos y agregar al carrito
                agregarAlCarrito($_POST['id'], $_POST['nombre'], $_POST['precio'], 1);
                break;
            // Otros casos según tus necesidades
        }
    }
}

// Cierre del bloque PHP para que puedas mezclar HTML y PHP
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ÓPTICA MINI-GALERÍAS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 56px;
        }

        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="/">ÓPTICA MINI-GALERÍAS</a>
        <a href="vercarrito.php" class="badge badge-success">Ver carrito</a>
    </nav>

    <!-- Content -->
    <div class="container mt-4">
        <div class="row">
            <?php
            // Aquí deberías obtener la lista de productos desde tu base de datos
            // y luego iterar sobre ellos para mostrarlos en tarjetas
            $productos = obtenerProductosDesdeBaseDeDatos();

            foreach ($productos as $producto):
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card">
                    <img src="<?php echo $producto['imagen']; ?>" class="card-img-top" alt="<?php echo $producto['nombre']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                        <p class="card-text"><?php echo $producto['descripcion']; ?></p>
                        <p class="card-text">$<?php echo $producto['precio']; ?></p>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                            <input type="hidden" name="nombre" value="<?php echo $producto['nombre']; ?>">
                            <input type="hidden" name="precio" value="<?php echo $producto['precio']; ?>">
                            <input type="hidden" name="cantidad" value="1">
                            <button type="submit" class="btn btn-primary" name="btnAccion" value="Agregar">Agregar al carrito</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Bootstrap JavaScript and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
