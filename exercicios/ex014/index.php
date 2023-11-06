<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DESAFIO PHP</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php 
        $salario = $_POST["sal"] ?? 0;
        $minimo = 1380;
    ?>
    <main>
        <h1>Informe seu salário</h1>
        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
            <label for="sal">Salário (R$)</label>
            <input type="number" name="sal" id="sal" step="0.01" required value="<?= $salario?>" >
            <p>Considerando o salário mínimo de <strong>R$1.380,00</strong></p>
            <input type="submit" value="Calcular">
        </form>
    </main>

    <section>
        <h2>Resultado Final</h2>
        <p>
        <?php 
            $formatado = number_format($salario, 2, ",", ".");
            $resto = $salario % $minimo;

            echo"Quem recebe um salário de R\$$formatado ganha <strong>". intdiv($salario, 1380)." salários mínimos</strong> + R\$ ". number_format($resto, 2, ",", '.');
        ?>
        </p>
    </section>
</body>
</html>