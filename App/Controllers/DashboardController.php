<?php
require_once '../App/Models/Post.php';
require_once __DIR__ . '/../../config.php';


class DashboardController {

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

    public function index() {
        // Verifica que el usuario esté autenticado
       
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . PUBLIC_PATH . "Auth/loginForm");
            exit();
        }

        // Mostrar la vista del dashboard
        header("Location: " . PUBLIC_PATH . "Post/PostsProfile");

    }
    
    /* public function profile() {
        // Verifica que el usuario esté autenticado
       
        if (!isset($_SESSION['user_id'])) {
            header("Location: Auth/loginForm");
            exit();
        }

        $user_id = $_SESSION['user_id'];
        $postModel = new Post();
        $posts = $postModel->getAllPostsPrivate(); 

        // Mostrar la vista del dashboard
        include_once '../App/Views/profile.php';
    } */
}
