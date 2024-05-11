<?php

namespace apps;

/**
 * @property Costumer $costumer
 * @property float $amount
 * @method bool process(Costumer $costumer, float $amount)
 */

class Transaction
{
    /** @var Costumer  */
    private $costumer;

    /** @var float */
    private $amount;

    /**
     * @param Costumer $costumer
     * @param float $amount
     * 
     * @throws \RuntimeException
     * @throws \InvalidArgumentExeption
     * 
     * @return bool
     */
    public function process(Costumer $costumer, float $amount): bool
    {
        //If is successful, return true
        return true;
    }

    /**
     * @param Costumer[] $arr
     */
    public function foo(array $arr)
    {
        /** @var Costumer $obj */
        foreach ($arr as $obj) {
            $obj->name;
        }
    }
}
