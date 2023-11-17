<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre>
    <?php
    
        require_once 'Caneta.php';
        $c1 = new Caneta();
        $c1->modelo = "BIC";
        $c1->cor = "Azul";
        //$c1->ponta = "0.5";
        //$c1->carga = 55;
        //$c1->tampada = true;
        $c1->rabiscar();
        $c1->tampar();
        
        print_r($c1);
    ?>
    </pre>
</body>
</html>