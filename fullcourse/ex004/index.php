<?php 
    // STRINGS

    $firstname = 'Will';
    $lastname = "$firstname Smith";
    echo $lastname;

    $lastname = 'Smith';
    $name = $firstname . ' ' . $lastname;
    $name[5] = '5';
    echo  "<br>". $name . '<br>';

    $text = <<<TEXT
    LINE 1
    LINE 2
    LINE 3
    TEXT;

    echo nl2br($text);

?>