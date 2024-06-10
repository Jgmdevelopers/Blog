<?php
class PostController {
    public function addPost() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Procesar datos del formulario de agregar publicación
            $title = $_POST['title'];
            $content = $_POST['content'];
            $user_id = $_SESSION['user_id']; // Obtener el ID del usuario de la sesión

            // Validar y agregar publicación
            $postModel = new Post();
            if ($postModel->addPost($title, $content, $user_id)) {
                // Publicación agregada correctamente
            } else {
                // Error al agregar publicación
            }
        } else {
            // Mostrar formulario de agregar publicación
            include_once '../app/views/add_post.php';
        }
    }

    // Otros métodos como editar, eliminar publicaciones, etc.
}
