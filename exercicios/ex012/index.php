<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício Fomulário</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php 
        $valor1 = $_GET["n1"] ?? 0;
        $valor2 = $_GET["n2"] ?? 0;

    ?>
    <main>
        <h1>Somador de Valores</h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
            <label for="n1">Valor 1</label>
            <input type="number" name="n1" id="n1" value="<?=$valor1?>">
            <label for="n2">Valor 2</label>
            <input type="number" name="n2" id="n2" value="<?=$valor2?>">
            <input type="submit" value="Somar">
        </form>
    </main>

    <section id="resultado">
        <h2>Resultado da Soma</h2>
        <?php 
            $soma = $valor1 + $valor2;
            echo"A soma entre os valores $valor1 e $valor2 é <strong>$soma</strong>";
        ?>
    </section>
</body>
</html>