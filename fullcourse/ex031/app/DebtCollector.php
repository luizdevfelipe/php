<?php

namespace app;

interface DebtCollector extends AnotherInterface
{
    public function collect(float $owedAmount):float;

}
