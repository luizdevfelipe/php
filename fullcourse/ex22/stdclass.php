<?php 
    $str = '{"a":1, "b":2, "c":3}';

    $arr = json_decode($str);

    var_dump($arr->a);

?>