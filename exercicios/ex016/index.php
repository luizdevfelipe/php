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
            $valor1 = $_GET["n1"] ?? '';
            $valor2 = $_GET["n2"] ?? '';
            $p1 = $_GET["p1"] ?? '';
            $p2 = $_GET["p2"] ?? '';
        ?>
        <h1>Médias Aritméticas</h1>
        <form action="<?=$_SERVER["PHP_SELF"]?>" method="get">
            <label for="n1">1º Valor</label>
            <input type="number" name="n1" id="n1" required value="<?= $valor1?>">
            <label for="p1">1º Peso</label>
            <input type="number" name="p1" id="p1" min='1' required value="<?= $p1 ?>">
            <label for="n2">2º Valor</label>
            <input type="number" name="n2" id="n2" required value="<?= $valor2 ?>">
            <label for="p2">2º Peso</label>
            <input type="number" name="p2" id="p2" min='1' required value="<?= $p2 ?>">
            <input type="submit" value="Calcular Médias">
        </form>
    </main>

    <section>
        <h2>Cálculo das Médias</h2>
        
        <?php 
            $media = ($valor1 + $valor2)/2;
            $ponderada = ($valor1 * $p1 + $valor2 * $p2) / ($p1 + $p2);

            echo"Analisando os valores $valor1 e $valor2: <br>";

            echo"<ul> <li>A <strong>Média Aritimética Simples</strong> entre os valores é igual a ". number_format($media, 2, ',', '.') ."</li>";

            echo"<li>A <strong>Média Aritmética Ponderada</strong> com pesos $p1 e $p2 é igual a ". number_format($ponderada, 2, ',', '.'). "</li> </ul>";
        ?>
    </section>
</body>
</html>