<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DESAFIO PHP</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <main>
        <?php   
            $valor = $_GET["preco"] ?? '0';
            $porcent = $_GET["reajuste"] ?? '0';
            $aumento = $valor * $porcent / 100;
            $preco = $valor + $aumento;
        ?>
        <h1>Reajustador de Preços</h1>
        <form action="" method="get">
            <label for="preco">Preço do Produto (R$)</label>
            <input type="number" name="preco" id="preco" step="0.01" value="<?= $valor ?>">
            <label for="reajuste">Qual será o percentual de reajuste? (<strong><span id="p">?</span>%</strong>)</label>
            <input type="range" name="reajuste" id="reajuste" value="<?=$porcent?>" min="0" max="100" step="1" oninput="mudaValor()">
            <input type="submit" value="Reajustar">
        </form>
    </main>

    <section>
        <h2>Resultado do Reajuste</h2>
        <p>O produto que custava R$<?=number_format($valor, 2, ",", ".")?>, com <strong> <?=$porcent?>% de aumento</strong> vai passar a custar <strong>R$<?=number_format($preco, 2, ",", ".")?></strong> a partir de agora.</p>
    </section>

    <script>
        mudaValor()

        function mudaValor(){
            p.innerText = reajuste.value
        }
    </script>
</body>
</html>