<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classe de Vídeos</title>
</head>
<body>
    <pre>
        <?php 
            require_once "Video.php";
            require_once "Gafanhoto.php";
            require_once "Visualizacao.php";
            $v[0] = new Video("Aula 01 POO");
            $v[1] = new Video("Aula 12 PHP");
            $v[2] = new Video("Aula 14 HTML5 E CSS3");

            $g[0] = new Gafanhoto("Jubileu", 22, "M", "juba");
            $g[1] = new Gafanhoto("Cleuza", 12, "F", "cleusinha");

            $vis[0] = new Visualizacao($g[0], $v[2]); // Jubileu HTML5
            $vis[1] = new Visualizacao($g[0], $v[1]); // Jubileu Aula12 PHP

            $vis[0]->avaliar();
            $vis[1]->avaliarPorcent(85);

            print_r($v);
            print_r($g);
            print_r($vis);
        ?>
    </pre>
</body>
</html>