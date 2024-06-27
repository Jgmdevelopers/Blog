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