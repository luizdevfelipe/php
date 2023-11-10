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
            $tempo = $_GET["segs"] ?? '0';
            $resto = $tempo;
            //604.800 semana
            $semanas = intdiv($tempo, 604800);
            $resto = $resto % 604800;
            //86.400 dia
            $dias = intdiv($resto, 86400);
            $resto = $resto % 86400;
            //3.600 hora
            $horas = intdiv($resto, 3600);
            $resto = $resto % 3600;
            //60 minuto
            $minutos = intdiv($resto, 60);
            $resto = $resto % 60;
            $segundos = $resto;
        ?>
        <h1>Calculadora de Tempo</h1>
        <form action="<?=$_SERVER["PHP_SELF"]?>" method="get">
            <label for="segs">Qual é o total de segundos?</label>
            <input type="number" name="segs" id="segs" required value="<?=$tempo?>">
            <input type="submit" value="Calcular">            
        </form>
    </main>

    <section>
        <h2>Totalizando Tudo</h2>
        <p>Analisando o valor que você digitou, <strong><?=number_format($tempo, 0, ",", ".")?> segundos</strong> equivalem a um total de:</p>
        <ul>
            <li><?=$semanas?> semanas</li>
            <li><?=$dias?> dias</li>
            <li><?=$horas?> horas</li>
            <li><?=$minutos?> minutos</li>
            <li><?=$segundos?> segundos</li>
        </ul>
    </section>
</body>
</html>