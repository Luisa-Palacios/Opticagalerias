
<?php
include 'conexion_be.php';

$nom_completo = $_POST['nom_completo'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Genera un hash de la contraseña
$contrasena = hash('sha512', $contrasena);
 // Agrega un punto y coma al final

$query = "INSERT INTO usuarios (nom_completo, correo, usuario, contrasena)
VALUES ('$nom_completo', '$correo', '$usuario', '$contrasena')";

// Verificar que el correo no se repita
$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo'");
if(mysqli_num_rows($verificar_correo) > 0){
    echo '
    <script>
    alert("Este correo ya se encuentra registrado, intenta con otro correo");
    window.location= "../index.php";
    </script>';
    exit();
}

// Verificar que el usuario no se repita
$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario'");
if(mysqli_num_rows($verificar_usuario) > 0){
    echo '
    <script>
    alert("Este usuario ya se encuentra registrado, intenta con otro usuario");
    window.location= "../index.php";
    </script>';
    exit();
}

$ejecutar = mysqli_query($conexion, $query);

if($ejecutar){
    echo '
    <script>
    alert("Cuenta creada con éxito. Serás redirigido en unos segundos.");
    window.location = "../index.php";
    </script>
    ';
}
else{
    echo '
    <script>
    alert("Inténtalo de nuevo, usuario no registrado");
    window.location = "../index.php";
    </script>
    ';
}

mysqli_close($conexion);
?>
