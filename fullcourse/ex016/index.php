<?php 
    // Variable Scope
    $x = 5;
    include 'file.php';
    echo '<br>' . $x;

    function abc(){
        global $x;
        $x = 2;
    }

    abc();
    echo '<br>' . $x;

    function getValue(){
        static $value = null;
        if ($value === null){
            $value =  someVeryExpensiveFunction();
        }
        
        return $value;
    }

    function someVeryExpensiveFunction(){
        sleep(2);
        echo 'Processing...';
        return 10;
    }

    echo '<br><br>';
    echo getValue() . '<br>';
    echo getValue() . '<br>';
    echo getValue() . '<br>';
?>