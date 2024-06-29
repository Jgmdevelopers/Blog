<?php

require_once '../app/models/Comment.php';
require_once '../utils.php';

class CommentController
{
    private $commentModel;

    public function __construct()
    {
        $this->commentModel = new Comment();
    }
 
    /* cargar mas comentarios */
    public function loadMoreComments()
    {
        if (!isset($_GET['post_id']) || !isset($_GET['offset'])) {
            echo json_encode([]);
            return;
        }

        $postId = $_GET['post_id'];
        $offset = $_GET['offset'];

        $comments = $this->commentModel->getMoreComments($postId, $offset);

        foreach ($comments as &$comment) {
            $comment['username'] = $this->commentModel->getUsernameById($comment['user_id']);
        }

        echo json_encode($comments);
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
    
        // Obtener el ID del usuario y del comentario
        $userId = $_SESSION['user_id'];
        $commentId = $_GET['comment_id'];
    
        $commentModel = new Comment();
        $result = $commentModel->deleteComment($commentId, $userId);
    
        if ($result) {
            // Redirigir a la página anterior con un mensaje de éxito
            $_SESSION['message'] = 'Comentario eliminado correctamente.';
        } else {
            // Redirigir a la página anterior con un mensaje de error
            $_SESSION['message'] = 'No tienes permisos para eliminar este comentario.';
        }
    
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
    
}
