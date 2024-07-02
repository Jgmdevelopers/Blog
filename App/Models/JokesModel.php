<?php
class JokesModel
{
    private $baseUrl = "https://v2.jokeapi.dev/joke/Any";

    public function getJoke($lang = 'es') {
        $url = $this->baseUrl . '?lang=' . $lang;

        $response = file_get_contents($url);
        $jokeData = json_decode($response, true);

        return $jokeData;
    }
}
