<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="styleregistro.css">
</head>
<body>
    <div class="formularioRegistro">
        <form name="login.php" method="post" enctype="multipart/form-data">
            <h1>Registro</h1>

            <div class="input-caja">
                <input type="text" name="nombre" placeholder="Nombre" required><br>
            </div>

            <div class="input-caja">
                <input type="text" name="apellido" placeholder="Apellido" required><br>
            </div>
            
            <div class="input-caja">
                <input type="email" name="correo_electronico" placeholder="Correo Electrónico" required><br>
            </div>
            
            <div class="input-caja">
                <input type="password" id="contraseña" name="contraseña" placeholder="Contraseña" required><br>
            </div>
            
            <div class="input-caja">
                <input type="password" id="confirmarContra" name="contraseña2" placeholder="Confirmar Contraseña" required><br>
            </div>
            
            <button type="submit" name="submit" class="botonRegistrar">Registrar</button>
            
            <div class="iniciar-sesion-link">
                <p>¿Ya tienes una cuenta? 
                    <a href="login.php">Iniciar Sesión</a>
                </p>
            </div>

        </form>
    </div>
</body>
</html>

<?php
session_start(); 

$db_host = "localhost";
$db_name = "proyecto_final";
$db_user = "root";
$db_pass = "";

$conexion = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    if (empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['correo_electronico']) || empty($_POST['contraseña']) || empty($_POST['contraseña2'])) {
        echo '<p>Debe ingresar todos los datos.</p>';
    } else {

        $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
        $apellido = mysqli_real_escape_string($conexion, $_POST['apellido']);
        $correo_electronico = mysqli_real_escape_string($conexion, $_POST['correo_electronico']);
        $contraseña = mysqli_real_escape_string($conexion, $_POST['contraseña']);
        $contraseña2 = mysqli_real_escape_string($conexion, $_POST['contraseña2']);

        
        if ($contraseña !== $contraseña2) {
            echo '<p>Las contraseñas no coinciden.</p>';
        } elseif (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $contraseña)) {
            echo '<p>La contraseña debe tener al menos 8 caracteres, incluyendo una mayúscula, una minúscula, un número y un carácter especial.</p>';
        } else {
            
            $hashed_password = password_hash($contraseña, PASSWORD_DEFAULT);

            
            $sql = "INSERT INTO usuarios (nombre, apellido, correo_electronico, contraseña) VALUES ('$nombre', '$apellido', '$correo_electronico', '$contraseña')";
            if (mysqli_query($conexion, $sql)) {
                
                $logMessage = "Usuario: $nombre $apellido, Correo: $correo_electronico, Fecha y hora de registro: " . date('Y-m-d H:i:s') . "\n";
                file_put_contents('log.txt', $logMessage, FILE_APPEND);

                
                header("Location: login.php");
                exit();
            } else {
                echo "<p>Error al registrar: " . mysqli_error($conexion) . "</p>";
            }
        }
    }
}


mysqli_close($conexion);





