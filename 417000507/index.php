<?php
    require "framework/autoloader.php";

    if ($_SERVER["REQUEST_METHOD"] === "GET" && $_GET == null) {
        $indexController = new IndexController();
        $indexController->run();
    }

?>