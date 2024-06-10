<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

//echo "Estoy en el index.php"; // Mensaje de depuración

// Autocarga de clases
spl_autoload_register(function ($class_name) {
    //echo "Autocargando clase: $class_name"; // Mensaje de depuración
    include '../core/' . $class_name . '.php';
});

// Inicialización del enrutador
//echo "Inicializando enrutador"; // Mensaje de depuración
new Router();