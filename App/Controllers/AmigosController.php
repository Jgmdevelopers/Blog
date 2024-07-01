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
    
        // Instancia del modelo Friendship
        $friendshipModel = new Friendship();
    
        // Verificar si ya existe una solicitud de amistad pendiente o amistad aceptada
        if ($friendshipModel->areFriends($userId, $friend_id)) {
            // Si ya son amigos, redirige o muestra mensaje de error
            header('Location: ../dashboard/index');
            exit();
        } else {
            // Verificar si la solicitud de amistad anterior fue rechazada o está pendiente
            $status = $friendshipModel->getFriendshipStatus($userId, $friend_id);
            if ($status === 'pending') {
                // Si la solicitud está pendiente, mostrar un mensaje de error o redirigir
                header('Location: ../post/PostsGlobal');
                exit();
            } elseif ($status === 'blocked') {
                // Si la solicitud anterior fue rechazada, no hacemos nada
                header('Location: ../post/PostsGlobal');
                exit();
            } else {
                // Agregar una nueva solicitud de amistad si la relación no existe
                if (!$friendshipModel->areFriends($userId, $friend_id)) {
                    // Si la relación no existe, agregamos una nueva solicitud
                    if ($friendshipModel->addFriendRequest($userId, $friend_id)) {
                        // Solicitud de amistad enviada con éxito
                        header('Location: ../post/PostsGlobal');
                        exit();
                    } else {
                        // Error al enviar la solicitud de amistad
                        echo "Error al enviar la solicitud de amistad.";
                    }
                } else {
                    // Si la relación ya existe, mostramos un mensaje de error
                    echo "La solicitud de amistad ya existe.";
                }
            }
        }
    }
    
    
    

    public function mostrarSolicitudesPendientes()
    {
        session_start();

        // Verificar si el usuario ha iniciado sesión y obtener su ID
        if (!isset($_SESSION['user_id'])) {
            header('Location: ../Auth/login');
            exit();
        }
        
        $userId = $_SESSION['user_id'];

        // Instancia del modelo Friendship
        $friendshipModel = new Friendship();

        // Obtener solicitudes de amistad pendientes
        $pendingRequests = $friendshipModel->getPendingRequests($userId);

        // Depuración: Verifica el contenido de $pendingRequests
        echo '<pre>';
        print_r($pendingRequests);
        echo '</pre>';
        // Mostrar solicitudes pendientes en la vista
        include_once '../app/views/profile.php';
    }

    public function aceptarAmigo($friendId) {
        session_start();
    
        // Verificar si el usuario ha iniciado sesión y obtener su ID
        if (!isset($_SESSION['user_id'])) {
            header('Location: ../Auth/login');
            exit();
        }
        $userId = $_SESSION['user_id'];
    
        // Instancia del modelo Friendship
        $friendshipModel = new Friendship();
    
        // Actualizar el estado de la solicitud a "accepted"
        if ($friendshipModel->acceptFriendRequest($userId, $friendId)) {
            // Solicitud de amistad aceptada con éxito
            header('Location: ../dashboard/index');
            exit();
        } else {
            // Error al aceptar la solicitud de amistad
            echo "Error al aceptar la solicitud de amistad.";
        }
    }
    
    public function cancelarSolicitud($friend_id, $userId) {
        session_start();
        
        // Verificar si el usuario ha iniciado sesión
        if (!isset($_SESSION['user_id'])) {
            header('Location: ../Auth/login');
            exit();
        }
        
        // Obtener el ID del usuario de la sesión
        $userId = $_SESSION['user_id'];
    
        // Instancia del modelo Friendship
        $friendshipModel = new Friendship();
    
        // Verificar que los IDs de usuario sean diferentes
        if ($friend_id == $userId) {
            echo "No puedes cancelar una solicitud de amistad que tú mismo enviaste.";
            exit();
        }
    
        // Cancelar la solicitud de amistad
        if ($friendshipModel->rejectFriendRequest($friend_id, $userId)) {
            echo "Se canceló la solicitud de amistad.";
            // Solicitud de amistad cancelada con éxito
            header('Location: ../post/PostsProfile');
            exit();
        } else {
            // Error al cancelar la solicitud de amistad
            echo "Error al cancelar la solicitud de amistad.";
        }
    }
    
    public function bloquearUsuario($friendId) {
        session_start();
    
        // Verificar si el usuario ha iniciado sesión y obtener su ID
        if (!isset($_SESSION['user_id'])) {
            header('Location: ../Auth/login');
            exit();
        }
        $userId = $_SESSION['user_id'];
    
        // Instancia del modelo Friendship
        $friendshipModel = new Friendship();
    
        // Bloquear al usuario
        if ($friendshipModel->blockFriend($userId, $friendId)) {
            // Usuario bloqueado con éxito
            header('Location: ../dashboard/index');
            exit();
        } else {
            // Error al bloquear al usuario
            echo "Error al bloquear al usuario.";
        }
    }

}
?>
