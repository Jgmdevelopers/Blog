<?php

// Importar la clase User
require_once '../App/Models/User.php';

class configController
{
    public function __construct() {
        // Iniciar la sesión y verificar si el usuario está autenticado
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . PUBLIC_PATH . "Auth/loginForm");
            exit();
        }
    }

    public function profile()
    {
        
        // Método para mostrar el formulario de inicio de sesión
        include_once '../App/Views/auth/configProfile.php';
    }

    public function updatePassword() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['user_id'];
            $currentPassword = $_POST['current_password'];
            $newPassword = $_POST['new_password'];

            $userModel = new User();
            $user = $userModel->getUserById($userId);

            if (password_verify($currentPassword, $user['password'])) {
                // Verificar si la nueva contraseña no es igual a la actual
                if (password_verify($newPassword, $user['password'])) {
                    $_SESSION['error'] = "La nueva contraseña no puede ser igual a la actual.";
                    header("Location: " . PUBLIC_PATH . "config/profile");
                    exit();
                }

                // Actualizar la contraseña
                $userModel->updatePassword($userId, $newPassword);
                $_SESSION['success_message'] = "Contraseña actualizada correctamente.";
            } else {
                $_SESSION['error_message'] = "La contraseña actual es incorrecta.";
            }
            header("Location: " . PUBLIC_PATH . "config/profile");
            exit();
        }
    }
    
}
