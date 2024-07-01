<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>profile.css">
    <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>style.css">
    <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>comments.css">

    <title>Perfil</title>

</head>

<body>
    
    <?php
        include '_partials/message.php';
    ?>


    <div class="menu-container">
        <div class="menu">
            <?php include 'components/menu.php'; ?>
        </div>
        <div class="form-post">
            <?php
            include COMPONENTS_PATH . 'post.php';
            ?>
        </div>

    </div>
    <div class="main-container">

        <?php
        include COMPONENTS_PATH . 'selector-main.php';
        ?>
       
        <div class="post-container">

            <div class="card-post">
                <?php
                $isProfile = true;
                include 'components/cardPost.php';
                ?>
            </div>
        </div>

    </div>
    <div class="container_amigos">

        <div class="clima" id="clima">
            <h2>Clima</h2>
            <p>Cargando el clima...</p>
        </div>
        <div class="solicitudes">
            <h2>Solicitudes de Amistad</h2>
            <?php include 'components/solicitudes.php' ?>
        </div>
        <div class="amigos">
            <h2>Amigos</h2>
            <?php include 'components/amigos.php' ?>
        </div>
    </div>

</body>
<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('image-preview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;

                fetch(`<?php echo PUBLIC_PATH; ?>weather/getCurrentWeather?lat=${latitude}&lon=${longitude}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        var climaDiv = document.getElementById("clima");
                        climaDiv.innerHTML = `
                            <h2>Clima en ${data.city_name}, ${data.country_code}</h2>
                            <p>${data.description}</p>
                            <p>Temperatura: ${data.temperature} °C</p>
                            <p>sensación térmica: ${data.app_temp} °C</p>
                        `;
                    })
                    .catch(error => {
                        console.error('Error al obtener los datos del clima:', error);
                        document.getElementById("clima").innerHTML = `<p>Error al cargar el clima: ${error.message}</p>`;
                    });
            }, function(error) {
                console.error('Error al obtener la ubicación:', error);
                document.getElementById("clima").innerHTML = `<p>Error al obtener la ubicación: ${error.message}</p>`;
            });
        } else {
            document.getElementById("clima").innerHTML = `<p>Geolocalización no es soportada por este navegador.</p>`;
        }
    });
</script>

</html>