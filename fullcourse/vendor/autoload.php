<?php
spl_autoload_register(function ($class) use ($folder) {

    $path = dirname(__DIR__) . '\\' . $folder . '\\' . $class . '.php';
    require_once $path;
});
?>