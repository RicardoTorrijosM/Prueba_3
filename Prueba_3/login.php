<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar</title>
    <link rel="stylesheet" href="styleiniciar.css">

</head>
<body>
    <div class="iniciarSesion">
        <form action="pg_inicio.php" method="post" enctype="multipart/form-data">

            <h1>Iniciar Sesion</h1>

            <div class="input-caja">
                <input type="email" name="correo_electronico" placeholder="Correo Electronico" required>
            </div>

            <div class="input-caja">
                <input type="password" name="contraseña" placeholder="Contraseña" required>
            </div>

            <button type= "submit" class=botonIniciar>Iniciar</button>

            <div class="registro-link">
                <p> 
                    ¿Aun no te has resgistrado? 
                    <a href="register.php">Registrarse</a>
                </p>
            </div>

        </form>
    </div>

</body>
</html>

<?php

$db_host = "localhost";
$db_name = "proyecto_final";
$db_user = "root";
$db_pass = "";


$conexion = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos.");
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $correo_electronico = trim($_POST['correo_electronico'] ?? '');
    $contraseña = trim($_POST['contraseña'] ?? '');

    if (empty($correo_electronico) || empty($contraseña)) {
        echo '<p>Debe ingresar el correo y la contraseña.</p>';
    } else {
    
        $sql = "SELECT * FROM usuarios WHERE correo_electronico = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("s", $correo_electronico);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $usuario = $resultado->fetch_assoc();

            if (password_verify($contraseña, $usuario['contraseña'])) {
                
                $_SESSION['usuario'] = $usuario['nombre'];
                header("Location: dashboard.php");
                exit();
            } else {
                echo '<p>La contraseña es incorrecta.</p>';
            }
        } else {
            echo '<p>El usuario no existe.</p>';
        }
        $stmt->close();
    }
}


$conexion->close();
?>





