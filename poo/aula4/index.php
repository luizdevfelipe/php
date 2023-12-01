<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conta Bancária</title>
</head>
<body><pre>
    <?php
        require_once "ContaBanco.php";
        $c1 = new ContaBanco();
        $c2 = new ContaBanco();

        $c1->abrirConta('cc');
        $c1->setDono("Jubileu");
        $c1->setNumConta(1111);
        $c1->depositar(300);
        $c1->pagarMensal();
        $c1->sacar(338);
        $c1->fecharConta();

        $c2->abrirConta('cp');
        $c2->setDono('Cleusa');
        $c2->setNumConta(2222);
        $c2->depositar(500);
        $c2->sacar(100);
        $c2->pagarMensal();

        print_r($c1);
        print_r($c2);
    ?>
    </pre>
</body>
</html>