<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classe Caneta</title>
</head>
<body>
    <pre>
    <?php
        require_once "Caneta.php";

        $c1 = new Caneta("BIC", "Azul", 0.5);
        $c1->setPonta(0.5);
        $c1->setModelo('BIC');

        //$c1->modelo = 'Nic';
        //$c1->ponta = 0.7;

        print_r($c1);

        echo "Eu tenho uma caneta {$c1->getModelo()} de ponta {$c1->getPonta()}"

       
        
    ?>
    </pre>
</body>
</html>