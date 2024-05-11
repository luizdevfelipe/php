<?php 
    /* Operators */ 

    //Arithmeric Operators (+ - * / % **)
    $x = 10;
    $y = 0;
    //var_dump(fdiv($x, $y));

    //Assignment Operators (= += -= *= /= %= **=)
    $x = ($y = 10) + 5;
    //var_dump($x, $y);
    $x += 5;

    //Strings Operators (. .=)
    $x = 'Hello';
    $x .= 'World';
    //echo $x;

    //Comparison Operators (== === != <> !== < > <= >= <=> ?? ?:)
    $x = 5;
    $y = 3;
    //var_dump($x == '5');
    //var_dump($x === '5');
    //var_dump($x <=> $y);

    $y = 'Hello';
    $z = strpos($y, 'H');
    $result = $z === false ? 'H not found' : 'H found at index ' . $z;
    //echo $result;

    //$b = 10;
    $a = $b ?? 'B is null';
    echo $a;
?>