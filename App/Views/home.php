<?php
    require_once __DIR__ . '/../../config.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de inicio</title>
    <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>style.css">

</head>

<body style="display: flex; flex-direction: column;">
    <header>
        <h1>Trabajo Final - PHP Avanzado</h1>
    </header>

    <div class="container" style="margin-top: 50px;">

        <div class="content">
            <p style="color: white;">Para acceder a todas las funcionalidades, por favor inicia sesión.</p>
            <a href="<?php echo PUBLIC_PATH; ?>Auth/loginForm" style="color: blue;">Iniciar sesión</a>

        </div>
    </div>

    <?php
        include COMPONENTS_PATH . 'footer.php';
    ?>

</body>

</html>