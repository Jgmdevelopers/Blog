<?php
class WeatherModel {
    private $apiKey;

    public function __construct($apiKey) {
        $this->apiKey = $apiKey;
    }

    public function getCurrentWeather($latitude, $longitude) {
        // URL base de la API de OpenWeatherMap
        $baseUrl = "https://api.openweathermap.org/data/3.0/onecall";

        // Parámetros de la solicitud GET
        $params = [
            'lat' => $latitude,
            'lon' => $longitude,
            'exclude' => 'hourly,daily',
            'appid' => $this->apiKey,
            'units' => 'metric', // para obtener la temperatura en grados Celsius
            'lang' => 'es'
        ];

        // Construir la URL completa con los parámetros
        $url = $baseUrl . '?' . http_build_query($params);
        

        // Realizar la solicitud GET a la API del clima
        $response = file_get_contents($url);

        if ($response === FALSE) {
            return null;
        }

        // Decodificar la respuesta JSON
        $weatherData = json_decode($response, true);

        if (!isset($weatherData['current'])) {
            return null;
        }

        // Extraer los datos relevantes del clima
        $currentWeather = $weatherData['current'];

        $result = [
            'description' => $currentWeather['weather'][0]['description'],
            'temperature' => $currentWeather['temp'],
            'feels_like' => $currentWeather['feels_like'],
        ];

        return $result;
    }
}
