<?php 
    require_once '../vendor/autoload.php';
    use \app\ClassFoo;
    use \app\MyInterface;

    $obj = new class(1, 2, 3) implements MyInterface {
        public function __construct(public int $x, public int $y, public int $z)
        {
            
        }
    };

    var_dump(get_class($obj) . '<br>');

    function foo(MyInterface $obj)
    {
        var_dump($obj);
    }

    foo($obj);

    echo '<br>';
    /* --------------------------------------- */

    $object = new ClassFoo(1, 2);
    var_dump($object->bar());

?>