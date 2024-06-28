<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Post</title>
    <style>
        /* Estilos CSS (iguales a los anteriores) */
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            margin: 0;
            padding: 0;
        }

        .container-edit {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="file"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
            min-height: 150px;
        }

        .form-actions {
            margin-top: 20px;
            text-align: center;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        button[type="button"] {
            background-color: #f44336;
        }

        button[type="button"]:hover {
            background-color: #da190b;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-top: 10px;
        }

        small {
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container-edit">
        <h2>Editar Post</h2>
        <?php if (isset($post)) : ?>
            <form id="edit-post-form" class="form" method="POST" action="<?php echo PUBLIC_PATH; ?>post/update" enctype="multipart/form-data">
                <input type="hidden" name="post_id" value="<?php echo htmlspecialchars($post['id']); ?>">
                <div class="form-group">
                    <label for="title">Título</label>
                    <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($post['title']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="content">Contenido</label>
                    <textarea name="content" id="content" rows="10" required><?php echo htmlspecialchars($post['content']); ?></textarea>
                </div>
                <div class="form-group visibility">
                    <label for="visibility">Visibilidad</label>
                    <select name="visibility" id="visibility">
                        <option value="public" <?php echo ($post['visibility'] === 'public') ? 'selected' : ''; ?>>Público</option>
                        <option value="friends" <?php echo ($post['visibility'] === 'friends') ? 'selected' : ''; ?>>Solo amigos</option>
                        <option value="private" <?php echo ($post['visibility'] === 'private') ? 'selected' : ''; ?>>Solo yo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Imagen Actual</label><br>
                    <div id="current-image-container">
                        <?php if (!empty($post['image_path'])) : ?>
                            <?php
                            // Obtener el nombre del archivo de la imagen
                            $image_filename = basename($post['image_path']);
                            // Ruta completa de la original
                            $image_path_original = '../../Public/uploads/' . $image_filename;
                            ?>
                            <img id="current-image" src="<?php echo htmlspecialchars($image_path_original); ?>" alt="Imagen del post">
                        <?php else : ?>
                            <p>No hay imagen actual.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="new_image">Cambiar Imagen</label>
                    <input type="file" name="new_image" id="new_image" onchange="previewImage()">
                    <small>Seleccione una nueva imagen si desea cambiarla.</small>
                </div>
                <div class="form-actions">
                    <button type="submit">Guardar Cambios</button>
                    <button type="button" onclick="window.history.back();">Cancelar</button>
                </div>
            </form>
        <?php else : ?>
            <p>Post no encontrado.</p>
        <?php endif; ?>

        <script>
            // Función para previsualizar la imagen seleccionada
            function previewImage() {
                var fileInput = document.getElementById('new_image');
                var currentImageContainer = document.getElementById('current-image-container');
                var currentImage = document.getElementById('current-image');

                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        currentImage.src = e.target.result;
                        currentImageContainer.style.display = 'block'; // Mostrar el contenedor de la imagen actual
                    }

                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        </script>
    </div>
</body>
</html>
