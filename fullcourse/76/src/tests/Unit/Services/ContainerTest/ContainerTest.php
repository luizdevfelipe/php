<?php

declare(strict_types=1);

namespace Tests\Unit\ContainerTest;

use App\Container;
use App\Exceptions\Container\ContainerException;
use PHPUnit\Framework\TestCase;
use Tests\Unit\Services\ContainerTest\TypeHint;
use Tests\Unit\Services\ContainerTest\UnionType;
use Tests\Unit\Services\ContainerTest\AbstractClass;

class ContainerTest extends TestCase
{
    /** @test */
    public function it_set_a_dependency_class()
    {
        // dado uma classe container
        $container = new Container;

        $class = new class()
        {
            public function print()
            {
                echo 'It is functional';
            }
        };

        // quando um método set para registro é chamado
        $container->set($class::class, fn () => new $class);

        // então afirmamos que o registro foi feito
        $this->assertTrue($container->has($class::class));
    }

    /** @test */
    public function it_set_a_dependency_interface()
    {
        // given a container class
        $container = new Container;

        $class = new class()
        {
            public function print()
            {
                echo 'It is functional';
            }
        };

        // when we have a set method with a interface as a parameter

        $container->set(
            $class::class,
            'interface Teste{
                public function print();
            }'
        );

        // we assert that was registered
        $this->assertTrue($container->has($class::class));
    }


    /** @test 
     *  @dataProvider param_giver_to_container_exception_method
    */
    public function it_throws_a_container_exception_on_resolve_method(string $id)
    {
        // given a container class
        $container = new Container();

        // when we have a resolve method that instantiate a given class

        // we assert the given class throws an container exception
        $this->expectException(ContainerException::class);
        $container->resolve($id);
    }

    public function param_giver_to_container_exception_method()
    {
        return [
            [AbstractClass::class],
            [TypeHint::class],
            [UnionType::class]
        ];
    }

}
