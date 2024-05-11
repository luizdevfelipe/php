<?php 
    // Error Control Operator (@)
    $file = @file('foo.txt');
    //Increment/Decrement operators (++ --)
    $x = 5;
    $x++;
    $x--;
    ++$x;
    --$x;
    //Logical Operators (&& || ! and or xor)
    $a = true;
    $b = false;
    var_dump($a && !$b);
    //Bitwise Operators (& | ^ ~ << >>)
    $c = 6;
    $d = 3;
    /* 
    6 = 110
        |
    3 = 011
        111
        --- = 7
    */
    var_dump($c ^ $d);


?>