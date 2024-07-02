<?php
require_once '../App/Models/JokesModel.php';

class JokesController {
    public function getJoke() {
        header("Content-Type: application/json");

        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            http_response_code(405);
            echo json_encode(["error" => "Method not allowed"]);
            exit();
        }

        $jokeModel = new JokesModel();
        $joke = $jokeModel->getJoke();

        if ($joke === null) {
            http_response_code(500);
            echo json_encode(["error" => "Error al obtener el chiste"]);
            exit();
        }

        echo json_encode($joke);
        exit();
    }
}

$jokeController = new JokesController();
$jokeController->getJoke();
?>