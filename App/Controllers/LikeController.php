<?php

require_once '../app/models/Like.php';

class LikeController
{
    private $likeModel;

    public function __construct()
    {
        $this->likeModel = new Like();
    }

    public function toggleLike()
    {
        session_start();

        // Verificar que el usuario esté autenticado
        if (!isset($_SESSION['user_id'])) {
            header('Location: ../auth/login.php');
            exit();
        }

        $userId = $_SESSION['user_id'];
        $postId = $_GET['post_id'];

        // Verificar si el usuario ya ha dado "like" al post
        if ($this->likeModel->userLikedPost($userId, $postId)) {
            // Si ya ha dado "like", quitar "like"
            $this->likeModel->unlikePost($userId, $postId);
        } else {
            // Si no ha dado "like", agregar "like"
            $this->likeModel->likePost($userId, $postId);
        }

        // Redirigir de vuelta a la página de perfil
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
}
