<?php
require_once '../App/Models/Like.php';
require_once '../App/Models/Comment.php';
class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Método para obtener todas las publicaciones del usuario autenticado
    public function getAllPostsPrivate($user_id)
    {
        $query = 'SELECT * FROM posts WHERE user_id = :user_id AND is_active = 1 ORDER BY created_at DESC';
        $this->db->query($query);
        $this->db->bind(':user_id', $user_id);
        return $this->db->resultSet();
    }

    // Método para obtener todas las publicaciones de los amigos

    public function getAllPostsFriends($user_id)
    {
        $query = '
        SELECT DISTINCT p.*, u.username
        FROM posts p
        JOIN users u ON p.user_id = u.id
        WHERE (
            p.user_id IN (
                SELECT friend_id
                FROM friendships
                WHERE user_id = :user_id
                AND status = "accepted"
            )
            OR p.user_id IN (
                SELECT user_id
                FROM friendships
                WHERE friend_id = :user_id
                AND status = "accepted"
            )
        )
        AND (p.visibility = "public" OR p.visibility = "friends")
        AND p.is_active = 1
        ORDER BY p.created_at DESC
        ';
        $this->db->query($query);
        $this->db->bind(':user_id', $user_id);
        return $this->db->resultSet();
    }
    
    



    // Método para obtener todas las publicaciones al muro público
    public function getAllPublicPosts() {
        $this->db->query('
            SELECT posts.*, users.username 
            FROM posts 
            JOIN users ON posts.user_id = users.id 
            WHERE posts.visibility = "public" AND posts.is_active = 1
            ORDER BY posts.created_at DESC
        ');
        return $this->db->resultSet();
    }
    // Método para obtener publicaciones globales considerando la visibilidad y la amistad
    public function getPostGlobal($user_id)
    {
        $this->db->query('
            SELECT p.*, u.username 
            FROM posts p
            LEFT JOIN friendships f ON p.user_id = f.friend_id AND f.user_id = :user_id
            LEFT JOIN users u ON p.user_id = u.id
            WHERE (p.visibility = "public" AND p.is_active = 1)
                OR (p.visibility = "friends" AND p.is_active = 1 AND p.user_id IN (SELECT friend_id FROM friendships WHERE user_id = :user_id))
                OR (p.visibility = "friends" AND p.is_active = 1 AND p.user_id IN (SELECT user_id FROM friendships WHERE friend_id = :user_id))
                OR (p.visibility = "private" AND p.is_active = 1 AND p.user_id = :user_id)
            ORDER BY p.created_at DESC
        ');

        $this->db->bind(':user_id', $user_id);

        return $this->db->resultSet();
    }

    // Método para obtener una publicación por su ID
    public function getPostById($id)
    {
        $this->db->query('SELECT * FROM posts WHERE id = :id AND is_active = 1');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
    // Método para actualizar un post
    public function updatePost($postId, $title, $content, $userId, $originalImagePath, $thumbnailPath, $visibility)
    {
        $this->db->query('UPDATE posts SET title = :title, content = :content, user_id = :user_id, image_path = :image_path, thumbnail_path = :thumbnail_path, visibility = :visibility WHERE id = :id');
        $this->db->bind(':id', $postId);
        $this->db->bind(':title', $title);
        $this->db->bind(':content', $content);
        $this->db->bind(':user_id', $userId);
        $this->db->bind(':image_path', $originalImagePath);
        $this->db->bind(':thumbnail_path', $thumbnailPath);
        $this->db->bind(':visibility', $visibility);
        return $this->db->execute();
    }

    // Método para eliminar un post
    // Método para realizar un borrado lógico del post
    public function deletePost($postId)
    {
        $this->db->query('UPDATE posts SET is_active = 0 WHERE id = :id');
        $this->db->bind(':id', $postId);
        return $this->db->execute();
    }

    // Método para agregar una nueva publicación
    public function addPost($title, $content, $user_id, $original_image_path, $thumbnail_path, $visibility)
    {
        $this->db->query('
            INSERT INTO posts (title, content, user_id, image_path, thumbnail_path, visibility) 
            VALUES (:title, :content, :user_id, :image_path, :thumbnail_path, :visibility)
        ');
        $this->db->bind(':title', $title);
        $this->db->bind(':content', $content);
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':image_path', $original_image_path);
        $this->db->bind(':thumbnail_path', $thumbnail_path);
        $this->db->bind(':visibility', $visibility);

        return $this->db->execute();
    }

    // Método para obtener la cantidad de "Me gusta"
    public function getLikesCount($postId)
    {
        $likeModel = new Like();
        return $likeModel->getLikesCount($postId);
    }

    // Método para obtener la cantidad de comentarios
    public function getCommentsCount($postId)
    {
        $commentModel = new Comment();
        return $commentModel->getCommentsCount($postId);
    }

    public function getComments($postId)
    {
        $commentModel = new Comment();
        return $commentModel->getComments($postId);
    }
    // Método para obtener información adicional de amigo sobre los posts
    public function getPostsWithFriendInfo($user_id)
    {
        $this->db->query('
            SELECT p.*, u.username,
            CASE 
                WHEN p.user_id = :user_id THEN true 
                WHEN f.friend_id IS NOT NULL THEN true 
                ELSE false 
            END as is_friend
            FROM posts p
            LEFT JOIN friendships f ON (p.user_id = f.friend_id AND f.user_id = :user_id AND f.status = "accepted")
            LEFT JOIN users u ON p.user_id = u.id
            WHERE (p.visibility = "public"
                OR (p.visibility = "friends" AND p.user_id IN (SELECT friend_id FROM friendships WHERE user_id = :user_id AND status = "accepted"))
                OR (p.visibility = "friends" AND p.user_id IN (SELECT user_id FROM friendships WHERE friend_id = :user_id AND status = "accepted"))
                OR (p.visibility = "private" AND p.user_id = :user_id))
                AND p.is_active = 1
            ORDER BY p.created_at DESC
        ');

        $this->db->bind(':user_id', $user_id);

        return $this->db->resultSet();
    }


    // Método para actualizar la visibilidad de un post
    public function updateVisibility($postId, $newVisibility)
    {
        $this->db->query('UPDATE posts SET visibility = :visibility WHERE id = :id');
        $this->db->bind(':visibility', $newVisibility);
        $this->db->bind(':id', $postId);
        return $this->db->execute();
    }
}
