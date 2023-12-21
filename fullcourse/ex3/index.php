<?php
    declare(strict_types=1);
    //boolean
    $boolean = true;
    //int
    $int = 33;
    //float
    $float = 0.99;
    //string
    $string = 'Hello';

    echo $boolean . '<br>';
    echo $int . '<br>';
    echo $float . '<br>';
    echo $string . '<br>';
    echo gettype ($boolean);

    //arrays
    $array = [0, 1, -34, 0.99, 'A', true];
    print_r($array);

   

    function sum(int $x, int $y){
        return $x + $y;
    }
    
    $sum = sum(3 , 2);
    echo '<br>' . $sum;
?>