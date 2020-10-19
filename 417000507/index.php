<?php
    error_reporting(E_ALL); 
    ini_set('display_errors', 'on');
    require "framework/autoloader.php";

    if ($_SERVER["REQUEST_METHOD"] === "GET" && $_GET == null) {
        $indexController = new IndexController();
        $indexController->run();
    }

?>