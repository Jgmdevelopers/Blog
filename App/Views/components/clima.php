<div class="clima" id="clima">
    <h2>Clima</h2>
    <p>Cargando el clima...</p>
</div>
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