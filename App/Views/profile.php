<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>profile.css">
    <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>style.css">


    <title>Perfil</title>
    <!-- Agrega tus estilos CSS aquí -->

</head>

<body>
    <header>
        <h2>Mi Perfil</h2>
    </header>

    <div class="main-container">


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

        <div class="post-container">

            <?php if (isset($_SESSION['success_message'])) : ?>
                <div class="success-message">
                    <?php echo $_SESSION['success_message']; ?>
                </div>
                <?php unset($_SESSION['success_message']); ?> <!-- Limpiar el mensaje después de mostrarlo -->
            <?php endif; ?>

           
            <div class="card-post">
                <?php
                $isProfile = true;
                include 'components/cardPost.php';
                ?>
            </div>
        </div>

        <div class="container_amigos">
        <div class="clima" id="clima">
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

</html>