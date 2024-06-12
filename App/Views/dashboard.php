<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control</title>
    <link rel="stylesheet" href="../Public/css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        form {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group textarea,
        .form-group input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            margin-bottom: 10px;
            background-color: #fff;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        ul li:hover {
            background-color: #f0f0f0;
        }

        a {
            color: #333;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .container_user {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: flex-start;
            background-color: #fff;
            padding: 15px 20px;
            margin: 20px auto;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 600px;
        }

        .top-section {
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .bottom-section {
            width: 100%;
            display: flex;
            justify-content: space-evenly;
            margin-top: 20px;
        }

        .container_user p {
            margin: 5px 0;
        }

        .container_user a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        .container_user a:hover {
            text-decoration: underline;
        }

        .image-preview {
            margin-top: 15px;
            width: 100%;
            max-height: 300px;
            object-fit: contain;
            /* Maintain aspect ratio and fit within container */
            display: block;
        }

        .success-message {
            text-align: center;
            color: #007bff;
        }
    </style>
</head>

<body>
    <header>
        <h2>Nuevo Post</h2>
    </header>
    <?php
    include 'components/menu.php';
    ?>

    <!-- Aquí puedes agregar estilos CSS para el mensaje de éxito -->
    <?php if (isset($_SESSION['success_message'])) : ?>
        <div class="success-message">
            <?php echo $_SESSION['success_message']; ?>
        </div>
        <?php unset($_SESSION['success_message']); ?> <!-- Limpiar el mensaje después de mostrarlo -->
    <?php endif; ?>

    <div class="container">
        <form action="../post/store" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" id="title" name="title" placeholder="Agrega un Título!" required>
            </div>


            <div class="form-group">
                <label for="image">Imagen:</label>
                <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)">
            </div>

            <div class="form-group">
                <img id="image-preview" class="image-preview" src="#" alt="Vista previa de la imagen" style="display: none;">
            </div>
            <div class="form-group">
                <label for="content">Contenido:</label>
                <textarea id="content" name="content" placeholder="¿Qué estás pensando?" required></textarea>
            </div>
            <dic class="form-group">
                <label for="visibility">Visibilidad:</label>
                <select name="visibility" id="visibility">
                    <option value="public">Público</option>
                    <option value="friends">Solo amigos</option>
                    <option value="private">Solo yo</option>
                </select>
            </dic>

            <div class="form-group">
                <button type="submit">Publicar</button>
            </div>
        </form>
    </div>

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