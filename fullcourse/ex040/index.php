<?php 
    $folder = 'ex40';
    require_once '../vendor/autoload.php';

    //Cria um objeto da classe DateTime com a data de amanhã e hora de 3:35, define a time zone para America/Sao_paulo
    $dateTime = new DateTime('tomorrow 3:35pm', new DateTimeZone('America/Sao_Paulo'));

    //Printa o nome da time zone e a data criada em um formato específico
    echo $dateTime->getTimezone()->getName() . ' ' . $dateTime->format('d/m/y G:y A') . '<br>';
    
    //Altera a date e hora com uma corrente de métodos
    $dateTime->setDate(2024, 1, 21)->setTime(9, 11);
    //Altera a time zone
    $dateTime->setTimezone(new DateTimeZone('Europe/Amsterdam'));

    //Printa o novo tempo, adaptado a time zone nova
    echo $dateTime->getTimezone()->getName() . ' ' . $dateTime->format('d/m/y G:i A') . '<br>';

    //Define uma data no padrão europeu, mas que será usada no objeto como padrão U.S.
    $date = '15/05/2021';
    $newDateTime = DateTime::createFromFormat('d/m/Y', $date);
    var_dump($newDateTime);

    var_dump($dateTime <=> $newDateTime);
    echo $newDateTime->diff($dateTime)->format('%a');
?>