<?php
require_once '../core/Database.php';// Asegúrate de incluir la clase Database o la manera en que manejas la conexión

class Friendship {
    
    private $db;

    public function __construct() {
        $this->db = new Database(); // Instancia de la clase Database para la conexión
    }

    // Método para agregar una solicitud de amistad
    public function addFriendRequest($user_id, $friend_id) {
        $this->db->query('INSERT INTO friendships (user_id, friend_id, status) VALUES (:user_id, :friend_id, :status)');
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':friend_id', $friend_id);
        $this->db->bind(':status', 'pending');
    
        return $this->db->execute();
    }

    // Método para aceptar una solicitud de amistad
    public function acceptFriendRequest($user_id, $friend_id) {
        $query = "UPDATE friendships SET status = 'accepted' WHERE user_id = ? AND friend_id = ?";
        $this->db->query($query);
        $this->db->bind(1, $friend_id);
        $this->db->bind(2, $user_id);

        return $this->db->execute();
    }

    // Método para verificar si dos usuarios son amigos
    public function areFriends($user_id, $friend_id) {
        $query = "SELECT * FROM friendships WHERE (user_id = ? AND friend_id = ? AND status = 'accepted') OR (user_id = ? AND friend_id = ? AND status = 'accepted')";
        $this->db->query($query);
        $this->db->bind(1, $user_id);
        $this->db->bind(2, $friend_id);
        $this->db->bind(3, $friend_id);
        $this->db->bind(4, $user_id);

        return $this->db->single() ? true : false;
    }

     // Método para bloquear a un amigo
     public function blockFriend($user_id, $friend_id) {
        $query = "UPDATE friendships SET status = 'blocked' WHERE (user_id = ? AND friend_id = ?) OR (user_id = ? AND friend_id = ?)";
        $this->db->query($query);
        $this->db->bind(1, $user_id);
        $this->db->bind(2, $friend_id);
        $this->db->bind(3, $friend_id);
        $this->db->bind(4, $user_id);

        return $this->db->execute();
    }
}
