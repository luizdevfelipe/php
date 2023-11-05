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
        <h1>Analisador de Número Real</h1>
        <?php 
            $num = $_GET["numero"] ?? 0;
            echo "<p> Analisando o número <strong>" . number_format($num, 3, ",", ".") ."</strong> informado pelo usuário: </p>";

            $int = (int) $num;
            $frac = $num - $int;

            echo "<ul> <li>A parte inteira do número é <strong>". number_format($int, 0, ",", ".") ."</strong> <li>A parte fracionário do número é <strong>". number_format($frac, 3, ",", ".") ."</strong> </ul>";
    

        ?>
        <button onclick="history.go(-1)">Voltar</button>
    </main>
</body>
</html>