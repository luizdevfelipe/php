<?php 
    declare(strict_types=1);


    // return
    function sum ($x, $y){
        return $x + $y;
    }
    $value = sum(4, 6);
    echo $value . '<br>';

    
    // declare - ticks
    function onTicks(){
        echo 'Tick <br>';
    }
    register_tick_function('onTicks');
    declare(ticks=3);

    $i = 0; $lenght = 10;
    while ($i < $lenght){
        echo $i++ . '<br>';
    }

    

    //declare - enconding  
    $a = sum(1 , '3');
    echo $a . '<br>';
    



?>