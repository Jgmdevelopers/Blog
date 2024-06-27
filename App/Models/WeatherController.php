<?php

class WeatherModel {
    private $apiKey;

    public function __construct($apiKey) {
        $this->apiKey = $apiKey;
    }

    public function getCurrentWeather($latitude, $longitude) {
        // URL base de la API del clima
        $baseUrl = "https://api.weatherbit.io/v2.0/current";

        // Parámetros de la solicitud GET
        $params = [
            'lat' => $latitude,
            'lon' => $longitude,
            'key' => $this->apiKey,
        ];

        // Construir la URL completa con los parámetros
        $url = $baseUrl . '?' . http_build_query($params);

        // Realizar la solicitud GET a la API del clima
        $response = file_get_contents($url);

        // Decodificar la respuesta JSON
        $weatherData = json_decode($response, true);

        // Extraer los datos relevantes del clima
        $weather = $weatherData['data'][0]; // Tomar el primer resultado de la lista de datos (suponiendo que es el más relevante)

        $result = [
            'city_name' => $weather['city_name'],
            'country_code' => $weather['country_code'],
            'description' => $weather['weather']['description'],
            'temperature' => $weather['temp'],
        ];

        return $result;
    }
}
