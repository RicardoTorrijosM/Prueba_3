<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paguina Inicio</title>
    <link rel="stylesheet" href="stylepresentacion.css">
</head>
<body>
    <div class="div_menu">
        <div class="bienvenido">
            <h2>Bienvenido</h2>

            <table>
                <ul>
                    <li><a href="pg_inicio.php">Inicio</a></li>
                    <li><a href="pilotos.php">Pilotos</a></li>
                </ul>  
            </table>

            
                <button class="Btn">
                    
                    <div class="sign">
                        <svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg>
                    </div>
                    <div class="text"><a href="login.php">Cerrar Sesion</a></div>
                </button>
            
        </div>
    </div>
    <div class="div_presentacion">
    <h2 class="titulo"> Presentacion </h2>
        <p>
            Nuestro proyecto es una aplicación web diseñada con las siguientes funcionalidades:

            <h3>Registro de usuarios:</h3>

            Los usuarios pueden registrarse a través de una página de registro.
            Los datos proporcionados se almacenan de forma segura en una base de datos MySQL.
            Una vez registrados, los usuarios pueden acceder a la página de inicio y a la sección de pilotos.
        </p>
        <p>
            <h3>Inicio de sesión:</h3>

            Los usuarios que ya están registrados pueden iniciar sesión ingresando su correo electrónico y contraseña.
            El sistema valida las credenciales comparándolas con la base de datos.
            Si los datos son correctos, el usuario es redirigido automáticamente a la página de inicio.
        </p>
        <p>
            <h3>Página de inicio:</h3>

            Incluye un menú de navegación que permite acceder a las diferentes secciones del sitio.
            Contiene una explicación detallada sobre el proyecto y fotos de los integrantes del equipo.
        </p>
        <p>
            <h3>Página de pilotos:</h3>

            Utiliza la API OpenF1 para mostrar información sobre los pilotos de Fórmula 1.
            Los datos presentados incluyen el nombre del piloto, su acrónimo y su imagen.
            Este proyecto combina el manejo de bases de datos y el consumo de APIs para ofrecer una experiencia interactiva e informativa a los usuarios.
        </p>
    </div>
</body>
</html>