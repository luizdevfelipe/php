<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes Animais</title>
</head>
<body>
    <?php 
        require_once "Mamifero.php";
        require_once "Peixe.php";
        require_once "Ave.php";
        require_once "Reptil.php";
        require_once "Canguru.php";
        require_once "Cobra.php";
        require_once "Cachorro.php";
        require_once "Arara.php";
        require_once "GoldFish.php";
        require_once "Tartaruga.php";

        $m = new Mamifero();
        $m->setPeso(33.5);
        $m->locomover();

        $a = new Ave();
        $a->locomover();

        $r = new Reptil();
        $r->locomover();

        $c = new Canguru();
        $c->locomover();
        $c->emitirSom();
        
        $k = new Cachorro();
        $k->locomover();
        $k->emitirSom();

        $ar = new Arara();

        $t = new Tartaruga();
        $t->locomover();
        

    ?>
</body>
</html>