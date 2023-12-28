<?php 
    declare(strict_types=1);
    // Functions
    function foo(int|float $x, int|float $y){
        return $x / $y;
    }
    echo foo(y: 5, x: 10);

    function sum(int|float ...$numbers){
        return array_sum($numbers);
    }
    $num = [1, 6, 7.5, 4];
    echo '<br>' . sum(...$num);
    
?>