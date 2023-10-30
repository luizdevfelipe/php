<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Resultado do processamento</h1>
    </header>

    <main>
        <?php 
            $nome = $_GET["nome"] ?? "sem nome";
            $snome = $_GET["sobrenome"] ?? "desconhecido";
            $idade = $_GET["idade"] ?? "sem idade";

            echo "É um grande prazer te conhecer $nome $snome !";

        ?>
        <p>
            <a href="javascript:history.go(-1)">Voltar para a página anterior</a>
        </p>
    </main>
</body>
</html>