<?php

require_once '../core/Database.php';

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Método para registrar un nuevo usuario
    public function register($username, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $this->db->query('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)');
        $this->db->bind(':username', $username);
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $hashedPassword);

        return $this->db->execute();
    }

    // Método para obtener información de usuario por nombre de usuario
    public function getUserByUsername($username)
    {
        $this->db->query('SELECT * FROM users WHERE username = :username');
        $this->db->bind(':username', $username);
        return $this->db->single();
    }

    // Método para verificar si un usuario ya existe con el mismo nombre de usuario o correo electrónico
    public function checkUserExists($username, $email)
    {
        $this->db->query('SELECT * FROM users WHERE username = :username OR email = :email');
        $this->db->bind(':username', $username);
        $this->db->bind(':email', $email);
        $this->db->execute();
        return $this->db->rowCount() > 0;
    }

    // Método para verificar las credenciales de inicio de sesión
    public function login($username, $password)
    {
        $user = $this->getUserByUsername($username);
        if ($user) {
            if (password_verify($password, $user['password'])) {
                return $user; // Usuario autenticado correctamente
            }
        }
        return false; // Usuario o contraseña incorrectos
    }


    public function getAllUsersExcept($userId)
    {
        $query = 'SELECT id, username FROM users WHERE id != :userId';
        $this->db->query($query);
        $this->db->bind(':userId', $userId);
        return $this->db->resultSet();
    }

    // Método para obtener información de usuario por ID
    public function getUserById($userId)
    {
        $this->db->query('SELECT * FROM users WHERE id = :userId');
        $this->db->bind(':userId', $userId);
        return $this->db->single();
    }

    // Método para actualizar la contraseña del usuario
    public function updatePassword($userId, $newPassword)
    {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $this->db->query('UPDATE users SET password = :password WHERE id = :userId');
        $this->db->bind(':password', $hashedPassword);
        $this->db->bind(':userId', $userId);

        return $this->db->execute();
    }
}
