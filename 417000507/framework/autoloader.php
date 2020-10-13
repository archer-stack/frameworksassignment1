<?php
    spl_autoload_register(function ($class) {
        $path = dirname(dirname(realpath(__FILE__)));
        $classes = array(
            $path ."/". "app/" . $class . ".php", 
            $path ."/". "framework/" . $class . ".php", 
        );

        foreach ($classes as $class) {
            if (file_exists($class)) {
                require $class;
            }
        }
    });
?>