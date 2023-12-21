<?php
include_once 'config.php';

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("set names utf8mb4");
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

function obtenerProductosDesdeBaseDeDatos() {
    global $pdo;

    // Realiza la consulta para obtener la lista de productos
    $consulta = $pdo->query("SELECT * FROM productos");
    $productos = $consulta->fetchAll(PDO::FETCH_ASSOC);

    return $productos;
}
?>
