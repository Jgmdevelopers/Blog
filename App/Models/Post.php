<?php
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
        $this->db->query('SELECT * FROM posts WHERE user_id = :user_id');
        $this->db->bind(':user_id', $user_id);
        return $this->db->resultSet();
    }

    // Método para obtener todas las publicaciones al muro publico
    public function getAllPublicPosts()
    {
        $this->db->query('
            SELECT * FROM posts 
            WHERE visibility = "public"
            ORDER BY created_at DESC
        ');
        return $this->db->resultSet();
    }

    public function getPostGlobal($user_id)
    {
        $this->db->query('
            SELECT posts.*, users.username 
            FROM posts 
            INNER JOIN users ON posts.user_id = users.id 
            WHERE posts.visibility = "public"
            OR (posts.visibility = "friends" AND posts.user_id IN 
                (SELECT friend_id FROM friends WHERE user_id = :user_id))
            OR (posts.visibility = "friends" AND posts.user_id IN 
                (SELECT user_id FROM friends WHERE friend_id = :user_id))
            OR (posts.visibility = "private" AND posts.user_id = :user_id)
            ORDER BY posts.created_at DESC');
        $this->db->bind(':user_id', $user_id);
        return $this->db->resultSet();
    }

    // Método para obtener una publicación por su ID
    public function getPostById($id)
    {
        $this->db->query('SELECT * FROM posts WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function addPost($title, $content, $user_id, $original_image_path, $thumbnail_path, $visibility)
    {
        $this->db->query('INSERT INTO posts (title, content, user_id, image_path, thumbnail_path, visibility) VALUES (:title, :content, :user_id, :image_path, :thumbnail_path, :visibility)');
        $this->db->bind(':title', $title);
        $this->db->bind(':content', $content);
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':image_path', $original_image_path);
        $this->db->bind(':thumbnail_path', $thumbnail_path);
        $this->db->bind(':visibility', $visibility);

        return $this->db->execute();
    }
    // Otros métodos para actualizar, eliminar publicaciones, etc., según sea necesario
}
