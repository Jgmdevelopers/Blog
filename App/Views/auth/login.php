<?php
require_once __DIR__ . '/../../../config.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
 
   <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>login.css">

</head>


<body>
    <header>
        <h1>Bienvenido</h1>
    </header>
    <div class="container">
        <form action="<?php echo PUBLIC_PATH; ?>auth/login" method="post">
            <div class="form-group">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username'], ENT_QUOTES) : ''; ?>" required>
                <?php if (!empty($errors['username'])): ?>
                    <span class="error"><?php echo $errors['username']; ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
                <?php if (!empty($errors['password'])): ?>
                    <span class="error"><?php echo $errors['password']; ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <input type="submit" value="Iniciar sesión">
            </div>
            <?php if (!empty($errors['general'])): ?>
                <span class="error"><?php echo $errors['general']; ?></span>
            <?php endif; ?>
        </form>
        <p>¿No tienes una cuenta? <a href="<?php echo PUBLIC_PATH; ?>Auth/register">Regístrate aquí</a></p>
    </div>
    <?php
    include COMPONENTS_PATH . 'footer.php';
    ?>
</body>
</html>