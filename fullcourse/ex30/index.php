<?php 
    require_once '../vendor/autoload.php';

    $fields = [
        new \app\Text('textField'),
        new \app\CheckBox('checkboxField'),
        new \app\Radio('radioField')
    ];

    foreach($fields as $field){
        echo $field->render() . '<br>';
    }

    
?>