<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formatação de Strings</title>
</head>
<body>
    <?php 
        echo "Estamos no ano de " . date('Y') . '<br>';


        $curso = "PHP";
        $ano = date('Y');

        echo "Para o $curso existe diferença entre aspas simples e duplas <br>";
        echo 'Para o $curso existe diferença entre aspas simples e duplas <br>';

        echo <<< TESTE
            Aprendendo string heredoc
               na linguagem $curso
        no ano de $ano <br>
        TESTE;



        echo <<< 'TESTE'
            Aprendendo string nowdoc
               na linguagem $curso
        no ano de $ano
        TESTE;


    ?>
</body>
</html>