<div class="joke-container" id="joke">
        <h2>Chiste del Día</h2>
        <p class="loading">Cargando el chiste...</p>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch('<?php echo PUBLIC_PATH; ?>jokes/getJoke')
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    var jokeDiv = document.getElementById("joke");
                    jokeDiv.querySelector('.loading').style.display = 'none';
                    if (data.type === "single") {
                        jokeDiv.innerHTML += `<p>${data.joke}</p>`;
                    } else if (data.type === "twopart") {
                        jokeDiv.innerHTML += `<p>${data.setup}</p><p>${data.delivery}</p>`;
                    }
                })
                .catch(error => {
                    console.error('Error al obtener el chiste:', error);
                    document.getElementById("joke").innerHTML = `<p>Error al cargar el chiste: ${error.message}</p>`;
                });
        });
    </script>