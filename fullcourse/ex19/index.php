<?php 
    $dir = scandir(__DIR__);

    var_dump(is_file($dir[2]));

    if(file_exists('text.txt')){
        echo filesize('text.txt');

        file_put_contents('text.txt', 'hello world');

        clearstatcache();
        echo filesize('text.txt');
    } else {
        echo "File not Found.";
    }
?>