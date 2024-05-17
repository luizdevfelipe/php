<?php 
declare(strict_types=1);
namespace App\Controllers;

use App\Services\InvoiceService;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\Twig;

class InvoiceController
{   
    public function __construct(private readonly Twig $twig, private readonly InvoiceService $invoiceService)
    {
        
    }

    public function index(ResponseInterface $response)
    {      
        return $this->twig->render($response, 'invoices/index.twig', ['invoices' => $this->invoiceService->getPaidInvoices()]);      
    }
}

?>