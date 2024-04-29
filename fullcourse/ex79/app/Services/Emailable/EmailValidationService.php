<?php

declare(strict_types=1);

namespace App\Services\Emailable;

use App\Contracts\EmailValidationInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Psr\Http\Message\ResponseInterface;

class EmailValidationService implements EmailValidationInterface
{
    private string $baseUrl = 'https://api.emailable.com/v1/';

    public function __construct(private string $apiKey)
    {
    }

    public function verify(string $email): array
    {
        $stack = HandlerStack::create();        

        $stack->push($this->getRetryMiddleware(3));

        $client = new Client(
            [
                'base_uri' => $this->baseUrl,
                'timeout' => 5,
                'handler' => $stack
            ]
        );

        $params = [
            'email' => $email,
            'api_key' => $this->apiKey
        ];

        $response = $client->get('verify1', ['query' => $params]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function getRetryMiddleware(int $maxRetry): callable
    {
        return Middleware::retry(
            function (
                int $retries,
                ResponseInterface $request,
                ?ResponseInterface $response = null,
                ?\RuntimeException $e = null
            ) use ($maxRetry) {
                if ($retries >= $maxRetry) {
                    return false;
                }

                if ($response && in_array($response->getStatusCode(), [249, 429, 503, 404])) {
                    echo 'Retrying [' . $retries . '] Status: ' . $response->getStatusCode() . '</br>'; 
                    return true;
                }

                if($e instanceof ConnectException){                    
                    echo 'Retrying [' . $retries . '] Connection Error </br>';
                    return true;
                }

                echo 'Not Retrying </br>';

                return false;
            }
        );
    }
}
