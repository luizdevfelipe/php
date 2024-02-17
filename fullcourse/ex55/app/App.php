<?php

declare(strict_types=1);

namespace App;

use \app\Exceptions\RouteNotFoundException;
use App\Services\PaddlePayment;
use App\Services\PaymentGatewayInterface;
use App\Services\StripePayment;

class App
{
    private static DB $db;
    public function __construct(
        protected Container $container,
        protected Router $router,
        protected array $request,
        protected Config $config
    ) {
        static::$db = new DB($config->db ?? []);

        $this->container->set(PaymentGatewayInterface::class, PaddlePayment::class);
    }

    public static function db(): DB
    {
        return static::$db;
    }

    public function run()
    {
        try {
            echo $this->router->resolve($this->request['uri'], $this->request['method']);
        } catch (RouteNotFoundException) {
            http_response_code(404);
            echo \app\View::make('error/404');
        }
    }
}
