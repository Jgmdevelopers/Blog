<?php

class Comment
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addComment($userId, $postId, $content)
    {
        $this->db->query('INSERT INTO comments (user_id, post_id, content) VALUES (:user_id, :post_id, :content)');
        $this->db->bind(':user_id', $userId);
        $this->db->bind(':post_id', $postId);
        $this->db->bind(':content', $content);
        return $this->db->execute();
    }

    public function deleteComment($commentId, $userId)
    {
        // Obtener el comentario para verificar la propiedad
        $this->db->query('SELECT * FROM comments WHERE id = :id');
        $this->db->bind(':id', $commentId);
        $comment = $this->db->single();
    
        if (!$comment) {
            return false; // El comentario no existe
        }
    
        // Obtener el propietario del post
        $this->db->query('SELECT user_id FROM posts WHERE id = :post_id');
        $this->db->bind(':post_id', $comment['post_id']);
        $postOwner = $this->db->single();
    
        // Verificar si el usuario es el dueño del comentario o del post
        if ($comment['user_id'] == $userId || $postOwner['user_id'] == $userId) {
            $this->db->query('UPDATE comments SET deleted_at = NOW() WHERE id = :id');
            $this->db->bind(':id', $commentId);
            return $this->db->execute();
        } else {
            return false; // El usuario no tiene permisos para eliminar el comentario
        }
    }
    public function getComments($postId)
    {
        $this->db->query('SELECT comments.*, users.username FROM comments JOIN users ON comments.user_id = users.id WHERE post_id = :post_id AND deleted_at IS NULL ORDER BY created_at DESC');
        $this->db->bind(':post_id', $postId);
        return $this->db->resultSet();
    }


    public function getCommentsCount($postId)
    {
        $this->db->query('SELECT COUNT(*) as count FROM comments WHERE post_id = :post_id AND deleted_at IS NULL');
        $this->db->bind(':post_id', $postId);
        $result = $this->db->singleObject();
        return $result ? $result->count : 0;
    }

  

    public function getMoreComments($postId, $offset, $limit = 10)
    {
        $this->db->query('SELECT * FROM comments WHERE post_id = :post_id AND deleted_at IS NULL ORDER BY created_at DESC LIMIT :offset, :limit');
        $this->db->bind(':post_id', $postId);
        $this->db->bind(':offset', $offset, PDO::PARAM_INT);
        $this->db->bind(':limit', $limit, PDO::PARAM_INT);
        return $this->db->resultSet();
    }

    public function getUsernameById($userId)
    {
        $this->db->query('SELECT username FROM users WHERE id = :id');
        $this->db->bind(':id', $userId);
        $result = $this->db->singleObject();
        return $result ? $result->username : 'Unknown';
    }

    // Obtener el último comentario de un post
    public function getLastComment($postId)
    {
        $this->db->query('SELECT * FROM comments WHERE post_id = :post_id ORDER BY created_at DESC LIMIT 1');
        $this->db->bind(':post_id', $postId);
        return $this->db->single();
    }
  
}
