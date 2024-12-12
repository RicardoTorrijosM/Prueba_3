<?php

$api_url = "https://api.openf1.org/v1/drivers";


$url = curl_init($api_url);
curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
curl_setopt($url, CURLOPT_HTTPGET, true);


$response = curl_exec($url);

if (curl_errno($url)) {
    $error_message = "Error: " . curl_error($url);
    $drivers_data = [];
} else {
    $drivers_data = json_decode($response, true);
}

curl_close($url);

$limit = 20;
$shown_drivers = [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Pilotos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: white;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            min-height: 100vh;
        }

        .div_menu {
            width: 100%;
            background-color: #333;
            padding: 20px;
        }

        .bienvenido {
            text-align: center;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            display: inline;
            margin-right: 15px;
        }

        ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
        }

        ul li a:hover {
            color: #f0a500;
        }

        .Btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            display: flex;
            align-items: center;
            margin-top: 20px;
        }

        .Btn:hover {
            background-color: #45a049;
        }

        .sign svg {
            width: 24px;
            height: 24px;
            margin-right: 8px;
        }

        #drivers-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
            margin-top: 30px;
        }

        
        .driver-container {
            background-color: #222;
            color: white;
            padding: 20px;
            border-radius: 12px;
            width: 250px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .driver-container:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
        }

        .driver-container h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .driver-container p {
            font-size: 16px;
            margin-bottom: 15px;
        }

        .driver-container img {
            max-width: 100px;
            max-height: 100px;
            border-radius: 50%;
            margin-top: 10px;
            object-fit: cover;
        }

        .no-photo {
            font-style: italic;
            color: #bbb;
            margin-top: 10px;
        }

        .error-message {
            color: red;
            font-size: 18px;
            margin-top: 30px;
        }
        .Btn {
            --black: #000000;
            --ch-black: #141414;
            --eer-black: #1b1b1b;
            --night-rider: #2e2e2e;
            --white: #ffffff;
            --af-white: #f3f3f3;
            --ch-white: #e1e1e1;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 45px;
            height: 45px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition-duration: 0.3s;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
            background-color: var(--night-rider);
            margin: 10px;
            top: -50px;
            
        }
        .sign {
            width: 100%;
            transition-duration: 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sign svg {
            width: 17px;
        }

        .sign svg path {
            fill: var(--af-white);
        }

        .text {
            position: absolute;
            right: 0%;
            width: 0%;
            opacity: 0;
            color: var(--af-white);
            font-size: 1.2em;
            font-weight: 600;
            transition-duration: 0.3s;
        }

        .Btn:hover {
            width: 125px;
            border-radius: 5px;
            transition-duration: 0.3s;
        }

        .Btn:hover .sign {
            width: 30%;
            transition-duration: 0.3s;
            padding-left: 20px;
        }
    </style>

</head>
<body>
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
            <h2>Pilotos</h2>
            
            <table>
                <ul>
                    <li><a href="pg_inicio.php">Inicio</a></li>
                    <li><a href="pilotos.php">Pilotos</a></li>
                </ul>  
            </table>

            <a href="login.php">
                <button class="Btn">
                    <div class="sign">
                        <svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg>
                    </div>
                    <div class="text">Cerrar Sesion</div>
                </button>
            </a>
        </div>
    </div>


    <div id="drivers-container">
        <?php
        if (!empty($drivers_data) && is_array($drivers_data)) {
            $count = 0;  
            $shown_drivers = [];  
            foreach ($drivers_data as $driver) {
                if ($count >= $limit) {
                    break;  
                }
                if (in_array($driver['driver_number'], $shown_drivers)) {
                    continue;  
                }
                $shown_drivers[] = $driver['driver_number'];

                $full_name = $driver['full_name'] ?? 'No disponible';
                $headshot_url = $driver['headshot_url'] ?? '';
                $name_acronym = $driver['name_acronym'] ?? 'No disponible';

                echo "<div class='driver-container'>";
                echo "<h3>$full_name</h3>";
                echo "<p>Acrónimo: $name_acronym</p>";

                if (!empty($headshot_url)) {
                    echo "<img src='$headshot_url' alt='Foto de $full_name'>";
                } else {
                    echo "<p class='no-photo'>No hay foto disponible.</p>";
                }
                echo "</div>";

                $count++;  
            }
        } else {
            echo "<p class='error-message'>No se encontraron datos.</p>";
        }
        ?>
    </div>
</body>
</html>
