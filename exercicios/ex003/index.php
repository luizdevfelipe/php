<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos primitivos</title>
</head>
<body>
    <h1>Teste de tipos primitivos</h1>
    <?php 
        $num = 3e2;
        echo "o valor da variável é $num";

        $num = 0x1A;
        echo "<br> o valor da variável é $num";
        
        $num = 0b1100;
        echo "<br> o valor da variável é $num";
        
        $num = 0101;
        echo "<br> o valor da variável é $num <br>";

        $v = 0x3F;
        var_dump($v);

        $teste = (int) "550";
        echo "<br>";
        var_dump($teste);        

        $emprego = true;
        echo "<br>";
        var_dump($emprego);
        echo "<br>O valor emprego é $emprego";

        echo "<br>";
        $vet = [6,"joão",9,false];
        var_dump($vet);


        echo "<br>";
        class Pessoa {
            private string $nome;
        }

        $p = new Pessoa;
        var_dump($p);
    ?>
</body>
</html>