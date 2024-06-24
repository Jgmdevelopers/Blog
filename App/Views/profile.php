Mis disculpas por eso. Agregaré bordes a las secciones que mencionaste:

```html
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <!-- Agrega tus estilos CSS aquí -->
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .main-container {
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }

        .menu-container {
            display: flex;
            flex-direction: column;
            width: 20%;
            background-color: #f0f0f0;
            border: 1px solid #ddd; /* Borde añadido */
            border-radius: 8px; /* Borde añadido */
            padding: 10px; /* Espaciado interno */
            margin-right: 20px; /* Espacio entre el menú y el contenido */
        }

        .clima {
            padding: 10px;
            background-color: #e0e0e0;
            border: 1px solid #ddd; /* Borde añadido */
            border-radius: 8px; /* Borde añadido */
            margin-bottom: 20px;
        }

        .container {
            width: 55%;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd; /* Borde añadido */
            border-radius: 8px; /* Borde añadido */
        }

        .container_amigos {
            width: 20%;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ddd; /* Borde añadido */
            border-radius: 8px; /* Borde añadido */
        }

        .container_amigos h2 {
            margin-top: 0;
        }

        .amigo {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .amigo button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .amigo button:hover {
            background-color: #0056b3;
        }

        .solicitudes {
            margin-bottom: 20px;
        }

        /* Estilos del post */
        .post {
            border: 1px solid #ddd;
            border-radius: 8px;
            margin: 0 auto;
            margin-bottom: 20px;
            padding: 15px;
            text-align: center;
            background-color: #d1d1d1;
        }

        .post h3 {
            margin-top: 0;
            font-size: 15px;
            text-align: justify;
            color: #333;
            margin-left: 10px;
            margin-bottom: 20px;
        }

        .post h4 {
            margin-top: 0;
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        .post p {
            line-height: 1.6;
            color: #555;
            margin-bottom: 15px;
        }

        .post img {
            width: 500px;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .post-info {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #888;
            font-size: 14px;
        }

        .post-info p {
            margin: 0;
        }

    </style>
</head>

<body>
    <header>
        <h2>Mis Posts</h2>
    </header>

    <div class="main-container">
        <div class="menu-container">
            <div class="menu">
                <?php include 'components/menu.php'; ?>
            </div>
            <div class="clima" id="clima">
                <p>Cargando el clima...</p>
            </div>
        </div>

        <div class="container">
            <?php
            $isProfile = true;
            include 'components/cardPost.php';
            ?>
        </div>

        <div class="container_amigos">
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

</html>
```

Ahora, todas las secciones tienen bordes para una mejor identificación visual.