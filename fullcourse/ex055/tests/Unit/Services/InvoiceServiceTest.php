<?php

declare(strict_types=1);

namespace Tests\Unit\Services;

use App\Services\EmailService;
use App\Services\InvoiceService;
use App\Services\PaymentGatewayService;
use App\Services\SalesTaxService;
use PHPUnit\Framework\TestCase;

class InvoiceServiceTest extends TestCase
{
    private SalesTaxService $salesTaxesServiceMock;
    private EmailService $emailServiceMock;
    private PaymentGatewayService $gatewayServiceMock;
    private InvoiceService $invoiceService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->salesTaxesServiceMock = $this->createMock(SalesTaxService::class);
        $this->emailServiceMock = $this->createMock(EmailService::class);
        $this->gatewayServiceMock = $this->createMock(PaymentGatewayService::class);

        $this->gatewayServiceMock->method('charge')->willReturn(true);

        //given invoice service
        $this->invoiceService = new InvoiceService($this->salesTaxesServiceMock, $this->gatewayServiceMock, $this->emailServiceMock);
    }

    /** @test */
    public function it_process_invoice(): void
    {

        $customer = ['name' => 'Luiz'];
        $amount = 120;

        //when process is called
        $result = $this->invoiceService->process($customer, $amount);

        //then assert invoice is processd successfuly
        $this->assertTrue($result);
    }

    /** @test */
    public function it_sends_email_when_invoice_is_processed(): void
    {
        $this->emailServiceMock
            ->expects($this->once())
            ->method('send')
            ->with(['name' => 'Luiz'], 'receipt');

        $customer = ['name' => 'Luiz'];
        $amount = 120;

        //when process is called
        $result = $this->invoiceService->process($customer, $amount);

        //then assert invoice is processd successfuly
        $this->assertTrue($result);
    }
}
