<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoderBlog</title>
    <!-- Agrega tus estilos CSS aquí -->
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }


        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Estilos del post */
        .post {
            border: 1px solid #ddd;
            border-radius: 8px;
            margin: 20px;
            padding: 15px;
            text-align: center;
            background-color: #d1d1d1;
            /* Centrar contenido */
        }

        .post h3 {
            margin-top: 0;
            font-size: 15px;
            text-align: justify;
            color: #333;
            margin-left: 10px;
            margin-bottom: 20px;
        }
        .post h4 {
            margin-top: 0;
            font-size: 24px;
            /* Tamaño del título más grande */
            color: #333;
            margin-bottom: 10px;
        }

        .post p {
            line-height: 1.6;
            color: #555;
            margin-bottom: 15px;
        }

        .post img {
            width: 500px;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
            /* Espacio debajo de la imagen */
        }

        .post-info {
            display: flex;
            align-items: center;
            justify-content: center;
            /* Centrar elementos */
            color: #888;
            font-size: 14px;
        }

        .post-info p {
            margin: 0;
        }

        /* Estilos del enlace de cierre de sesión */
        .logout-link {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .logout-link:hover {
            text-decoration: underline;
        }

        .container_user {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: flex-start;
            background-color: #fff;
            padding: 15px 20px;
            margin: 20px auto;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 600px;
        }

        .top-section {
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .bottom-section {
            width: 100%;
            display: flex;
            justify-content: space-evenly;
            margin-top: 20px;
        }

        .footer-post {
            padding: 10px 15px;
            border-top: 1px solid #e1e1e1;
            background-color: #f9f9f9;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }


        .actions {
            display: flex;
            justify-content: space-around;
            width: 100%;
        }

        .action-link {
            text-decoration: none;
            color: #4267B2;
            font-weight: bold;
            padding: 10px 15px;
            transition: background-color 0.3s, color 0.3s;
            flex-grow: 1;
            text-align: center;
        }

        .action-link:hover {
            background-color: #e1e1e1;
            color: #29487d;
            border-radius: 5px;
        }

        .action-link:active {
            background-color: #d1d1d1;
        }

        .actions .action-link:not(:last-child) {
            border-right: 1px solid #e1e1e1;
        }
        .main-container {
            display: flex;
            justify-content: space-between;
        }
        .menu-container {
            display: flex;
            flex-direction: column;
            width: 20%;
            background-color: #f0f0f0;
            padding: 20px;
            border-right: 1px solid #ddd;
        }
        .menu {
            margin-bottom: 20px;
        }
        .clima {
            padding: 10px;
            background-color: #e0e0e0;
            border-top: 1px solid #ddd;
        }
        .container {
            width: 55%;
            padding: 20px;
        }
        .container_amigos {
            width: 20%;
            background-color: #f9f9f9;
            padding: 20px;
            border-left: 1px solid #ddd;
        }
        .container_amigos h2 {
            margin-top: 0;
        }
        .amigo {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .amigo button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        .amigo button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <header>
        <h2>Global</h2>
    </header>

    <div class="main-container">
        <div class="menu-container">
            <div class="menu">
                <?php include 'components/menu.php'; ?>
            </div>
            <div class="clima" id="clima">
                <p>Cargando el clima...</p>
            </div>
        </div>
        <div class="container">
            <?php include 'components/cardPost.php'; ?>
        </div>
        <div class="container_amigos">
            <h2>Personas que quizás conozcas</h2>
            <?php
            // Ejemplo de lista de personas
            $personas = [
                ["nombre" => "Juan Pérez"],
                ["nombre" => "María García"],
                ["nombre" => "Carlos Sánchez"],
            ];

            foreach ($personas as $persona) {
                echo '<div class="amigo">';
                echo '<span>' . $persona['nombre'] . '</span>';
                echo '<button>Agregar</button>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <script>
        // JavaScript para obtener el clima
        document.addEventListener('DOMContentLoaded', function () {
            const climaDiv = document.getElementById('clima');

            // Reemplaza 'YOUR_API_KEY' con tu clave de API y 'CITY_NAME' con la ciudad que deseas consultar
            const apiKey = 'YOUR_API_KEY';
            const city = 'CITY_NAME';
            const apiUrl = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric&lang=es`;

            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    const temp = data.main.temp;
                    const description = data.weather[0].description;
                    climaDiv.innerHTML = `<p>Clima en ${city}: ${temp}°C, ${description}</p>`;
                })
                .catch(error => {
                    climaDiv.innerHTML = '<p>No se pudo cargar el clima.</p>';
                });
        });
    </script>

</body>

</html>