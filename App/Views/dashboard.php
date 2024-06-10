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

        input[type="text"],
        input[type="password"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
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
        .container_user{
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .container_user p:last-child {
            margin-left: auto;
        }
    </style>
</head>

<body>
    <header>
        <h2>Panel de Control</h2>
    </header>
    <div class="container_user">
        <p>Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
        <p><a href="../Auth/logout">Cerrar sesión</a></p>
    </div>

    <div class="container">

        <!-- Formulario para agregar un nuevo post -->
        <h3>Agregar Nuevo Post</h3>
        <form action="../Post/add" method="POST">
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="image">Imagen:</label>
                <input type="file" id="image" name="image">
            </div>
            <div class="form-group">
                <label for="content">Contenido:</label>
                <textarea id="content" name="content" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit">Publicar</button>
            </div>
        </form>

        <!-- Lista de posts existentes -->
        <h3>Posts</h3>
        <ul>
            <!-- Aquí puedes mostrar los posts existentes -->
            <!-- Por ejemplo, podrías obtener los posts de la base de datos y mostrarlos aquí -->
            <!-- <li>Post 1</li>
            <li>Post 2</li>
            <li>Post 3</li> -->
        </ul>
    </div>
</body>

</html>
