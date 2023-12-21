<?php
include_once 'config.php';
include_once 'conexion.php';
include_once 'carrito.php';

// Verificar si se realizó alguna acción con el carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['btnEliminar'])) {
        $idProducto = $_POST['btnEliminar'];

        // Lógica para eliminar el producto del carrito
        if (isset($_SESSION['CARRITO'][$idProducto])) {
            unset($_SESSION['CARRITO'][$idProducto]);
        }
    } elseif (isset($_POST['btnPagar'])) {
        // Lógica para procesar el pago
        // ...
    }
}
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

        .btn-secondary {
            background-color: #6c757d;
            color: #fff;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        #paypal-button-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="/">ÓPTICA MINI-GALERÍAS</a>
    </nav>

    <!-- Content -->
    <div class="container mt-4">
        <h3>Lista del carrito</h3>

        <?php if (!empty($_SESSION['CARRITO'])): ?>
            <form action="" method="post">
                <table class="table table-light table-bordered">
                    <thead>
                        <tr>
                            <th width="40%">Descripción</th>
                            <th width="15%" class="text-center">Cantidad</th>
                            <th width="20%" class="text-center">Precio</th>
                            <th width="20%" class="text-center">Total</th>
                            <th width="5%">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['CARRITO'] as $indice => $producto): ?>
                            <tr>
                                <td><?php echo $producto['NOMBRE']; ?></td>
                                <td class="text-center"><?php echo $producto['CANTIDAD']; ?></td>
                                <td class="text-center">$<?php echo $producto['PRECIO']; ?></td>
                                <td class="text-center">$<?php echo number_format($producto['PRECIO'] * $producto['CANTIDAD'], 2); ?></td>
                                <td class="text-center">
                                    <button class="btn btn-danger" type="submit" name="btnEliminar" value="<?php echo $indice; ?>">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="3" align="right"><h3>Total</h3></td>
                            <td align="right"><h3>$<?php echo number_format(calcularTotalCarrito(), 2); ?></h3></td>
                            <td>
                                <!-- Botón de pago -->
                                <button class="btn btn-primary" type="submit" name="btnPagar" value="Pagar">
                                    Pagar con PayPal
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>

            <!-- Botón de PayPal -->
            <script src="https://www.paypal.com/sdk/js?client-id=AaAqB8BtRM-LLXJoJr66F-C88THxT6B29cksj_jrdtosx7khxyHLbpdRC5CAH9Ezev60P4UlvGHBUQih"></script>
            <div id="paypal-button-container"></div>

        <?php else: ?>
            <div class="alert alert-success">
                No hay productos en el carrito...
            </div>
        <?php endif; ?>

        <!-- Botón para regresar a index.php -->
        <a href="index.php" class="btn btn-secondary">Seguir comprando</a>
    </div>

    <!-- Bootstrap JavaScript and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        paypal.Buttons({
            createOrder: function (data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo calcularTotalCarrito(); ?>'
                        }
                    }]
                });
            },
            onApprove: function (data, actions) {
                return actions.order.capture().then(function (details) {
                    alert('Pago completado por ' + details.payer.name.given_name);
                    // Aquí puedes realizar acciones adicionales después del pago
                });
            }
        }).render('#paypal-button-container');
    </script>
</body>
</html>
