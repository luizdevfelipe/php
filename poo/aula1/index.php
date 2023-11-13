<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
        require_once 'Caneta.php';
        $c1 = new Caneta();
        $c1->cor = "Azul";
        $c1->ponta = "0.7";
        $c1->tampada = false;

        $c1->destampar();
        $c1->rabiscar();

        $c2 = new Caneta();
        $c2->cor = 'Vermelha';
        $c2->carga = 50;
        $c2->tampar();

        var_dump($c1);
        print_r($c2);
    ?>
</body>
</html>