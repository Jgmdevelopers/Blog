<?php

require_once '../App/Models/WeatherModel.php';


class WeatherController {
    public function getCurrentWeather() {
        // Configura la cabecera de respuesta para que sea JSON
        header("Content-Type: application/json");

        // Verifica que el método de la solicitud sea GET
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            http_response_code(405);
            echo json_encode(["error" => "Method not allowed"]);
            exit();
        }

        // Verifica que los parámetros de latitud y longitud estén presentes
        if (!isset($_GET['lat']) || !isset($_GET['lon'])) {
            http_response_code(400);
            echo json_encode(["error" => "Parámetros de latitud y longitud son requeridos"]);
            exit();
        }

        $latitude = $_GET['lat'];
        $longitude = $_GET['lon'];

        // Crea una instancia del modelo WeatherModel con tu API key
        $weatherModel = new WeatherModel('4b727d82ce714633b4d08db861ccd9e3'); // Reemplaza 'YOUR_API_KEY' con tu propia clave API

        // Llama al método getCurrentWeather para obtener el clima actual
        $currentWeather = $weatherModel->getCurrentWeather($latitude, $longitude);

        // Verifica si se obtuvieron datos correctamente
        if ($currentWeather === null) {
            http_response_code(500);
            echo json_encode(["error" => "Error al obtener los datos del clima"]);
            exit();
        }

        // Devuelve los datos del clima como respuesta JSON
        echo json_encode($currentWeather);
        exit();
    }
}

// Crear una instancia del controlador y llamar al método getCurrentWeather
$weatherController = new WeatherController();
$weatherController->getCurrentWeather();