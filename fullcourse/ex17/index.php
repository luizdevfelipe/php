<?php 
    /*
    $x = 1;
    $sum = function (int|float ...$numbers) use ($x) {
        $x = 15;
        return array_sum($numbers);
    };
    */

    $array = [1, 2, 3, 4];
    $y = 5;
    $array2 = array_map(fn($number) => $number * $number, $array);    

    print_r($array2);

    /*
    $x = 'sum';
    if (is_callable($x)){
        echo $x(1, 4, 5);
    } else {
        echo 'Isn\'t Callable';
    }
    */
?>