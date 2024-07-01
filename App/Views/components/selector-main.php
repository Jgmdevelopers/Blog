<div class="selector">
    <div class="selector_perfil">
        <a href="<?php echo PUBLIC_PATH; ?>post/PostsFriends">Amigos</a>
    </div>
    <div class="selector_amigos">
        <a href="<?php echo PUBLIC_PATH; ?>post/PostsGlobal">Publico</a>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var currentUrl = window.location.href;

        // Función para verificar y agregar la clase activa
        function setActiveLink() {
            var links = document.querySelectorAll('.selector_perfil a, .selector_amigos a');

            links.forEach(function(link) {
                if (link.href === currentUrl) {
                    link.classList.add('active');
                }
            });
        }

        // Llamar a la función inicialmente para marcar el enlace activo
        setActiveLink();
    });
</script>
