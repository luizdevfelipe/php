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
            $valor = $_GET["num"];
            $quadrado = $valor ** (1/2);
            $cubico = $valor ** (1/3);
        ?>
        <h1>Informe um número</h1>
        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="get">
            <label for="num">Número</label>
            <input type="number" name="num" id="num" required value="<?= $valor ?>">
            <input type="submit" value="Calcular Raízes">
        </form>
    </main>

    <section>
        <h2>Resultado Final</h2>
        <?php 
            echo"Analisando o <strong>número $valor</strong>, temos: <br>";
            echo"<ul> <li> A sua raiz quadrada é <strong>". number_format($quadrado, 3, ",", ".")  ."</strong></li>";
            echo"<li> A sua raiz cúbica é <strong>". number_format($cubico, 3, ",", ".") ."</strong></li> </ul>";
        ?>
    </section>
</body>

</html>