<?php

require_once 'WeatherModel.php'; // Asegúrate de incluir el archivo que contiene la definición de la clase WeatherModel

class WeatherController {
    public function getCurrentWeather() {
        // Obtener los parámetros de latitud y longitud de la solicitud
        $latitude = $_GET['lat'];
        $longitude = $_GET['lon'];

        // Crear una instancia del modelo WeatherModel con tu API key
        $weatherModel = new WeatherModel('4b727d82ce714633b4d08db861ccd9e3'); // Reemplaza 'YOUR_API_KEY' con tu propia clave API

        // Llamar al método getCurrentWeather para obtener el clima actual
        $currentWeather = $weatherModel->getCurrentWeather($latitude, $longitude);

        // Devolver los datos del clima como respuesta JSON
        echo json_encode($currentWeather);
    }
}

// Crear una instancia del controlador y llamar al método getCurrentWeather
$weatherController = new WeatherController();
$weatherController->getCurrentWeather();
