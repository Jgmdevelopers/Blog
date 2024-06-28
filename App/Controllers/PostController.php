<?php
require_once '../App/Models/Post.php';
require_once '../App/Models/User.php';
require_once '../App/Models/Friendship.php';

class PostController
{

    public function store()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Procesar datos del formulario de agregar publicación
            $title = $_POST['title'];
            $content = $_POST['content'];
            $visibility = $_POST['visibility']; // Obtener la visibilidad del formulario
            $user_id = $_SESSION['user_id']; // Obtener el ID del usuario de la sesión

            $original_image_path = null;
            $thumbnail_path = null;

            // Manejo de la carga de la imagen
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $target_dir = "../Public/uploads/";
                $thumbnail_dir = "../Public/thumb/";

                $image_name = basename($_FILES["image"]["name"]);
                $image_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION)); // Obtener la extensión del archivo y convertirla a minúsculas

                $allowed_extensions = array('jpg', 'jpeg', 'png');

                // Verificar si el archivo tiene una extensión permitida
                if (in_array($image_extension, $allowed_extensions)) {
                    $timestamp = time(); // Timestamp actual

                    // Generar un nombre de archivo único utilizando el timestamp y una parte del nombre original
                    $image_name_unique = $timestamp . '_' . uniqid() . '.' . $image_extension;
                    $thumbnail_name_unique = 'thumb_' . $image_name_unique; // Nombre para la miniatura

                    $target_file = $target_dir . $image_name_unique;
                    $thumbnail_file = $thumbnail_dir . $thumbnail_name_unique;

                    // Verificar si el archivo es una imagen real
                    $check = getimagesize($_FILES["image"]["tmp_name"]);

                    if ($check !== false) {
                        // Mover el archivo a la carpeta de destino
                        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                            $original_image_path = $target_file;

                            // Crear miniatura
                            $source = null;
                            if ($image_extension == 'jpg' || $image_extension == 'jpeg') {
                                $source = imagecreatefromjpeg($original_image_path);
                            } elseif ($image_extension == 'png') {
                                $source = imagecreatefrompng($original_image_path);
                            }

                            if ($source !== null) {
                                list($width, $height) = getimagesize($original_image_path);
                                $new_width = 100; // Ancho deseado para la miniatura
                                $new_height = ($height / $width) * $new_width;
                                $thumb = imagecreatetruecolor($new_width, $new_height);

                                // Comprobar si la miniatura se creó correctamente
                                if ($thumb !== false) {
                                    imagecopyresampled($thumb, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

                                    // Guardar miniatura
                                    imagejpeg($thumb, $thumbnail_file);
                                    imagedestroy($thumb);

                                    // La ruta de la miniatura debe ser relativa a la carpeta Public
                                    $thumbnail_path = substr($thumbnail_file, 3); // Elimina '../' del principio
                                } else {
                                    echo "Error al crear la miniatura.";
                                    exit();
                                }
                            } else {
                                echo "Error al crear la imagen desde el archivo.";
                                exit();
                            }
                        } else {
                            // Error al mover el archivo
                            echo "Error al subir la imagen.";
                            exit();
                        }
                    } else {
                        echo "El archivo no es una imagen válida.";
                        exit();
                    }
                } else {
                    echo "Solo se permiten imágenes de tipo JPG, JPEG y PNG.";
                    exit();
                }
            }

            // Validar y agregar publicación
            $postModel = new Post();

            if ($postModel->addPost($title, $content, $user_id, $original_image_path, $thumbnail_path, $visibility)) {
                // Publicación agregada correctamente
                $_SESSION['success_message'] = "¡La publicación se agregó correctamente!";
                header("Location: " . PUBLIC_PATH . "Post/PostsProfile");

                exit();
            } else {
                // Error al agregar publicación
                echo "Error al agregar la publicación.";
            }
        } else {
            // Mostrar formulario de agregar publicación
            include_once '../app/views/add_post.php';
        }
    }

    public function PostsGlobal() {
        session_start();

        // Verificar que el usuario esté autenticado
        if (!isset($_SESSION['user_id'])) {
            header('Location: ../auth/login.php');
            exit();
        }

        // Obtener el ID del usuario
        $user_id = $_SESSION['user_id'];

        // Obtener información sobre publicaciones y amigos con estados de amistad
        $postModel = new Post();
        $posts = $postModel->getPostsWithFriendInfo($user_id);

        // Obtener todos los usuarios excepto el usuario actual
        $userModel = new User();
        $users = $userModel->getAllUsersExcept($user_id);

        // Filtrar usuarios para excluir amigos y el usuario actual
        $filteredUsers = [];
    
        // Consultar el estado de amistad para cada usuario
        $friendshipModel = new Friendship();
        
        $availableUsers = [];
        foreach ($users as $user) {
            $friendshipStatus = $friendshipModel->getFriendshipStatus($user_id, $user['id']);
            if ($friendshipStatus === 'pending') {
                $user['estado_amistad'] = 'pendiente';
            } elseif ($friendshipStatus === 'accepted' || $friendshipStatus === 'blocked') {
                // No hacemos nada si está bloqueado
                continue;
            } else {
                $user['estado_amistad'] = 'disponible';
            }
            $availableUsers[] = $user;
        }
 

        // Mostrar publicaciones, amigos y usuarios en la vista
        include_once '../app/views/public_post.php';
    }
    public function PostsProfile()
    {
        session_start();

        // Verificar que el usuario esté autenticado
        if (!isset($_SESSION['user_id'])) {
            header('Location: ../auth/login.php');
            exit();
        }

        // Obtener el ID del usuario
        $user_id = $_SESSION['user_id'];

        // Validar y obtener publicaciones
        $postModel = new Post();
        $posts = $postModel->getAllPostsPrivate($user_id);

        // Instancia del modelo Friendship
        $friendshipModel = new Friendship();

        $acceptedFriends = $friendshipModel->getAcceptedFriends($user_id);


        // Obtener solicitudes de amistad pendientes
        $pendingRequests = $friendshipModel->getPendingRequests($user_id);

        // Mostrar publicaciones en la vista
        include_once '../app/views/profile.php';
    }

    /* Actualizar la visibilidad el post */
    public function changeVisibility()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $postId = $_POST['post_id'];
            $newVisibility = $_POST['visibility'];

            $postModel = new Post();
            if ($postModel->updateVisibility($postId, $newVisibility)) {
                // Redirigir o mostrar un mensaje de éxito
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit();
            } else {
                // Manejar error de actualización
                echo "Error al actualizar la visibilidad del post.";
            }
        }
    }

    public function edit() {
        // Verificar si el parámetro post_id está presente en la URL
        if (isset($_GET['post_id'])) {
            $postId = $_GET['post_id'];

            $postModel = new Post();
            $post = $postModel->getPostById($postId);

            if ($post) {
                require_once '../app/Views/edit_post.php';
            } else {
                // Manejar el caso cuando el post no se encuentra
                echo "Post no encontrado.";
            }
        } else {
            echo "ID de publicación no proporcionado.";
        }
    }
    public function update($id)
{
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Procesar datos del formulario de actualización de publicación
        $title = $_POST['title'];
        $content = $_POST['content'];
        $visibility = $_POST['visibility']; // Obtener la visibilidad del formulario
        $user_id = $_SESSION['user_id']; // Obtener el ID del usuario de la sesión
        $original_image_path = null;
        $thumbnail_path = null;

        // Manejo de la carga de la imagen si se proporciona una nueva
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $target_dir = "../Public/uploads/";
            $thumbnail_dir = "../Public/thumb/";

            $image_name = basename($_FILES["image"]["name"]);
            $image_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION)); // Obtener la extensión del archivo y convertirla a minúsculas

            $allowed_extensions = array('jpg', 'jpeg', 'png');

            // Verificar si el archivo tiene una extensión permitida
            if (in_array($image_extension, $allowed_extensions)) {
                $timestamp = time(); // Timestamp actual

                // Generar un nombre de archivo único utilizando el timestamp y una parte del nombre original
                $image_name_unique = $timestamp . '_' . uniqid() . '.' . $image_extension;
                $thumbnail_name_unique = 'thumb_' . $image_name_unique; // Nombre para la miniatura

                $target_file = $target_dir . $image_name_unique;
                $thumbnail_file = $thumbnail_dir . $thumbnail_name_unique;

                // Verificar si el archivo es una imagen real
                $check = getimagesize($_FILES["image"]["tmp_name"]);

                if ($check !== false) {
                    // Mover el archivo a la carpeta de destino
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        $original_image_path = $target_file;

                        // Crear miniatura
                        $source = null;
                        if ($image_extension == 'jpg' || $image_extension == 'jpeg') {
                            $source = imagecreatefromjpeg($original_image_path);
                        } elseif ($image_extension == 'png') {
                            $source = imagecreatefrompng($original_image_path);
                        }

                        if ($source !== null) {
                            list($width, $height) = getimagesize($original_image_path);
                            $new_width = 100; // Ancho deseado para la miniatura
                            $new_height = ($height / $width) * $new_width;
                            $thumb = imagecreatetruecolor($new_width, $new_height);

                            // Comprobar si la miniatura se creó correctamente
                            if ($thumb !== false) {
                                imagecopyresampled($thumb, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

                                // Guardar miniatura
                                imagejpeg($thumb, $thumbnail_file);
                                imagedestroy($thumb);

                                // La ruta de la miniatura debe ser relativa a la carpeta Public
                                $thumbnail_path = substr($thumbnail_file, 3); // Elimina '../' del principio
                            } else {
                                echo "Error al crear la miniatura.";
                                exit();
                            }
                        } else {
                            echo "Error al crear la imagen desde el archivo.";
                            exit();
                        }
                    } else {
                        // Error al mover el archivo
                        echo "Error al subir la imagen.";
                        exit();
                    }
                } else {
                    echo "El archivo no es una imagen válida.";
                    exit();
                }
            } else {
                echo "Solo se permiten imágenes de tipo JPG, JPEG y PNG.";
                exit();
            }
        }

        // Validar y actualizar publicación existente
        $postModel = new Post();

        if ($postModel->updatePost($id, $title, $content, $user_id, $original_image_path, $thumbnail_path, $visibility)) {
            // Publicación actualizada correctamente
            $_SESSION['success_message'] = "¡La publicación se actualizó correctamente!";
            header("Location: " . PUBLIC_PATH . "Post/PostsProfile");

            exit();
        } else {
            // Error al actualizar publicación
            echo "Error al actualizar la publicación.";
        }
    } else {
        // Obtener los datos actuales de la publicación para mostrar en el formulario de actualización
        $postModel = new Post();
        $post = $postModel->getPostById($id);

        if (!$post) {
            // Si no se encuentra la publicación
            echo "La publicación no existe.";
            exit();
        }

        // Mostrar formulario de actualización de publicación con los datos actuales
        include_once '../app/views/update_post.php';
    }
}

    // Método para eliminar el post
    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $postId = $_POST['post_id'];

            $postModel = new Post();
            $postModel->deletePost($postId);

            // Redirigir después de la eliminación
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
}
