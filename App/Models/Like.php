<?php
class Like {
    private $db;
    private $table_name = "likes";

    public $id;
    public $post_id;
    public $user_id;
    public $created_at;

    public function __construct($db) {
        $this->db = $db;
    }

    // Insertar un nuevo like
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (post_id, user_id, created_at) VALUES (:post_id, :user_id, NOW())";
        
        $this->db->query($query);
        $this->db->bind(":post_id", htmlspecialchars(strip_tags($this->post_id)));
        $this->db->bind(":user_id", htmlspecialchars(strip_tags($this->user_id)));

        return $this->db->execute();
    }

    // Verificar si el usuario ya ha dado like a este post
    public function userHasLiked() {
        $query = "SELECT id FROM " . $this->table_name . " WHERE post_id = :post_id AND user_id = :user_id";

        $this->db->query($query);
        $this->db->bind(":post_id", htmlspecialchars(strip_tags($this->post_id)));
        $this->db->bind(":user_id", htmlspecialchars(strip_tags($this->user_id)));

        $this->db->execute();

        return $this->db->rowCount() > 0;
    }

    // Obtener el número de likes para un post
    public function countLikes() {
        $query = "SELECT COUNT(*) as likes FROM " . $this->table_name . " WHERE post_id = :post_id";

        $this->db->query($query);
        $this->db->bind(":post_id", htmlspecialchars(strip_tags($this->post_id)));

        $row = $this->db->single();

        return $row['likes'];
    }
}