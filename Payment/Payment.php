<?php

namespace Payment;

use DateTime;

class Payment
{
    /** @var int */
    private $partnerId;

    /** @var DateTime */
    private $date;

    /** @var float */
    private $amount;

    public function __construct($partnerId, DateTime $date)
    {
        $this->partnerId = $partnerId;
        $this->date = $date;
    }

    /**
     * @return int
     */
    public function getPartnerId()
    {
        return $this->partnerId;
    }

    /**
     * @return DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function incAmount($amount)
    {
        $this->amount += $amount;
    }

    public function toArray()
    {
        return [
            'partnerId' => $this->partnerId,
            'date'      => $this->date->format('Y-m-d'),
            'amount'    => $this->amount,
        ];
    }
}