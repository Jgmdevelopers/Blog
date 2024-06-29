<?php

class Like
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function likePost($userId, $postId)
    {
        $this->db->query('INSERT INTO likes (user_id, post_id) VALUES (:user_id, :post_id)');
        $this->db->bind(':user_id', $userId);
        $this->db->bind(':post_id', $postId);
        return $this->db->execute();
    }

    public function unlikePost($userId, $postId)
    {
        $this->db->query('DELETE FROM likes WHERE user_id = :user_id AND post_id = :post_id');
        $this->db->bind(':user_id', $userId);
        $this->db->bind(':post_id', $postId);
        return $this->db->execute();
    }

    public function getLikesCount($postId)
    {
        $this->db->query('SELECT COUNT(*) as count FROM likes WHERE post_id = :post_id');
        $this->db->bind(':post_id', $postId);
        $result = $this->db->singleObject();
        return $result ? $result->count : 0;
    }

    public function userLikedPost($userId, $postId)
    {
        $this->db->query('SELECT * FROM likes WHERE user_id = :user_id AND post_id = :post_id');
        $this->db->bind(':user_id', $userId);
        $this->db->bind(':post_id', $postId);
        return $this->db->singleObject() ? true : false;
    }
}
