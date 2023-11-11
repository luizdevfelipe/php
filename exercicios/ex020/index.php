<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caixa Eletrônico</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        img{
            max-height: 50px;
            margin: 4px;
        }
    </style>
</head>
<body>
    <?php
        $valor = $_POST["valor"] ?? 0;
        $cem = intdiv($valor, 100);
        $resto = $valor % 100;

        $cinquenta = intdiv($resto, 50);
        $resto %= 50;

        $dez = intdiv($resto, 10);
        $resto %= 10;

        $cinco = intdiv($resto, 5);
    ?>
    <main>
        <h1>Caixa Eletrônico</h1>
        <form action="<?=$_SERVER["PHP_SELF"]?>" method="post">
            <label for="valor">Qual valor deseja sacar (R$)*</label>
            <input type="number" name="valor" id="valor" required step="5" min="5" value="<?=$valor?>">
            <p style="font-size: 0.8em;">Notas disponíveis: R$100, R$50, R$10, R$5</p>
            <input type="submit" value="Sacar">
        </form>
    </main>

    <section>
        <h2>Saque de R$<?=number_format($valor, 2, ",", ".")?> realizado</h2>
        <p>O caixa eletrônico vai te entregar as seguintes notas:</p>
        <ul>
            <li><img src="img/100-reais.jpg" alt=""> x<?=$cem?></li>
            <li><img src="img/50-reais.jpg" alt=""> x<?=$cinquenta?></li>
            <li><img src="img/10-reais.jpg" alt=""> x<?=$dez?></li>
            <li><img src="img/5-reais.jpg" alt=""> x<?=$cinco?></li>
        </ul>
    </section>
</body>
</html>