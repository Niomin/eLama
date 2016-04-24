<?php

class Period
{
    const TYPE_ONCE = 1;
    const TYPE_TWICE = 2;
    const TYPE_FOURFOLD = 3;

    /** @var int */
    private $type;

    private static $paymentDays = [
        self::TYPE_FOURFOLD => [7, 15, 23],
        self::TYPE_TWICE => [15],
        self::TYPE_ONCE => [],
    ];

    public function __construct($type)
    {
        if (!in_array($type, [self::TYPE_ONCE, self::TYPE_TWICE, self::TYPE_FOURFOLD])) {
            throw new RuntimeException('Передан неверный тип периода');
        }

        $this->type = $type;
    }

    public function getPaymentDate(DateTime $date)
    {
        $paymentDays = self::$paymentDays[$this->type];
        $date = clone($date);

        $day = $date->format('d');
        $year = $date->format('Y');
        $month = $date->format('m');

        foreach ($paymentDays as $paymentDay) {

            if ($day <= $paymentDay) {
                $date->setDate($year, $month, $paymentDay + 4);
                return $this->moveIfWeekend($date);
            }
        }

        $date->setDate($year, $month, 4);
        $date->modify('+1 month');
        return $this->moveIfWeekend($date);

    }

    private function moveIfWeekend(DateTime $date)
    {
        if ($date->format('N') >= 6) {
            $cnt = 10 - $date->format('N');
            $date->modify("+$cnt day");
        }

        return $date;
    }

}