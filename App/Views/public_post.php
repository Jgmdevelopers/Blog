<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>profile.css">
    <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>style.css">
    <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>comments.css">


    <title>POST GLOBAL</title>

</head>

<body>

    <header>

    </header>

    <?php
    include '_partials/message.php';
    ?>


    <div class="menu-container">
        <div class="menu">
            <?php include 'components/menu.php'; ?>
            
        </div>
        <?php include 'components/info.php' ?>

    </div>
    <div class="main-container">
        
        <?php
        include COMPONENTS_PATH . 'selector-main.php';
        ?>
       
        <div class="post-container">
            <?php include 'components/cardPost.php'; ?>
        </div>
    </div>
    
    
    
    <div class="container_amigos">
        <?php include 'components/clima.php' ?>
        <div class="solicitudes">
            <?php include 'components/amigosQuizasConozca.php' ?>
        </div>
    </div>
    

    <script>
        // Obtener la ubicación del usuario
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showWeather);
        } else {
            alert("Geolocation is not supported by this browser.");
        }

        // Función para mostrar el clima basado en la ubicación
        function showWeather(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;

            // Enviar la ubicación al controlador PHP utilizando AJAX
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Parsear la respuesta JSON y mostrar los datos del clima en el elemento con id "weather-info"
                    var weatherData = JSON.parse(this.responseText);
                    document.getElementById("weather-info").innerHTML = "El clima actual en " + weatherData.city_name + " es " + weatherData.description + " con una temperatura de " + weatherData.temperature + " grados Celsius.";
                }
            };
            xhttp.open("GET", "../weather/getCurrentWeather?lat=" + latitude + "&lon=" + longitude, true);
            xhttp.send();
        }
    </script>
</body>

</html>