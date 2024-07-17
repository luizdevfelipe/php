<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Contracts\RequestValidatorFactoryInterface;
use App\DataObjects\TransactionData;
use App\Entity\Category;
use App\Entity\Receipt;
use App\Entity\Transaction;
use App\RequestValidators\TransactionRequestValidator;
use App\RequestValidators\UploadCsvRequestValidator;
use App\ResponseFormatter;
use App\Services\CategoryService;
use App\Services\RequestService;
use App\Services\TransactionService;
use DateTime;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\Twig;

class TransactionController
{
    public function __construct(
        private readonly Twig $twig,
        private readonly RequestValidatorFactoryInterface $requestValidatorFactory,
        private readonly TransactionService $transactionService,
        private readonly ResponseFormatter $responseFormatter,
        private readonly RequestService $requestService,
        private readonly CategoryService $categoryService
    ) {
    }

    public function index(Request $request, Response $response): Response
    {
        return $this->twig->render(
            $response,
            'transactions/index.twig',
            ['categories' => $this->categoryService->getCategoryNames()]
        );
    }

    public function store(Request $request, Response $response): Response
    {
        $data = $this->requestValidatorFactory->make(TransactionRequestValidator::class)->validate(
            $request->getParsedBody()
        );

        $this->transactionService->create(
            new TransactionData(
                $data['description'],
                (float) $data['amount'],
                new DateTime($data['date']),
                $data['category']
            ),
            $request->getAttribute('user')
        );

        return $response;
    }

    public function delete(Request $request, Response $response, array $args): Response
    {
        $this->transactionService->delete((int) $args['id']);

        return $response;
    }

    public function get(Request $request, Response $response, array $args): Response
    {
        $transaction = $this->transactionService->getById((int) $args['id']);

        if (!$transaction) {
            return $response->withStatus(404);
        }

        $data = [
            'id'          => $transaction->getId(),
            'description' => $transaction->getDescription(),
            'amount'      => $transaction->getAmount(),
            'date'        => $transaction->getDate()->format('Y-m-d\TH:i'),
            'category'    => $transaction->getCategory()->getId(),
        ];

        return $this->responseFormatter->asJson($response, $data);
    }



    public function update(Request $request, Response $response, array $args): Response
    {
        $data = $this->requestValidatorFactory->make(TransactionRequestValidator::class)->validate(
            $args + $request->getParsedBody()
        );

        $id = (int) $data['id'];

        if (!$id || !($transaction = $this->transactionService->getById($id))) {
            return $response->withStatus(404);
        }

        $this->transactionService->update(
            $transaction,
            new TransactionData(
                $data['description'],
                (float) $data['amount'],
                new DateTime($data['date']),
                $data['category']
            )
        );

        return $response;
    }

    public function load(Request $request, Response $response): Response
    {
        $params       = $this->requestService->getDataTableQueryParameters($request);
        $transactions = $this->transactionService->getPaginatedTransactions($params);
        $transformer  = function (Transaction $transaction) {
            return [
                'id'          => $transaction->getId(),
                'description' => $transaction->getDescription(),
                'amount'      => $transaction->getAmount(),
                'date'        => $transaction->getDate()->format('m/d/Y g:i A'),
                'category'    => $transaction->getCategory()?->getName(),
                'receipts'    => $transaction->getReceipts()->map(fn (Receipt $receipt) => [
                    'name' => $receipt->getFilename(),
                    'id'   => $receipt->getId(),
                ])->toArray(),
            ];
        };

        $totalTransactions = count($transactions);

        return $this->responseFormatter->asDataTable(
            $response,
            array_map($transformer, (array) $transactions->getIterator()),
            $params->draw,
            $totalTransactions
        );
    }

    public function csvTransactions(Request $request, Response $response)
    {
        $file = $this->requestValidatorFactory->make(UploadCsvRequestValidator::class)
            ->validate($request->getUploadedFiles())['transactions'];

        $open = fopen($file->getStream()->getMetadata('uri'), 'r');

        $params = fgetcsv($open);

        while (($line = fgetcsv($open)) !== false) {
            $transactions[$params[0]][] = $line[0];
            $transactions[$params[1]][] = $line[1];
            $transactions[$params[2]][] = $line[2];
            $transactions[$params[3]][] = $line[3];
        }

        fclose($open);

        for ($i = 0; $i < count($transactions[$params[0]]); $i++) {
            $category = $this->categoryService->getByName($transactions[$params[2]][$i]);

            $this->transactionService->create(new TransactionData(
                $transactions[$params[1]][$i],
                (float) str_replace(['$', ','], '', $transactions[$params[3]][$i]),
                new DateTime($transactions[$params[0]][$i]),
                $category,
            ), $request->getAttribute('user'));
        }

        return $response;
    }
}
