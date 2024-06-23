<?php
require_once '../App/Models/Friendship.php';

class AmigosController {

    public function agregarAmigo($friend_id) {
        session_start();

        // Verificar si el usuario ha iniciado sesión y obtener su ID
        if (!isset($_SESSION['user_id'])) {
            header('Location: ../Auth/login');
            exit();
        }
        $userId = $_SESSION['user_id'];

        // Obtén el ID del amigo de los parámetros del método
        $friendId = $_GET['friend_id'];

        // Instancia del modelo Friendship
        $friendshipModel = new Friendship();

        // Verificar si ya existe una solicitud de amistad pendiente o amistad aceptada
        if ($friendshipModel->areFriends($userId, $friendId)) {
            
            // Si ya son amigos, redirige o muestra mensaje de error
            header('Location: ../dashboard/index');
            exit();
        } else {
           
            // Agregar una nueva solicitud de amistad
            if ($friendshipModel->addFriendRequest($userId, $friendId)) {
                // Solicitud de amistad enviada con éxito
                header('Location: ../post/PostsGlobal');
                exit();
            } else {
                // Error al enviar la solicitud de amistad
                echo "Error al enviar la solicitud de amistad.";
            }
        }
    }

    public function bloquearUsuario($friend_id) {
        session_start();

        // Verificar si el usuario ha iniciado sesión y obtener su ID
        if (!isset($_SESSION['user_id'])) {
            header('Location: ../Auth/login');
            exit();
        }
        $userId = $_SESSION['user_id'];

        // Obtén el ID del amigo de los parámetros del método
        $friendId = $friend_id;

        // Instancia del modelo Friendship
        $friendshipModel = new Friendship();
        

        // Verificar si existe una relación de amistad para bloquear
        if ($friendshipModel->areFriends($userId, $friendId)) {
            // Bloquear al usuario
            if ($friendshipModel->blockFriend($userId, $friendId)) {
                // Usuario bloqueado con éxito
                header('Location: ../dashboard/index');
                exit();
            } else {
                // Error al bloquear al usuario
                echo "Error al bloquear al usuario.";
            }
        } else {
            // No se encontró una relación de amistad válida para bloquear
            header('Location: ../dashboard/index');
            exit();
        }
    }

}
?>
