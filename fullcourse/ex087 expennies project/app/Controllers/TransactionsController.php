<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Entity\Transaction;
use App\RequestValidators\CreateTransactionRequestValidator;
use App\RequestValidators\RequestValidatorFactory;
use App\ResponseFormatter;
use App\Services\RequestService;
use App\Services\TransactionService;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\Twig;

class TransactionsController
{
    public function __construct(
        private readonly Twig $twig,
        private readonly RequestValidatorFactory $requestValidatorFactory,
        private readonly TransactionService $transactionService,
        private readonly RequestService $requestService,
        private readonly ResponseFormatter $responseFormatter,
    ) {
    }

    public function index(Request $request, Response $response): Response
    {
        return $this->twig->render($response, 'transactions/index.twig');
    }

    public function store(Request $request, Response $response): Response
    {
        $data = $this->requestValidatorFactory->make(CreateTransactionRequestValidator::class)->validate(
            $request->getParsedBody()
        );

        $this->transactionService->create($data, $request->getAttribute('user'));

        return $response;
    }

    public function load(Request $request, Response $response): Response
    {
        $params      = $this->requestService->getDataTableQueryParameters($request);
        $transaction  = $this->transactionService->getPaginatedCategories($params);
        $transformer = function (Transaction $transaction) {
            return [
                'id'          => $transaction->getId(),
                'description' => $transaction->getDescription(),
                'amount'      => $transaction->getAmount(),
                'date'        => $transaction->getDate()->format('m/d/Y g:i A'),
                'createdAt'   => $transaction->getCreatedAt()->format('m/d/Y g:i A'),
                'updatedAt'   => $transaction->getCreatedAt()->format('m/d/Y g:i A'),
            ];
        };

        $totalTransactions = count($transaction);

        return $this->responseFormatter->asDataTable(
            $response,
            array_map($transformer, (array) $transaction->getIterator()),
            $params->draw,
            $totalTransactions
        );
    }
}
