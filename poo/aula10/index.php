<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herança de classes</title>
</head>
<body>
    <pre>
    <?php 
        require_once "Visitante.php";
        require_once "Aluno.php";
        require_once "Bolsista.php";
        require_once "Professor.php";
        require_once "Tecnico.php";

        //$p = new Pessoa();
        $v1 = new Visitante();
        $v1->setNome("José");
        $v1->setIdade(18);
        $v1->setSexo("M");

        $a = new Aluno();
        $a->setNome("Pedro");
        $a->setMatricula(1111);
        $a->setCurso("Informática");
        $a->setSexo("M");
        $a->pagarMensalidade();
        
        $b = new Bolsista();
        $b->setNome("Jubileu");
        $b->setBolsa(10);
        $b->setCurso("Administração");
        $b->setIdade(21);
        $b->renovarBolsa();
        $b->pagarMensalidade();

        $p = new Professor();
        $p->setNome("Paulo");
        $p->setEspecialidade("Programação");
        $p->setSalario(6000);
        
        $t = new Tecnico();
        $t->setNome("Antônio");
        $t->setRegistro(153634);
        $t->praticar();

        print_r($v1);
        print_r($a);
        print_r($b);
        print_r($p);
        print_r($t);
    ?>
    </pre>
</body>
</html>