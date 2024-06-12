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


        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Estilos del post */
        .post {
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
            padding: 15px;
            background-color: #fff;
            text-align: center;
            /* Centrar contenido */
        }

        .post h4 {
            margin-top: 0;
            font-size: 24px;
            /* Tamaño del título más grande */
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
            /* Espacio debajo de la imagen */
        }

        .post-info {
            display: flex;
            align-items: center;
            justify-content: center;
            /* Centrar elementos */
            color: #888;
            font-size: 14px;
        }

        .post-info p {
            margin: 0;
        }

        /* Estilos del enlace de cierre de sesión */
        .logout-link {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .logout-link:hover {
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
    </style>
</head>

<body>
    <header>
        <h2>Mis Posts</h2>
    </header>
    <div class="container_user">
        <div class="top-section">
            <h2>Perfil de <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
            <p><a href="../Auth/logout" class="logout-link">Cerrar sesión</a></p>
        </div>
        <div class="bottom-section">
            <p><a href="../dashboard/index">
                    <svg width="40px" height="40px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <title>new</title>
                            <desc>Created with Sketch Beta.</desc>
                            <defs> </defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                                <g id="Icon-Set" sketch:type="MSLayerGroup" transform="translate(-516.000000, -99.000000)" fill="#000000">
                                    <path d="M527.786,122.02 L522.414,125.273 C521.925,125.501 521.485,125.029 521.713,124.571 L524.965,119.195 L527.786,122.02 L527.786,122.02 Z M537.239,106.222 L540.776,109.712 L529.536,120.959 C528.22,119.641 526.397,117.817 526.024,117.444 L537.239,106.222 L537.239,106.222 Z M540.776,102.683 C541.164,102.294 541.793,102.294 542.182,102.683 L544.289,104.791 C544.677,105.18 544.677,105.809 544.289,106.197 L542.182,108.306 L538.719,104.74 L540.776,102.683 L540.776,102.683 Z M524.11,117.068 L519.81,125.773 C519.449,126.754 520.233,127.632 521.213,127.177 L529.912,122.874 C530.287,122.801 530.651,122.655 530.941,122.365 L546.396,106.899 C547.172,106.124 547.172,104.864 546.396,104.088 L542.884,100.573 C542.107,99.797 540.85,99.797 540.074,100.573 L524.619,116.038 C524.328,116.329 524.184,116.693 524.11,117.068 L524.11,117.068 Z M546,111 L546,127 C546,128.099 544.914,129.012 543.817,129.012 L519.974,129.012 C518.877,129.012 517.987,128.122 517.987,127.023 L517.987,103.165 C517.987,102.066 518.902,101 520,101 L536,101 L536,99 L520,99 C517.806,99 516,100.969 516,103.165 L516,127.023 C516,129.22 517.779,131 519.974,131 L543.817,131 C546.012,131 548,129.196 548,127 L548,111 L546,111 L546,111 Z" id="new" sketch:type="MSShapeGroup"> </path>
                                </g>
                            </g>
                        </g>
                    </svg>
                </a></p>
            <p><a href="../News/index"><svg width="40px" height="40px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g id="icomoon-ignore"> </g>
                            <path d="M16 2.672c-0.004 0-0.007 0-0.011 0-0.002 0-0.003 0-0.005 0-0.005 0-0.010 0.001-0.016 0.001-7.347 0.017-13.296 5.977-13.296 13.327 0 7.348 5.949 13.309 13.296 13.327 0.005 0 0.010 0.001 0.016 0.001 0.002 0 0.004 0 0.005 0 0.004 0 0.008 0 0.011 0 7.36 0 13.328-5.968 13.328-13.328s-5.968-13.328-13.328-13.328zM16.533 10.648c1.413-0.039 2.788-0.225 4.112-0.548 0.399 1.571 0.647 3.382 0.686 5.367h-4.798v-4.819zM16.533 9.582v-5.759c1.437 0.398 2.893 2.314 3.821 5.252-1.231 0.297-2.509 0.47-3.821 0.507zM15.467 3.81v5.772c-1.323-0.037-2.611-0.213-3.852-0.515 0.936-2.956 2.405-4.879 3.852-5.256zM15.467 10.647v4.82h-4.831c0.039-1.988 0.287-3.801 0.687-5.373 1.334 0.326 2.72 0.515 4.144 0.553zM9.563 15.467h-5.811c0.118-2.741 1.139-5.252 2.773-7.241 1.187 0.654 2.446 1.189 3.766 1.589-0.431 1.7-0.689 3.617-0.728 5.652zM9.563 16.533c0.039 2.034 0.297 3.951 0.728 5.651-1.319 0.401-2.579 0.936-3.766 1.59-1.635-1.989-2.656-4.5-2.773-7.241h5.811zM10.636 16.533h4.831v4.814c-1.424 0.038-2.81 0.228-4.145 0.555-0.399-1.571-0.647-3.383-0.686-5.369zM15.467 22.412v5.778c-1.448-0.378-2.919-2.303-3.854-5.263 1.241-0.302 2.53-0.478 3.854-0.515zM16.533 28.178v-5.765c1.313 0.038 2.591 0.211 3.822 0.508-0.928 2.941-2.384 4.86-3.822 5.257zM16.533 21.347v-4.814h4.798c-0.039 1.983-0.286 3.791-0.684 5.361-1.325-0.323-2.7-0.51-4.113-0.548zM22.404 16.533h5.845c-0.118 2.741-1.138 5.251-2.773 7.24-1.197-0.658-2.467-1.197-3.797-1.599 0.43-1.698 0.687-3.611 0.726-5.64zM22.404 15.467c-0.039-2.033-0.297-3.946-0.727-5.646 1.33-0.402 2.599-0.94 3.795-1.598 1.636 1.989 2.658 4.501 2.776 7.244h-5.845zM24.738 7.409c-1.061 0.564-2.18 1.031-3.35 1.385-0.623-2.005-1.498-3.642-2.533-4.717 2.27 0.545 4.297 1.719 5.883 3.332zM13.103 4.087c-1.029 1.073-1.9 2.702-2.521 4.697-1.158-0.353-2.268-0.815-3.319-1.375 1.575-1.602 3.587-2.774 5.84-3.322zM7.259 24.587c1.052-0.561 2.163-1.024 3.322-1.377 0.621 1.997 1.492 3.629 2.522 4.702-2.255-0.549-4.268-1.721-5.844-3.326zM18.855 27.922c1.036-1.075 1.911-2.712 2.535-4.721 1.17 0.355 2.29 0.82 3.351 1.387-1.586 1.614-3.614 2.791-5.886 3.334z" fill="#000000"> </path>
                        </g>
                    </svg></a></p>
        </div>
    </div>
    <div class="container">


        <h3>Tus publicaciones:</h3>

        <?php if (!empty($posts)) : ?>
            <?php foreach ($posts as $post) : ?>
                <div class="post">
                    <h4><?php echo htmlspecialchars($post['title']); ?></h4>
                    <?php if ($post['image_path']) : ?>
                        <?php
                        // Obtener el nombre del archivo de la imagen
                        $image_filename = basename($post['image_path']);

                        // Agregar el prefijo al nombre del archivo para la miniatura
                        $thumbnail_filename = 'thumb_' . $image_filename;

                        // Ruta completa de la miniatura
                        $thumbnail_path = '../../Public/thumb/' . $thumbnail_filename;
                        // Ruta completa de la original
                        $thumbnail_path_original = '../../Public/uploads/' . $image_filename;
                        ?>
                        <img src="<?php echo htmlspecialchars($thumbnail_path_original); ?>" alt="Miniatura del post">
                    <?php endif; ?>
                    <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
                    <div class="post-info">
                        <p>Publicado el <?php echo htmlspecialchars($post['created_at']); ?></p>
                    </div>
                    <div class="footer-post">
                        <div class="actions">
                            <a href="#" class="action-link">Me Gusta</a>
                            <a href="#" class="action-link">Comentarios</a>
                            <!-- <a href="#" class="action-link">Enviar</a>
                            <a href="#" class="action-link">Compartir</a> -->
                        </div>
                    </div>
                    <style>


                        .footer-post {
                            padding: 10px 15px;
                            border-top: 1px solid #e1e1e1;
                            background-color: #f9f9f9;
                            display: flex;
                            justify-content: space-between;
                            align-items: center;
                            margin-top: 10px;
                        }

                        .post{
                            background-color: #d1d1d1;
                        }

                        .actions {
                            display: flex;
                            justify-content: space-around;
                            width: 100%;
                        }

                        .action-link {
                            text-decoration: none;
                            color: #4267B2;
                            font-weight: bold;
                            padding: 10px 15px;
                            transition: background-color 0.3s, color 0.3s;
                            flex-grow: 1;
                            text-align: center;
                        }

                        .action-link:hover {
                            background-color: #e1e1e1;
                            color: #29487d;
                            border-radius: 5px;
                        }

                        .action-link:active {
                            background-color: #d1d1d1;
                        }

                        .actions .action-link:not(:last-child) {
                            border-right: 1px solid #e1e1e1;
                        }
                    </style>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No has realizado ninguna publicación aún.</p>
        <?php endif; ?>
    </div>
</body>

</html>