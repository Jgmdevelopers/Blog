<?php
require_once '../App/Models/Post.php';

class PostController {

    public function store() {
        session_start(); // Asegúrate de iniciar la sesión aquí

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Procesar datos del formulario de agregar publicación
            $title = $_POST['title'];
            $content = $_POST['content'];
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
                            list($width, $height) = getimagesize($original_image_path);
                            $new_width = 100; // Ancho deseado para la miniatura
                            $new_height = ($height / $width) * $new_width;
                            $thumb = imagecreatetruecolor($new_width, $new_height);
                            $source = imagecreatefromjpeg($original_image_path); // Cambia a la función correspondiente si no es JPEG
                            
                            // Comprobar la extensión y crear la miniatura adecuadamente
                            if ($image_extension == 'jpg' || $image_extension == 'jpeg') {
                                $source = imagecreatefromjpeg($original_image_path);
                            } elseif ($image_extension == 'png') {
                                $source = imagecreatefrompng($original_image_path);
                            }
                            
                            imagecopyresampled($thumb, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        
                            // Guardar miniatura
                            imagejpeg($thumb, $thumbnail_file);
                            imagedestroy($thumb);
        
                            // La ruta de la miniatura debe ser relativa a la carpeta Public
                            $thumbnail_path = substr($thumbnail_file, 3); // Elimina '../' del principio
                        } else {
                            // Error al mover el archivo
                            echo "Error al subir la imagen.";
                        }
                    } else {
                        echo "El archivo no es una imagen válida.";
                    }
                } else {
                    echo "Solo se permiten imágenes de tipo JPG, JPEG y PNG.";
                }
            }
        
            // Validar y agregar publicación
            $postModel = new Post();
        
            if ($postModel->addPost($title, $content, $user_id, $original_image_path, $thumbnail_path)) {
                // Publicación agregada correctamente
                header("Location: ../dashboard");
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
}
?>
