<?php

use Converter\ConverterFactory;
use Payment\PaymentManager;
use Reader\IReader;

class EventSaver
{
    /** @var PartnerPeriod */
    private $partnerPeriod;

    /** @var PaymentManager */
    private $paymentManager;

    /** @var ConverterFactory */
    private $converterFactory;

    public function __construct(PaymentManager $paymentManager)
    {
        $this->partnerPeriod = new PartnerPeriod();
        $this->paymentManager = $paymentManager;
        $this->converterFactory = new ConverterFactory();
    }

    public function processFile(IReader $reader)
    {
        while ($event = $reader->fetch()) {

            $partnerId = $event['partner'];

            $period = $this->partnerPeriod->getPeriod($partnerId);
            $date = $period->getPaymentDate(new DateTime($event['timestamp']));

            $converter = $this->converterFactory->getConverter($event['currency']);
            $amount = $converter->convert($event['amount'], $date);

            $payment = $this->paymentManager->get($partnerId, $date);
            $payment->incAmount($amount);
        }
    }
}