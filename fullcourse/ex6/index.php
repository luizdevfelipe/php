<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <pre>
    <?php
        $programmingLanguages = ['PHP', 'Java', 'Python'];
        echo $programmingLanguages[1] . '<br><br>';

        //$programmingLanguages[1] = 'C++';
        array_push($programmingLanguages, 'C++', 'C', 'GO');
        var_dump($programmingLanguages);
        echo "<br>" . count($programmingLanguages);

        $programmingLanguages = ['php' => '8.0', 'python' => '3.11'];
        echo '<br>' . $programmingLanguages['php'] . '<br>';


        $programmingLanguages = [
            'php' => [
                'creator' => 'Rasmus Lerdof',
                'extesion' => '.php',
                'website' => 'www.php.net',
                'isOpenSource' => true,
                'versions' => [ 
                'new' =>   ['version' => 8, 'releaseDate' => 'Nov 26, 2020'],
                'last' =>   ['version' => 7.4, 'releaseDate' => 'Nov 28, 2019']
                ]
        
            ],
            'python' => [
                'creator' => 'Guido Van Rossum',
                'extesion' => '.py',
                'website' => 'www.python.org',
                'isOpenSource' => true,
                'version' => [
                    ['version' => 3.9, 'releaseDate' => 'Oct 5, 2020'],
                    ['version' => 7.4, 'releaseDate' => 'Oct 14, 2019']
                ]
        
            ]
        ];

        print_r($programmingLanguages['php']['versions']['new']['releaseDate']);

        $array = [1, 2, 3, 50 => 4, 5, 6];
        print_r($array);
        echo array_pop($array) . '<br>'; // array_shift($array);

        var_dump(array_key_exists(50, $array)) ;
    ?>
    </pre>
</body>

</html>