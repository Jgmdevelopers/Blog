<?php
class Post {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Método para obtener todas las publicaciones
    public function getAllPosts() {
        $this->db->query('SELECT * FROM posts');
        return $this->db->resultSet();
    }

    // Método para obtener una publicación por su ID
    public function getPostById($id) {
        $this->db->query('SELECT * FROM posts WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    // Método para agregar una publicación
    public function addPost($title, $content, $user_id, $image_path = null) {
        $this->db->query('INSERT INTO posts (title, content, user_id, image_path) VALUES (:title, :content, :user_id, :image_path)');
        $this->db->bind(':title', $title);
        $this->db->bind(':content', $content);
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':image_path', $image_path);

        return $this->db->execute();
    }
    // Otros métodos para actualizar, eliminar publicaciones, etc., según sea necesario
}
