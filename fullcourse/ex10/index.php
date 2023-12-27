<?php 
    //LOOPS
    
    $i = 0;
    while ($i <= 15){
        if ($i % 2 == 0){
            $i++;
            continue;
        }        
        echo $i++ . ' - ';
    }
    echo '<br>';

    $g = 24;
    do {
        echo $g++;
    } while ($g <=15);

    echo '<br>';

    for ($k = 0; $k < 16; print $k, $k++){ }
    echo '<br>';

    $array = ['a', 'b', 'c'];
    for ($f = 0, $length = count($array); $f < $length; $f++){
        echo $array[$f] . '<br>';
    }

    $progammingLanguages = ['PHP', 'java', 'c++', 'python'];
    foreach($progammingLanguages as $key => $language){               
        echo $key .' == '. $language . '<br>';
    }
?> 