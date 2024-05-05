<?php

declare(strict_types=1);

namespace App;

use App\Contracts\EmailValidationInterface;
use \App\Exceptions\RouteNotFoundException;
use App\Services\Emailable\EmailValidationService;
use Illuminate\Container\Container;
use Symfony\Component\Mailer\MailerInterface;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class App
{
    protected Config $config;
    public function __construct(
        protected Container $container,
        protected ?Router $router = null,
        protected array $request = []
    ) {
    }

    public function boot(): static
    {
        $dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();

        $this->config = new Config($_ENV);
        $this->initDb($this->config->db);

        $loader = new FilesystemLoader(VIEWS_PATH);
        $twig = new Environment($loader, [
            'cache' => STORAGE_PATH . '/cache',
        ]);

        $this->container->bind(MailerInterface::class, fn () => new CustomMailer($this->config->mailer['dsn']));

        $this->container->singleton(Environment::class, fn() => $twig);

        $this->container->bind(EmailValidationInterface::class, fn () => new EmailValidationService($this->config->apiKeys['abstract_api_email_validation']));

        return $this;
    }

    public function initDb(array $config)
    {
        $capsule = new Capsule;
        $capsule->addConnection($config);
        $capsule->setEventDispatcher(new Dispatcher($this->container));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    public function run()
    {
        try {
            echo $this->router->resolve($this->request['uri'], $this->request['method']);
        } catch (RouteNotFoundException) {
            http_response_code(404);
            echo \App\View::make('error/404');
        }
    }
}
