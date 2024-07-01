<form action="<?php echo PUBLIC_PATH; ?>config/updatePassword" method="POST">
    <div class="form-group">
        <label for="current_password">Contraseña Actual</label>
        <input type="password" name="current_password" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="new_password">Nueva Contraseña</label>
        <input type="password" name="new_password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
    <a href="<?php echo PUBLIC_PATH;?>post/PostsProfile" class="btn-custom">Volver</a>

</form>
