<?php

require_once '../models/Comment.php';

class CommentController {
    public function addComment() {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            echo json_encode(['success' => false, 'message' => 'Usuario no autenticado']);
            exit();
        }

        $user_id = $_SESSION['user_id'];
        $post_id = $_POST['post_id'];
        $content = $_POST['content'];

        $commentModel = new Comment();
        $result = $commentModel->addComment($user_id, $post_id, $content);

        if ($result) {
            $comments_count = $commentModel->getCommentsCount($post_id);
            echo json_encode(['success' => true, 'comments_count' => $comments_count, 'comment_id' => $result]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al agregar comentario']);
        }
    }

    public function deleteComment() {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            echo json_encode(['success' => false, 'message' => 'Usuario no autenticado']);
            exit();
        }

        $user_id = $_SESSION['user_id'];
        $comment_id = $_POST['comment_id'];

        $commentModel = new Comment();
        $result = $commentModel->deleteComment($comment_id);

        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al eliminar comentario']);
        }
    }
}

// Manejo de rutas
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_GET['action'] === 'addComment') {
        (new CommentController())->addComment();
    } elseif ($_GET['action'] === 'deleteComment') {
        (new CommentController())->deleteComment();
    }
}
?>
