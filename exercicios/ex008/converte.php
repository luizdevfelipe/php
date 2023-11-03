<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio PHP</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <main>
        <h1>Conversor de Moedas</h1>
        <?php 
            $reais = $_POST["dinheiro"] ?? 0;
            $dolares = $reais / 4.9;
            $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);

            echo"Seus " . numfmt_format_currency($padrao, $reais, "BRL") . " equivalem a <strong>" . numfmt_format_currency($padrao, $dolares, "USD") . "</strong>" 
            


        ?>
        <button onclick="window.location.href='index.html'">Voltar</button>
    </main>
</body>
</html>