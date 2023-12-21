<?php
session_start();
if(isset($_SESSION['usuario'])){
    header("location: bienvenido.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width, initial-scale=1.0">
    <title>Login</title>
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
                    <h1 class="logo"><a href="/">ÓPTICA MINI-GALERÍAS</a></h1>
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
        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes cuenta?</h3>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes cuenta?</h3>
                    <button id="btn__registrarse">Registrarse</button>
                </div>
            </div>

            <div class="contenedor__login-register">
             
              <!-- Formulario de Inicio de Sesión -->
<form action="php/login_usuario_be.php" method="POST" class="formulario__login">
    <h2>Iniciar Sesión</h2>
    <input type="text" placeholder="Correo Electrónico" name="correo">
    <input type="password" placeholder="Contraseña" name="contrasena">
    <button>Entrar</button>
</form>

<!-- Formulario de Registro -->
<form action="php/registro_usuario_be.php" method="POST" class="formulario__register">
    <h2>Registrarse</h2>
    <input type="text" placeholder="Nombre Completo" name="nom_completo">
    <input type="text" placeholder="Correo Electrónico" name="correo">
    <input type="text" placeholder="Nickname" name="usuario">
    <input type="password" placeholder="Contraseña" name="contrasena">
    <button>Registrarse</button>
</form>

            </div>
        </div>
    </main>
    <script src="./script.js"></script>
    <script src="https://kit.fontawesome.com/7ceb81746d.js" crossorigin="anonymous"></script>
</body>
</html>
