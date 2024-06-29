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

    public function deleteComment($commentId)
    {
        $this->db->query('UPDATE comments SET deleted_at = NOW() WHERE id = :id');
        $this->db->bind(':id', $commentId);
        return $this->db->execute();
    }

    public function getComments($postId)
    {
        $this->db->query('SELECT * FROM comments WHERE post_id = :post_id AND deleted_at IS NULL ORDER BY created_at DESC');
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
}
