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

</html>