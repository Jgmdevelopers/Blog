<!-- Estructura HTML para mostrar amigos aceptados -->
<div class="friends-container">
    <div class="row">
        <?php foreach ($acceptedFriends as $friend) : ?>
            <div class="col-md-4">
                <div class="friend-card">
                    <!--  <img src="imagen_perfil.jpg" class="friend-avatar" alt="Imagen de perfil"> -->
                    <div class="friend-info">
                        <h5 class="friend-name"><?= htmlspecialchars($friend['username']) ?></h5>
                        <!-- Agrega más información del perfil del amigo si es necesario -->
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
