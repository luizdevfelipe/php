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
            $nasc = $_POST["nasc"] ?? '2000';
            $futuro = $_POST["anofut"] ?? $atual;
            $atual = date("Y");
            
        ?>
        <h1>Calculando Idade</h1>
        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
            <label for="nasc">Em que ano você nasceu</label>
            <input type="number" name="nasc" id="nasc" min="1920" max="<?=($atual-1)?>" value="<?= $nasc?>">
            <label for="anofut">Quer saber sua idade em que ano? (atualmente estamos em <strong><?= $atual ?></strong>)</label>
            <input type="number" name="anofut" id="anofut" value="<?= $atual?>">
            <input type="submit" value="Qual será minha idade?">
        </form>
    </main>

    <section>
        <h2>Resultado</h2>
        <p>Quem nasceu em <?=$nasc?> vai ter <strong><?=$futuro-$nasc?> em <?=$futuro?></strong>!</p>
    </section>
</body>
</html>