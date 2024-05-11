<?php

use App\Address;

require_once __DIR__ . '/../vendor/autoload.php';

$address = new Address('Rua', 'Cidade', 'Estado', '99.999-999', 'País');

echo $address->street;