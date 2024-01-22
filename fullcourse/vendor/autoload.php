<?php
spl_autoload_register(function ($class) use ($folder) {

    $path = dirname(__DIR__) . '\\' . $folder . '\\' . $class . '.php';
    echo $path;
    require_once $path;
});
?>