<?php
declare(strict_types=1);

namespace App;

use Psr\Container\ContainerInterface;
use App\Exceptions\Container\ContainerException;

class Container implements ContainerInterface
{
    private array $entries = [];

    public function get(string $id)
    {
        if ($this->has($id)) {
            $entry = $this->entries[$id];
            return $entry($this);
        }

        return $this->resolve($id);
    }

    public function has(string $id): bool
    {
        return isset($this->entries[$id]);
    }

    public function set(string $id, callable $concrete)
    {
        $this->entries[$id] = $concrete;
    }

    public function resolve(string $id)
    {
        //1. Inspecte the class that we are trying to get from container
        $reflectionClass = new \ReflectionClass($id);

        if (!$reflectionClass->isInstantiable()) {
            throw new ContainerException('Class' . $id . 'is not instantiable');
        }

        //2. Inspect the constructor form the class
        $constructor = $reflectionClass->getConstructor();

        if (!$constructor) {
            return new $id;
        }

        //3. Inspect the constructor parameters (dependencies)
        $parameters = $constructor->getParameters();

        if (!$parameters) {
            return new $id;
        }

        //4. If the constructor parameter is a class then try to resolve that class using the container
        $dependencies = array_map(function (\ReflectionParameter $param) use ($id) {
            $name = $param->getName();
            $type = $param->getType();

            if (!$type) {
                throw new ContainerException('Failed to resolve class ' . $id . ' param ' . $name . ' has not type hint');
            }

            if ($type instanceof \ReflectionUnionType) {
                throw new ContainerException('Failed to resolve class ' . $id . ' param ' . $name . ' is a union type param');
            }

            if ($type instanceof \ReflectionNamedType && !$type->isBuiltin()) {
                return $this->get($type->getName());
            }

            throw new ContainerException('Failed to resolve class' . $id . 'param' . $name . ' is a invalid param');
        }, $parameters);
        
        return $reflectionClass->newInstanceArgs($dependencies);
    }    
}
