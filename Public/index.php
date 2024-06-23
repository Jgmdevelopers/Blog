<?php


// Autocarga de clases
spl_autoload_register(function ($class_name) {
    include '../core/' . $class_name . '.php';
});


$url = isset($_GET['url']) ? $_GET['url'] : '';
new Router();