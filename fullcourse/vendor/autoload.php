<?php 
    spl_autoload_register(function($class){
        foreach(scandir(dirname(__DIR__)) as $folder) {
            $path = dirname(__DIR__) . '\\'.$folder.'\\' . $class . '.php';            
            if (file_exists($path)){                
                require_once $path;
            }            
        }               
    });
    
?>