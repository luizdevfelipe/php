<?php 
    spl_autoload_register(function($class){
        $path = __DIR__ . '\\' . $class . '.php';
        require_once $path;        
    });

    $fields = [
        new \app\Text('textField'),
        new \app\CheckBox('checkboxField'),
        new \app\Radio('radioField')
    ];

    foreach($fields as $field){
        echo $field->render() . '<br>';
    }

    
?>