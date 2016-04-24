<?php

namespace Payment;

use DateTime;

class PaymentManager
{
    /** @var Payment[] */
    private $payments;

    public function get($partnerId, DateTime $date)
    {
        if (!isset($this->payments[$this->hash($partnerId, $date)])) {
            $this->payments[$this->hash($partnerId, $date)] = new Payment($partnerId, $date);
        }
        return $this->payments[$this->hash($partnerId, $date)];
    }

    private function hash($partnerId, DateTime $date)
    {
        return $partnerId . '-' . $date->format('Y-m-d');
    }

    /** @return Payment[] */
    public function getAll()
    {
        usort($this->payments, function(Payment $p1, Payment $p2) {
            return $p1->getDate() > $p2->getDate() ? 1 : -1;
        });
        return array_values($this->payments);
    }
}