<?php 
    // Date and Time

    date_default_timezone_set('America/Sao_Paulo');

    // Current day in seconds
    $currentTime = time(); 

    // 5 days in the future
    echo $currentTime + 5 * 24 * 60 * 60;

    $date = date('d/m/y g:ia', $currentTime + 5 * 24 * 60 * 60);
    echo '<br>' . date('d/m/y g:ia', strtotime("+5 days")) . '<br>';

    echo '<pre>';
    print_r(date_parse($date));
    echo '</pre>';
?>