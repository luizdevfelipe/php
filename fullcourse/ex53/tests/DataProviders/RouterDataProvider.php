<?php
declare(strict_types=1);
namespace Tests\DataProviders;

class RouterDataProvider 
{
    public function routeNotFoundCases():array
    {
        return [
            ['/users', 'put'],
            ['/invoices','POST'],
            ['/users', 'GET'],
            ['/users', 'POST']
        ];
    }
}
