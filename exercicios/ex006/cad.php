<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <h1>Resultado Final</h1>

        <p>
            <?php
                $valor = $_GET["valor"];
                $ante = $valor - 1;
                $succe = $valor + 1;
                echo "O valor digitado foi <strong>$valor</strong>";
                echo "<br> O sucessor é $succe";
                echo "<br> O antecessor é $ante";
            ?>
        </p>

        <button onclick="javascript:window.location.href='index.html'">Voltar</button>
    </section>
</body>
</html>