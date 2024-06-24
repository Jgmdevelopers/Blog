<?php
require_once '../core/Database.php'; // Asegúrate de incluir la clase Database o la manera en que manejas la conexión

class Friendship
{

    private $db;

    public function __construct()
    {
        $this->db = new Database(); // Instancia de la clase Database para la conexión
    }

    // Método para agregar una solicitud de amistad
    public function addFriendRequest($user_id, $friend_id)
    {
        $this->db->query('INSERT INTO friendships (user_id, friend_id, status) VALUES (:user_id, :friend_id, :status)');
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':friend_id', $friend_id);
        $this->db->bind(':status', 'pending');

        return $this->db->execute();
    }

    // Método para aceptar una solicitud de amistad
    public function acceptFriendRequest($user_id, $friend_id)
    {
        $query = "UPDATE friendships SET status = 'accepted' WHERE user_id = ? AND friend_id = ?";
        $this->db->query($query);
        $this->db->bind(1, $friend_id);
        $this->db->bind(2, $user_id);

        return $this->db->execute();
    }

    // Método para verificar si dos usuarios son amigos
    public function areFriends($user_id, $friend_id)
    {
        $query = "SELECT * FROM friendships WHERE (user_id = ? AND friend_id = ? AND status = 'accepted') OR (user_id = ? AND friend_id = ? AND status = 'accepted')";
        $this->db->query($query);
        $this->db->bind(1, $user_id);
        $this->db->bind(2, $friend_id);
        $this->db->bind(3, $friend_id);
        $this->db->bind(4, $user_id);

        return $this->db->single() ? true : false;
    }

    // Método para bloquear a un amigo
    public function blockFriend($user_id, $friend_id)
    {
        $query = "UPDATE friendships SET status = 'blocked' WHERE (user_id = ? AND friend_id = ?) OR (user_id = ? AND friend_id = ?)";
        $this->db->query($query);
        $this->db->bind(1, $user_id);
        $this->db->bind(2, $friend_id);
        $this->db->bind(3, $friend_id);
        $this->db->bind(4, $user_id);

        return $this->db->execute();
    }

    public function getFriendshipStatus($userId, $friendId)
    {
        $query = 'SELECT status FROM friendships WHERE (user_id = :userId AND friend_id = :friendId) OR (user_id = :friendId AND friend_id = :userId)';
        $this->db->query($query);
        $this->db->bind(':userId', $userId);
        $this->db->bind(':friendId', $friendId);
        $row = $this->db->single();
        return $row ? $row['status'] : ''; // Devuelve el estado de amistad si existe, de lo contrario devuelve vacío
    }

    // metodo para obtener las solicitudes de amistad pendientes
    public function getPendingRequests($userId)
    {
        $query = '
            SELECT f.*, u.username 
            FROM friendships f
            JOIN users u ON u.id = f.user_id
            WHERE f.friend_id = :userId AND f.status = "pending"
            UNION
            SELECT f.*, u.username 
            FROM friendships f
            JOIN users u ON u.id = f.friend_id
            WHERE f.user_id = :userId AND f.status = "pending"
        ';
        $this->db->query($query);
        $this->db->bind(':userId', $userId);
        return $this->db->resultSet();
    }

    public function rejectFriendRequest($user_id, $friend_id)
    {
        $query = "
            UPDATE friendships 
            SET status = 'rejected' 
            WHERE 
                ((user_id = :user_id AND friend_id = :friend_id) OR (user_id = :friend_id AND friend_id = :user_id)) 
                AND status = 'pending'
        ";
        $this->db->query($query);
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':friend_id', $friend_id);
        $this->db->bind(':reverse_user_id', $friend_id); // Parámetro adicional para el usuario inverso
        $this->db->bind(':reverse_friend_id', $user_id); // Parámetro adicional para el amigo inverso
        return $this->db->execute();
    }


    // método en la clase Friendship para cambiar el estado de la relación de amistad
    public function changeFriendshipStatus($user_id, $friend_id, $status)
    {
        $query = "UPDATE friendships SET status = :status WHERE ((user_id = :user_id AND friend_id = :friend_id) OR (user_id = :friend_id AND friend_id = :user_id))";
        $this->db->query($query);
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':friend_id', $friend_id);
        $this->db->bind(':status', $status);
        return $this->db->execute();
    }

    // recuperar amigos aceptados:
    public function getAcceptedFriends($user_id) {
        $query = "SELECT u.id, u.username FROM users u INNER JOIN friendships f ON u.id = f.friend_id WHERE f.user_id = :user_id AND f.status = 'accepted'";
        $this->db->query($query);
        $this->db->bind(':user_id', $user_id);
        return $this->db->resultSet();
    }
    
}
