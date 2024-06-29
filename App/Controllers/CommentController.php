<?php

require_once '../app/models/Comment.php';

class CommentController
{
    private $commentModel;

    public function __construct()
    {
        $this->commentModel = new Comment();
    }

    public function addComment()
    {
        session_start();

        // Verificar que el usuario esté autenticado
        if (!isset($_SESSION['user_id'])) {
            header('Location: ../auth/login.php');
            exit();
        }

        $userId = $_SESSION['user_id'];
        $postId = $_POST['post_id'];
        $content = $_POST['content'];

        // Agregar el comentario
        $this->commentModel->addComment($userId, $postId, $content);

        // Redirigir de vuelta a la página de perfil
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

    public function deleteComment()
    {
        session_start();

        // Verificar que el usuario esté autenticado
        if (!isset($_SESSION['user_id'])) {
            header('Location: ../auth/login.php');
            exit();
        }

        $commentId = $_GET['comment_id'];

        // Eliminar el comentario
        $this->commentModel->deleteComment($commentId);

        // Redirigir de vuelta a la página de perfil
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
}
