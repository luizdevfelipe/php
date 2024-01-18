<?php 
    spl_autoload_register(function($class){
        $path = dirname(__DIR__) . '\\ex31\\' . $class . '.php';
        require_once $path;
    });
?>